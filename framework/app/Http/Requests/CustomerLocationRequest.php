<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
//use Auth;
use Illuminate\Foundation\Http\FormRequest;

class CustomerLocationRequest extends FormRequest {
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
			//'customers_name' => 'required',
			'address' => 'required',
			'city' => 'required',
			'province' => 'required',
			'postal_code' => 'required',
			'country' => 'required',
			'longitude' => 'required',
			'latitude' => 'required',
			'phone' => 'required',
			'email_customer' => 'required',
			'note'  => 'required', 
			'customers_id' => 'required',

		];
	}
}
