<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class DriversRequest extends FormRequest {
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
			'name' => 'required',
			'address' => 'required',
			'phone' => 'required',
			'sex' => 'required',
			'sim_number' => 'required',
			'sim_exp_date' => 'required',
			//'driver_image' => 'required',
			'emergency_contact' => 'required',
			'gatepass' => 'required',
			'gatepass_rls_date' => 'required',
			'gatepass_exp_date' => 'required',
			'join_date' => 'required', 
		];
	}
}
