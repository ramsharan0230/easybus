<?php
namespace App\Repositories\Vendor;
use App\User;
use App\Repositories\Crud\CrudRepository;
class VendorRepository extends CrudRepository implements VendorInterface{
	public function __construct(User $user){
		$this->model=$user;
	}
	public function create($input){
		$this->model->create($input);
	}
	public function update($input,$id){
		$this->model->find($id)->update($input);
	}
}