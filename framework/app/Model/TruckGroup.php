<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TruckGroup extends Model {
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $table = 'truck_group';
	protected $fillable = ['name', 'description', 'note'];

	function group() {
		return $this->hasMany("App\Model\Truck", "group_id", "id")->withTrashed();
	}
}