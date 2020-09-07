<?php
namespace App\Repositories\Admin;
use App\User;
use App\Repositories\Crud\CrudRepository;
class AdminRepository extends CrudRepository implements AdminInterface{
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