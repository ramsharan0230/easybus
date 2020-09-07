<?php
namespace App\Repositories\Advertisement;
use App\Repositories\Crud\CrudInterface;
interface AdvertisementInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}