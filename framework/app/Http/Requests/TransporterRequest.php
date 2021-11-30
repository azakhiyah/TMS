<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
//use Auth;
use Illuminate\Foundation\Http\FormRequest;

class TransporterRequest extends FormRequest {
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
			'city' => 'required',
			'province' => 'required',
			'postal_code' => 'required',
			'country' => 'required',
			'phone' => 'required',
			'email_transporter' => 'required',
			'note'  => 'required', 

		];
	}
}
