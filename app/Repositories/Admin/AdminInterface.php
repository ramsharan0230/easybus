<?php
namespace App\Repositories\Admin;
use App\Repositories\Crud\CrudInterface;
interface AdminInterface extends CrudInterface{
	public function create($input);
	public function update($data,$id);
}