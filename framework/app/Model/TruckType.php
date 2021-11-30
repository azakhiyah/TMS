<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TruckType extends Model {
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $table = 'truck_types';
	protected $fillable = ['trucktype','brand','model','displayname', 'icon', 'isenable', 'cylinder_capacity','km_per_liter','hour_per_liter'];
}
