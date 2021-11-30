<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
//use Auth;
use Illuminate\Foundation\Http\FormRequest;

class TrailersRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	
	/**
	 * Get the validation rules that apply to the request.
	 * 
	 * @return array
	 */
	public function rules() {
		return [
			'brand' => 'required',
			'type' => 'required',
			'unit_maker' => 'required',
			'license_plate' => 'required',
			'tag_id' => 'required',
			'year' => 'required',
            'lic_exp_date' => 'required',
            'reg_exp_date' => 'required',
            //'trailer_image' => 'required',
			'tera_sertifikat' => 'required',
			'tera_rls_date' => 'required',
			'tera_exp_date' => 'required',
			//'compartement'  => 'required',
			'capacity' => 'required',
			//'C1' => 'required',
			//'C2' => 'required',
			//'C3' => 'required',
			//'C4' => 'required',
		];
	}
}
