<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ImeTransaction;
use App\Repositories\Booking\BookingRepository;
use App\Repositories\TempBooking\TempBookingRepository;
use Session;

class ImeController extends Controller
{
	private static $apiuser;
	private static $password;
	private static $module;
	private static $merchantcode;

	public function __construct(TempBookingRepository $tempbooking,BookingRepository $booking) {
	    self::$apiuser = config('ime-pay.apiuser');
	    self::$password = config('ime-pay.password');
	    self::$module = config('ime-pay.module');
	    self::$merchantcode = config('ime-pay.merchant_code');
        $this->booking=$booking;
        $this->tempbooking=$tempbooking;
	}
    public static function index(Request $request){
        $amount=Session::get('amount');
    	$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $refId='inv-'.time();

        $token_responses = static::getToken($amount,$refId);

        $token_response = json_decode($token_responses);
        ImeTransaction::create([
            'MerchantCode' => self::$merchantcode,
            'TranAmount' => $token_response->Amount,
            'RefId' => $token_response->RefId,
            'TokenId' => $token_response->TokenId,
            'token'  => Session::get('token')
        ]);
      
        $merch_code = self::$merchantcode;
        return view('front.imePay', compact('token_response', 'merch_code'));


    }
    private static function getToken($amt,$ref_id){
        $data = ["MerchantCode" => self::$merchantcode, "Amount" => $amt, "RefId" => $ref_id];
        $header_array = [];
        $header_array[] = "Authorization: Basic ".base64_encode(self::$apiuser.":".self::$password);
        $header_array[] = "Module: ".base64_encode(self::$module);
        $header_array[] = "Content-Type: application/json";
        // Initializing a cURL session
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://stg.imepay.com.np:7979/api/Web/GetToken');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header_array);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
       
    }

    public function imepay_verify(Request $request){
        if($request){
            if($request['ResponseCode'] == "0") {
                $row = ImeTransaction::where('RefId', $request['RefId'])->first();
                $row->TransactionId = $request['TransactionId'];
                $row->Msisdn = $request['Msisdn'];

                $row->TranStatus = $request['ResponseCode'];
                $row->StatusDetail = "Transaction Initiated";
                $row->save();
                sleep(5);
                $response_json = static::confirm($request['RefId'], $row['MerchantCode'], $request['TransactionId'],$request['Msisdn']);
                $response = json_decode($response_json);
                if($response->ResponseCode != 0){
                    $response_json = static::confirm($request['RefId'], $row['MerchantCode'], $request['TransactionId'],$request['Msisdn']);
                    $response = json_decode($response_json);
                }

                $row->TranStatus = $response->ResponseCode;
                $row->StatusDetail = $response->ResponseDescription;
                $row->save();
                if($response->ResponseCode==0){
                    $row = ImeTransaction::where('RefId', $request['RefId'])->first();
                    $seat_name=$this->saveBooking($row->token);
                    $this->sendSmsAfterBooking($seat_name,$row->token);
                }
                

                return redirect()->route('home')->with('message', $row->StatusDetail);

            } else {
                $row = ImeTransaction::where('RefId', $request['RefId'])->first();
                $row['TransactionId'] = $request['TransactionId'];
                $row['Msisdn'] = $request['Msisdn'];
                $row['TranStatus'] = $request['ResponseCode'];
                $row['StatusDetail'] = "Transaction Failed";
                $row->save();
                return redirect()->route('home')->with('message', $row->StatusDetail);
            }
        } else {
            $latest_transaction = ImeTransaction::where('RefId', $request['RefId'])->first();
            $rechecked_json = static::reconfirm($latest_transaction->MerchantCode, $latest_transaction->TokenId, $latest_transaction->RefId);
            $rechecked = json_decode($rechecked_json);
            if($rechecked->ResponseCode == "0"){
                $latest_transaction->TransactionId = $rechecked->TransactionId;
                $latest_transaction->Msisdn = $rechecked->Msisdn;
                $latest_transaction->TranStatus = $rechecked->ResponseCode;
                $latest_transaction->StatusDetail = "Success";
                $seat_name=$this->saveBooking();
                $this->sendSmsAfterBooking($seat_name);
            } else {
                $latest_transaction->TransactionId = $rechecked->TransactionId;
                $latest_transaction->Msisdn = $rechecked->Msisdn;
                $latest_transaction->TranStatus = $rechecked->ResponseCode;
                $latest_transaction->StatusDetail = "Not Found or Failed";
            }
            return redirect()->route('home')->with('message', "Transaction Failed. Try again or contact the respective firm!");
        }
    }
    private static function confirm($ref_id,$merch_code,$transaction_id, $msisdn){
        $data = ["TransactionId" => $transaction_id, "MerchantCode" => $merch_code, "Msisdn" => $msisdn, "RefId" => $ref_id];
        $header_array = [];
        $header_array[] = "Authorization: Basic " . base64_encode(self::$apiuser. ":" . self::$password);
        $header_array[] = "Module: " . base64_encode(self::$module);
        $header_array[] = "Content-Type: application/json";
        // Initializing a cURL session
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://stg.imepay.com.np:7979/api/Web/Confirm');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header_array);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;

    }
    private static function reconfirm($MerchantCode, $TokenId,$RefId) {

        $data = ["MerchantCode" => $MerchantCode, "TokenId" => $TokenId, "RefId" => $RefId];
        $header_array = [];
        $header_array[] = "Authorization: Basic " . base64_encode(self::$apiuser. ":" . self::$password);
        $header_array[] = "Module: " . base64_encode(self::$module);
        $header_array[] = "Content-Type: application/json";
        // Initializing a cURL session
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://stg.imepay.com.np:7979/api/Web/Recheck');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header_array);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    public function saveBooking($token){
        $value=$this->tempbooking->where('token',$token)->get();
        $seat_name=[];
        foreach($value as $value){
            $data['token']=$value->token;
            $data['bus_id']=$value->bus_id;
            $data['seat_id']=$value->seat_id;
            $data['routine_id']=$value->routine_id;
            $data['client_id']=$value->client_id;
            $data['book_no']=$value->book_no;
            $data['booked_on']=$value->booked_on;
            $data['name']=$value['name'];
            $data['phone']=$value['phone'];
            $data['pickup_station']=$value['pickup_station'];
            $data['drop_station']=$value['drop_station'];
            $data['from']=$value['from'];
            $data['price']=$value['price'];
            $data['time']=$value['time'];
            $data['to']=$value['to'];
            $data['shift']=$value['shift'];
            $data['date']=$value['date'];
            
            $result=$this->booking->create($data);
            if($result){
                $seat=$result->seat;
                if($seat){    
                    array_push($seat_name,$seat->seat_name);
                }
            }
        }
        return $seat_name;
    }
    public function sendSmsAfterBooking($seat_name,$token){
        
        $ch = curl_init();
        $booking=$this->booking->orderBy('created_at','desc')->where('token',$token)->first();
        $value['name'] ='';
        foreach($seat_name as $seat){
                    $value['name'] .= ($value['name']==""?"":",").$seat;
                }

        $message=$booking->name.' seat no '.$value['name'].' has been booked in bus '.$booking->bus->bus_name.'('.$booking->bus->bus_number.')'.'for date '.$booking->date.' form'.$booking->from.' to'.$booking->to.'. Your token is '.$token;
        $args = http_build_query(array('token' => 'pLrVOQeOSHOed96CJrQO', 'from' => 'InfoSMS', 'to' => $booking->phone, 'text' => $message));
        $url = "http://api.sparrowsms.com/v2/sms/";
 
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // Response
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

    }

}
