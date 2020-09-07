<?php
namespace App\Repositories\Advertisement;
use App\Repositories\Crud\CrudRepository;
use App\Models\Advertisement;
class AdvertisementRepository extends CrudRepository implements AdvertisementInterface{
	public function __construct(Advertisement $advertisement){
		$this->model=$advertisement;
	}
	public function create($data){

		$this->model->create($data);
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
}