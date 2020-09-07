<?php
namespace App\Repositories\BusCategory;
use App\Models\BusCategory;
use App\Repositories\Crud\CrudRepository;
class BusCategoryRepository extends CrudRepository implements BusCategoryInterface{
	public function __construct(BusCategory $category){
		$this->model=$category;
	}
	public function create($data){
		$this->model->create($data);
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
}