<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trailers extends Model
{   protected $primaryKey = 'id'; 
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $table = 'trailers';
	 protected $fillable = ['id','brand','type','unit_maker','license_plate','tag_id','year','lic_exp_date','reg_exp_date','tera_sertifikat','tera_rls_date','tera_exp_date','trailer_image','compartement','capacity','created_at','update_at','deleted_at'];
}