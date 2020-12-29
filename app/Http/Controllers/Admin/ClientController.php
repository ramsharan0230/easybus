<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Client\ClientRepository;
use App\Models\BusBooking;

class ClientController extends Controller
{
    public function __construct(ClientRepository $client){
        $this->client=$client;
    }

    public function allClients()
    {
        $details=$this->client->orderBy('created_at','desc')->get();
        
        return view('admin.client.list',compact('details'));
    }

    public function editClient($id){
        return $id;
    }

    public function deleteClient($id){
        return $id;
    }

    public function showBookings($id){
       $bookings =  BusBooking::where('client_id', $id)->orderBy('updated_at', 'DESC')->get();
       return view('admin.client.clientDetails', compact('bookings'));
    }
}
