<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderPlanLogs extends Model {

	protected $table = 'work_order_logs';
	protected $fillable = ['vehicle_id', 'vendor_id', 'required_by', 'status', 'description', 'meter', 'note', 'price', 'type', 'created_on', 'parts_price'];

	function vehicle() {
		return $this->belongsTo("App\Model\VehicleModel", "vehicle_id", "id")->withTrashed();
	}

	function vendor() {
		return $this->belongsTo("App\Model\Vendor", "vendor_id", "id")->withTrashed();
	}

}