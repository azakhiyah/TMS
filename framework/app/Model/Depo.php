<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Depo extends Model {
	protected $primaryKey = 'id'; 
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $table = 'depo';
	protected $fillable = ['id','name','address','city','province','postal_code','country','longitude','latitude','phone','email_depo','note'];

}