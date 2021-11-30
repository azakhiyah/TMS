<?php

namespace App\Http\Requests;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class TruckTypeRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		if (Auth::user()->user_type == "S" || Auth::user()->user_type == "O") {
			return true;
		} else {
			abort(404);
		}
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			//'make' => 'required',
			'model' => 'required',
			'trucktype' => 'required|unique:truck_types,trucktype,' . \Request::get("id") . ',id,deleted_at,NULL',
			'displayname' => 'required',
			'icon' => 'nullable|image|mimes:jpg,png,jpeg',
			'km_per_liter'=> 'required',
			'hour_per_liter'=> 'required',
		];
	}

	public function messages() {
		return [
			'trucktype.unique' => 'Truck type already exist',
		];
	}
}