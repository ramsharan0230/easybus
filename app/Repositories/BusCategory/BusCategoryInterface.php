<?php
namespace App\Repositories\BusCategory;
use App\Repositories\Crud\CrudInterface;
interface BusCategoryInterface extends CrudInterface {
	public function create($data);
	public function update($data,$id);
}