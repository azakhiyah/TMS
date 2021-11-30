<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customers extends Model {
	protected $primaryKey = 'id'; 
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $table = 'customers';
	protected $fillable = ['id','name'];

	public function customerlocation()
    {
        return $this->hasMany('App\Model\CustomerLocation','customers_id');
    }

}