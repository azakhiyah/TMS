<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model {
	protected $primaryKey = 'id'; 
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $table = 'warehouse';
	protected $fillable = ['id','name','address','city','province','postal_code','country','longitude','latitude','phone','email_WH','note'];

}