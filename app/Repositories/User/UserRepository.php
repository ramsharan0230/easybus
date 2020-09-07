<?php
namespace App\Repositories\User;
use App\User;
use App\Models\CompanyInfo;
use App\Repositories\Crud\CrudRepository;
class UserRepository extends CrudRepository implements UserInterface{
	public function __construct(User $user,CompanyInfo $info){
		$this->model=$user;
		$this->info=$info;
	}
	public function create($input){
		
		$this->model->create($input);
	}
	public function update($input,$id){
		$this->model->find($id)->update($input);
	}
	public function addInfo($data){
		$this->info->create($data);
	}
	public function updateInfo($input,$id){
		$this->info->find($id)->update($input);
	}
}