<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class OrderPlanRequest extends FormRequest {

	public function authorize()
    {
        if (Auth::user()->user_type == "S" || Auth::user()->user_type == "O") {
            return true;
        } else {
            abort(404);
        }
    }

	public function rules() {

       
		return [        'no_PO' => 'required',
                        'no_SO' => 'required',
                        //'type' =>  $request->get("type_id"),
                        'no_LO'=> 'required',
                        'customers_id' => 'required',
                        'depo_id' => 'required',
                        'product_id' => 'required',
                        'qty_order' => 'required|numeric',
                        'attachment'=>'nullable|image|mimes:jpg,png,jpeg',
                       

		];
	}
}
