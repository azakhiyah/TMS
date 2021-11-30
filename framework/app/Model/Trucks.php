<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trucks extends Model {
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $table = 'trucks';
	protected $metaTable = 'trucks_meta'; //optional.
	protected $fillable = ['id','make','model','type','year','group_id','truck_image','vin','machine_number','license_plate','lic_exp_date','tax_number','tax_exp_date','kir','tera_sertifikat','tera_rls_date','tera_exp_date','gate_pass','gatepass_rls_date','gatepass_exp_date','door_number','in_service','owner_type','flowmeter','type_id','trailers'];


	public function types()
    {
        return $this->hasOne("App\Model\TruckType", "id", "type_id")->withTrashed();
    }

	public function trailer()
    {
        return $this->hasOne("App\Model\Trailers", "id", "trailers_id")->withTrashed();
    }
}