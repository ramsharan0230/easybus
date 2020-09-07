<?php
namespace App\Repositories\User;
use App\Repositories\Crud\CrudInterface;
interface UserInterface extends CrudInterface{
	public function create($input);
	public function update($data,$id);
	public function addInfo($data);
	public function updateInfo($input,$id);
}