<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model {
	protected $primaryKey = 'id'; 
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $table = 'product';
	protected $fillable = ['id','name','density'];

}