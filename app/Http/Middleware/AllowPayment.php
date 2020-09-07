<?php

namespace App\Http\Middleware;
use App\Repositories\Booking\BookingRepository;
use App\Repositories\BusRoutine\BusRoutineRepository;
use App\Models\BusSeat;

use Closure;
use Session;

class AllowPayment
{
    public function __construct(BookingRepository $booking,BusRoutineRepository $busroutine){
        $this->booking=$booking;
        $this->routine=$busroutine;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id=Session::get('id');
        $value=Session::get('jointable');
        $routine=$this->routine->find($id);
        if($routine && $value){
            $bus=$routine->bus;
            if($value){
                foreach($value as $key=>$val){
                    if($keys[0]==$id){
                        foreach($val as $new){
                            $seat=BusSeat::find($new);
                            if(!$seat){
                                return redirect()->route('home')->with('message','Something went wrong');
                            }else{
                                
                            }
                        }
                    }else{
                        return redirect()->route('home')->with('message','Something went wrong');
                    }
                }
            }else{
                return redirect()->route('home')->with('message','Something went wrong');
            }
            return $next($request);
        }else{
            return redirect()->route('home')->with('message','Something went wrong');
        }
        
    }
}
