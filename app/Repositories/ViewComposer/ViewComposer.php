<?php
namespace App\Repositories\ViewComposer;
use App\Repositories\nepalicalendar\nepali_date;
use App\Repositories\Bus\BusRepository;
use Illuminate\View\View;
use Auth;

class ViewComposer {
	private $dashboard;
	private $activity;
	public function __construct(nepali_date $calendar,BusRepository $bus) {
		$this->calendar=$calendar;
		$this->bus=$bus;

	}
	public function compose(View $view) {
		$nepali_date=$this->calendar->get_nepali_date(date('Y'),date('m'),date('d'));
		
		$newNepaliDate=$nepali_date['y'].'-'.((strlen($nepali_date['m']) == 2) ? $nepali_date['m'] : "0".$nepali_date['m']).'-'.((strlen($nepali_date['d']) == 2) ? $nepali_date['d'] : "0".$nepali_date['d']);

		if(Auth::user()){
			if(Auth::user()->role=='admin'){
				$approved_buses=$this->bus->where('status','approved')->count();
				$view->with(['dashboard_nepali_date'=>$newNepaliDate,'dashboard_approved_bus'=>$approved_buses]);
			}
			else{
				$view->with(['dashboard_nepali_date'=>$newNepaliDate]);
			}
			
		}else{
			$view->with(['dashboard_nepali_date'=>$newNepaliDate]);
		}
	}
	
}
