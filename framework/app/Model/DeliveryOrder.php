<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeliveryOrder extends Model {
	protected $primaryKey = 'id'; 
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $table = 'delivery_order';
	protected $fillable = ['id','no_SO','no_PO','no_LO','customers_id','customers_name','customer_location_id',
    'customer_location_address','qty_order','product_id','product_name','warehouse_id','warehouse_name','depo_id','depo_name',
    'drivers_id','drivers_name', 'trucks_id','door_number','license_plate','transporter_id','transporter_name',
    'trailers_id','trailers_name','status','statusdelivery','compartement','note','qty_delivery','date_delivery','actual_delivery',
    'attachment1','attachment2'];
   
    public function pickupbytransport()
    {
        return $this->hasOne("App\Model\PickupbyTransport", "id", "pickupbytransport_id")->withTrashed();
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

    // public function orderplan()
    // {
    //     return $this->hasOne("App\Model\OrderPlan", "id", "orderplan_id")->withTrashed();
    // }
    
    // public function warehouse()
    // {
    //     return $this->hasOne("App\Model\Warehouse", "id", "warehouse_id")->withTrashed();
    // }

    // public function trucks()
    // {
    //     return $this->hasOne("App\Model\Trucks", "id", "trucks_id")->withTrashed();
    // }

    // public function trailers()
    // {
    //     return $this->hasOne("App\Model\Trailers", "id", "trailers_id")->withTrashed();
    // }


    // public function transporter()
    // {
    //     return $this->hasOne("App\Model\Transporter", "id", "transporter_id")->withTrashed();
    // }

    // public function drivers()
    // {
    //     return $this->hasOne("App\Model\Drivers", "id", "drivers_id")->withTrashed();
    // }


}