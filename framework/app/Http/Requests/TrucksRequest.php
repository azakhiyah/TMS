<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class TrucksRequest extends FormRequest {

	public function authorize()
    {
        if (Auth::user()->user_type == "S" || Auth::user()->user_type == "O") {
            return true;
        } else {
            abort(404);
        }
    }

	public function rules() {

       
		return [
			//'make' => 'required',
			//'model' => 'required',
			'year' => 'required|numeric',
			//'truck_image' =>'nullable|image|mimes:jpg,png,jpeg',
			'vin' => 'required',
			'machine_number' => 'required',
			'license_plate'  =>  'required|unique:trucks,license_plate,' . \Request::get("id") . ',id,deleted_at,NULL',
			'lic_exp_date' => 'required|date|date_format:Y-m-d',
			'tax_number' => 'required',
			'tax_exp_date' => 'required|date|date_format:Y-m-d',
			'kir' => 'required',
			'tera_sertifikat' => 'required',
			'tera_rls_date'  => 'required|date|date_format:Y-m-d',
			'tera_exp_date'  => 'required|date|date_format:Y-m-d',
			'gate_pass' => 'required',
			'gatepass_rls_date' => 'required|date|date_format:Y-m-d',
			'gatepass_exp_date' => 'required|date|date_format:Y-m-d',
			'door_number'  => 'required',
			'owner_type'  => 'required',
			'flowmeter'  => 'required',
			'trailers'  => 'required',
		];
	}
}
