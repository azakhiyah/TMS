<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Drivers extends Model {
	protected $primaryKey = 'id'; 
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $table = 'drivers';
	protected $fillable = ['id','name','address','phone','sex','sim_number','sim_exp_date','driver_image','emergency_contact','gatepass','gatepass_rls_date','gatepass_exp_date','join_date'];

}
