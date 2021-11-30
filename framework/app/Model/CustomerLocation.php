<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerLocation extends Model {
	protected $primaryKey = 'id'; 
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $table = 'customer_location';
	protected $fillable = ['id','name','address','city','province','postal_code','country','longitude','latitude','phone','email_customer','note','customers_id'];

	public function customers() 
	{
		return $this->hasOne("App\Model\Customers", "id", "customers_id")->withTrashed();
		
		return $this->belongsTo("App\Model\Customers");
	}

}