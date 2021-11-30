<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderPlan extends Model {
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $table = 'orderplan';
	protected $fillable = ['id','no_PO','no_SO','no_LO','customers_id','address','depo_id','product_id','qty_order','attachment',];


	public function customers()
    {
        //return $this->hasOne("App\Model\User", "id", "user_id")->withTrashed();
    return $this->hasOne("App\Model\Customers", "id", "customers_id")->withTrashed();
    }

    public function customerslocation()
    {
     // return $this->hasOne("App\Model\CustomerLocation", "id", "customers_id")->withTrashed();
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
}