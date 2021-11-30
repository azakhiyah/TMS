<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kodeine\Metable\Metable;

class VehicleModel extends Model
{
    use Metable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = "vehicles";
    protected $metaTable = 'vehicles_meta'; //optional.
    protected $fillable = ['make', 'model', 'type', 'year', 'engine_type', 'horse_power', 'color', 'vin', 'license_plate', 'mileage', 'int_mileage', 'in_service', 'user_id', 'insurance_number', 'documents', 'vehicle_image', 'exp_date', 'reg_exp_date', 'lic_exp_date', 'group_id', 'type_id'];

    protected function getMetaKeyName()
    {
        return 'vehicle_id'; // The parent foreign key
    }

    public function driver()
    {
        return $this->hasOne("App\Model\DriverVehicleModel", "vehicle_id", "id");
    }

    public function income()
    {
        return $this->hasMany("App\Model\IncomeModel", "vehicle_id", "id")->withTrashed();
    }
    public function expense()
    {
        return $this->hasMany("App\Model\Expense", "vehicle_id", "id")->withTrashed();
    }

    public function insurance()
    {
        return $this->hasOne("App\Model\InsuranceModel", "vehicle_id", "id")->withTrashed();
    }

    public function acq()
    {
        return $this->hasMany("App\Model\AcquisitionModel", "vehicle_id", "id");
    }

    public function group()
    {
        return $this->hasOne("App\Model\VehicleGroupModel", "id", "group_id")->withTrashed();
    }

    public function reviews()
    {
        return $this->hasMany('App\Model\VehicleReviewModel', 'vehicle_id', 'id');
    }

    public function types()
    {
        return $this->hasOne("App\Model\VehicleTypeModel", "id", "type_id")->withTrashed();
    }
}