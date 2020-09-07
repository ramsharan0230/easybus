<?php
namespace App\Repositories\Vendor;
use App\Repositories\Crud\CrudInterface;
interface VendorInterface extends CrudInterface{
	public function create($input);
	public function update($data,$id);
}