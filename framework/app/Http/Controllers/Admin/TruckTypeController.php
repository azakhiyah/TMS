<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\TruckTypeRequest;
use App\Model\FareSettings;
use App\Model\TruckType;
use Illuminate\Http\Request;

class TruckTypeController extends Controller {

	public function index() {
		$index['data'] = TruckType::get();
		return view('truck_types.index', $index);
	}

	public function create() {
		return view('truck_types.create');
	}

	public function store(TruckTypeRequest $request) {
		if ($request->isenable == 1) {
			$enable = 1;
		} else {
			$enable = 0;
		}
		$new = TruckType::create([
			'trucktype' => $request->trucktype,
			'brand' => $request->brand,
			'model' => $request->model,
			'displayname' => $request->displayname,
			'isenable' => $enable,
			'cylinder_capacity' => $request->cylinder_capacity,
			'km_per_liter' => $request->km_per_liter,
			'hour_per_liter' => $request->hour_per_liter,
		]);
		$file = $request->file('icon');

		if ($request->hasFile('icon') && $request->file('icon')->isValid()) {
			$destinationPath = './uploads'; // upload path
			$extension = $file->getClientOriginalExtension();

			$fileName1 = 'truck_type_' . time() . '.' . $extension;

			$file->move($destinationPath, $fileName1);
			$new->icon = $fileName1;
			$new->save();
		}

		$key = $request->get('trucktype');
		FareSettings::create(['key_name' => strtolower(str_replace(" ", "", $key)) . '_base_fare', 'key_value' => '500', 'type_id' => $new->id]);
		FareSettings::create(['key_name' => strtolower(str_replace(" ", "", $key)) . '_base_km', 'key_value' => '10', 'type_id' => $new->id]);
		FareSettings::create(['key_name' => strtolower(str_replace(" ", "", $key)) . '_base_time', 'key_value' => '2', 'type_id' => $new->id]);
		FareSettings::create(['key_name' => strtolower(str_replace(" ", "", $key)) . '_std_fare', 'key_value' => '20', 'type_id' => $new->id]);
		FareSettings::create(['key_name' => strtolower(str_replace(" ", "", $key)) . '_weekend_base_fare', 'key_value' => '500', 'type_id' => $new->id]);
		FareSettings::create(['key_name' => strtolower(str_replace(" ", "", $key)) . '_weekend_base_km', 'key_value' => '10', 'type_id' => $new->id]);
		FareSettings::create(['key_name' => strtolower(str_replace(" ", "", $key)) . '_weekend_wait_time', 'key_value' => '2', 'type_id' => $new->id]);
		FareSettings::create(['key_name' => strtolower(str_replace(" ", "", $key)) . '_weekend_std_fare', 'key_value' => '20', 'type_id' => $new->id]);
		FareSettings::create(['key_name' => strtolower(str_replace(" ", "", $key)) . '_night_base_fare', 'key_value' => '500', 'type_id' => $new->id]);
		FareSettings::create(['key_name' => strtolower(str_replace(" ", "", $key)) . '_night_base_km', 'key_value' => '10', 'type_id' => $new->id]);
		FareSettings::create(['key_name' => strtolower(str_replace(" ", "", $key)) . '_night_wait_time', 'key_value' => '2', 'type_id' => $new->id]);
		FareSettings::create(['key_name' => strtolower(str_replace(" ", "", $key)) . '_night_std_fare', 'key_value' => '20', 'type_id' => $new->id]);

		return redirect()->route('truck-types.index');
	}

	public function edit($id) {
		$data['truck_type'] = TruckType::find($id);
		return view('truck_types.edit', $data);
	}

	public function update(TruckTypeRequest $request) {
		if ($request->isenable == 1) {
			$enable = 1;
		} else {
			$enable = 0;
		}
		$data = TruckType::find($request->get('id'));
		$data->update([
			'brand' => $request->brand,
			'model' => $request->model,
			'trucktype' => $request->trucktype,
			'displayname' => $request->displayname,
			'isenable' => $enable,
			'cylinder_capacity' => $request->cylinder_capacity,
			'km_per_liter' => $request->km_per_liter,
			'hour_per_liter' => $request->hour_per_liter,
		]);

		$file = $request->file('icon');
		if ($request->hasFile('icon') && $request->file('icon')->isValid()) {
			$destinationPath = './uploads'; // upload path
			$extension = $file->getClientOriginalExtension();

			$fileName1 = 'truck_type_' . time() . '.' . $extension;

			$file->move($destinationPath, $fileName1);
			$data->icon = $fileName1;
			$data->save();
		}

		$settings = FareSettings::where('type_id', $request->get('id'))->get();
		// dd($settings);
		foreach ($settings as $key) {
			// echo "old  " . $key->key_name . "  === ";
			// echo "new " . str_replace($request->get('old_type'), strtolower(str_replace(' ', '', $request->get('type'))), $key->key_name) . "<br>";

			// update key_name in fare settings
			$key->key_name = str_replace($request->get('old_type'), strtolower(str_replace(' ', '', $request->get('trucktype'))), $key->key_name);
			$key->save();
		}

		return redirect()->route('truck-types.index');
	}

	public function destroy(Request $request) {
		TruckType::find($request->get('id'))->delete();
		return redirect()->route('truck-types.index');
	}

	public function bulk_delete(Request $request) {
		TruckType::whereIn('id', $request->ids)->delete();
		return back();
	}
}