<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TruckReview extends Model {
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $table = "truck_review";
	protected $fillable = [
		'vehicle_id',
		'user_id',
		'reg_no',
		'kms_outgoing',
		'kms_incoming',
		'fuel_level_out',
		'fuel_level_in',
		'datetime_outgoing',
		'datetime_incoming',
		'petrol_card',
		'lights',
		'invertor',
		'car_mats',
		'int_damage',
		'int_lights',
		'ext_car',
		'tyre',
		'ladder',
		'leed',
		'power_tool',
		'ac',
		'head_light',
		'lock',
		'windows',
		'condition',
		'oil_chk',
		'suspension',
		'tool_box',
	];

	function user() {
		return $this->hasOne("App\Model\User", "id", "user_id")->withTrashed();
	}

	function truck() {
		return $this->hasOne("App\Model\Truck", "id", "truck_id")->withTrashed();
	}
}