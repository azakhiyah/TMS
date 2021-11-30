<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PickupbyTransport extends Model {
	protected $primaryKey = 'id'; 
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $table = 'pickup_bytransport';
	protected $fillable = ['id','no_SO','no_PO','no_LO','customers_id','customers','customer_location_id',
    'customer_location','qty_order','product_id','product','planning_at','warehouse_id','warehouse_name','depo_id',
    'depo','drivers_id','drivers','door_number','transporter_id','transporter','trailers_id','trailers','license_plate',
    'status','compartement','start_loading','stop_loading','statuspickup'];
   
    public function orderplan()
    {
        return $this->hasOne("App\Model\OrderPlan", "id", "orderplan_id")->withTrashed();
    }
    
    public function warehouse()
    {
        return $this->hasOne("App\Model\Warehouse", "id", "warehouse_id")->withTrashed();
    }

    public function customers()
    {
         return $this->hasOne("App\Model\Customers", "id", "customers_id")->withTrashed();
    }

    public function customerslocation()
    {
         return $this->hasOne("App\Model\CustomerLocation", "id", "customer_location_id")->withTrashed();
    }
    
    public function depo()
    {
         return $this->hasOne("App\Model\Depo", "id", "depo_id")->withTrashed();
    }

    public function product()
    {
        return $this->hasOne("App\Model\Product", "id", "product_id")->withTrashed();
    }

    public function trucks()
    {
        return $this->hasOne("App\Model\Trucks", "id", "trucks_id")->withTrashed();
    }

    public function trailers()
    {
        return $this->hasOne("App\Model\Trailers", "id", "trailers_id")->withTrashed();
    }


    public function transporter()
    {
        return $this->hasOne("App\Model\Transporter", "id", "transporter_id")->withTrashed();
    }

    public function drivers()
    {
        return $this->hasOne("App\Model\Drivers", "id", "drivers_id")->withTrashed();
    }


}