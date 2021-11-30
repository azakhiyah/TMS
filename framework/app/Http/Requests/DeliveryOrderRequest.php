<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class DeliveryOrderRequest extends FormRequest {



	public function rules() {

       // ,,];
		return [        //'no_PO' => 'required',
                        //'no_SO' => 'required',
                        //'no_LO'=> 'required',
                       // 'customers_id' => 'required',
                       // 'customer_location_id',
                       // 'product_id' => 'required',
                      //  'qty_order' => 'required|numeric',
                      //  'warehouse_id' => 'required',
                       // 'depo_id' => 'required',
                       // 'driver_id' => 'required',
                      //  'door_number' => 'required',
                      // 'transporter_id' => 'required',
                       // 'trailers_id' => 'required',
                       // 'license_plate' => 'required',
                       // 'status' => 'required',
                      //  'compartement' => 'required',
                        //'start_loading',
                        //'stop_loading',
                        //'planning_at',
                        

		];
	}
}
