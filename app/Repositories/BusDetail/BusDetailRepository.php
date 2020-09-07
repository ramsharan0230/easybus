<?php
namespace App\Repositories\BusDetail;
use App\Repositories\Crud\CrudRepository;
use App\Models\BusDetail;
class BusDetailRepository extends CrudRepository implements BusDetailInterface{
	public function __construct(BusDetail $busdetail){
		$this->model=$busdetail;
	}
}