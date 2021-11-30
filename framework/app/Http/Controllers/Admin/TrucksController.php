<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrucksRequest;
use App\Http\Requests\ImportRequest;
use App\Model\Trucks;
use App\Model\TruckType;
use App\Model\Trailers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
Use Importer;
use Validator;


class TrucksController extends Controller
{
    Public function importTrucks(ImportRequest $Request)
    {
      $file = $request->excel;
      $destinationPath = './assets/samples/'; // upload path
      $extension = $file->getClientOriginalExtension();
      $fileName = Str::uuid() . '.' . $extension;
      $file->move($destinationPath, $fileName);

      $excel = Importer::make('Excel');
      $excel->load('assets/samples/' . $fileName);
      $collection = $excel->getCollection()->toArray();
      array_shift($collection);
      foreach ($collection as $trucks) {
                  if ($trucks[0] != null) {
                      trucks::create([
                          //'make' => $trucks[0],
                          //'model' => $trucks[1],
                          'type' => $trucks[1],
                          'year' => $trucks[2],
                          //'truck_image' => $trucks[4],
                          'vin' => $trucks[3],
                          'machine_number' => $trucks[4],
                          'license_plate' => $trucks[5],
                          'lic_exp_date' => $trucks[6],
                          'tax' => $trucks[7],
                          'tax_exp_date' => $trucks[8],
                          'kir' => $trucks[9],
                          'tera_sertifikat' => $trucks[10],
                          'tera_rls_date' => $trucks[11],
                          'tera_exp_date' => $trucks[12],
                          'gate_pass' => $trucks[13],
                          'gatepass_rls_date' => $trucks[14],
                          'gatepass_exp_date' => $trucks[15],
                          'door_number' => $trucks[16],
                          'owner_type' => $trucks[17],
                          'flowmeter' => $trucks[18],
                          'trailers' => $trucks[19],
                       ]);
                       $trucks->save();
                  }

              }
              return back();
    }

    public function index()
    {
        
      
        
        $index['data'] = Trucks::orderBy('id', 'desc')->get();
        return view('trucks.index', $index);
    }

    public function create()
    {
        $index['types'] = TruckType::all();
        $index['trailer'] = Trailers::all();
        return view("trucks.create", $index);
       // return view("trucks.create");
    }
    
    public function store(TrucksRequest $request)
    {           
       // dd($request->get("type_id"));
       //Log::Debug();
                    $id = Trucks::create([
                        //'make' =>  $request->get("make"),
                        //'model' => $request->get("model"),
                        'type' =>  $request->get("type_id"),
                        'year' =>  $request->get("year"),
                        //'truck_image' =>  $request->get("truck_image"),
                        'vin' =>  $request->get("vin"),
                        'machine_number' =>  $request->get("machine_number"),
                        'license_plate' =>  $request->get("license_plate"),
                        'lic_exp_date' =>  $request->get("lic_exp_date"),
                        'tax_number' =>  $request->get("tax_number"),
                        'tax_exp_date' => $request->get("tax_exp_date"),
                        'kir' => $request->get("kir"),
                        'tera_sertifikat' => $request->get("tera_sertifikat"),
                        'tera_rls_date' => $request->get("tera_rls_date"),
                        'tera_exp_date' => $request->get("tera_exp_date"),
                        'gate_pass' => $request->get("gate_pass"),
                        'gatepass_rls_date' => $request->get("gatepass_rls_date"),
                        'gatepass_exp_date' => $request->get("gatepass_exp_date"),
                        'door_number' => $request->get("door_number"),
                        'owner_type' => $request->get("owner_type"),
                        'flowmeter' => $request->get("flowmeter"),
                        'trailers' => $request->get('trailers'),
                        'type_id' => $request->get('type_id'),
                     ])->id;
                     $trucks = Trucks::find($id);
                     //$trucks->make = $request->get("make");
                     //$trucks->model = $request->get("model");
                     $trucks->type = $request->get("type_id");
                     $trucks->year = $request->get("year");
                     //$trucks->truck_image = $request->get("truck_image");
                     $trucks->vin = $request->get("vin");
                     $trucks->machine_number = $request->get("machine_number");
                     $trucks->license_plate = $request->get("license_plate");
                     $trucks->lic_exp_date = $request->get("lic_exp_date");
                     $trucks->tax_number = $request->get("tax_number");
                     $trucks->tax_exp_date = $request->get("tax_exp_date");
                     $trucks->kir = $request->get("kir");
                     $trucks->tera_sertifikat = $request->get("tera_sertifikat");
                     $trucks->tera_rls_date = $request->get("tera_rls_date");
                     $trucks->tera_exp_date = $request->get("tera_exp_date");
                     $trucks->gate_pass = $request->get("gate_pass");
                     $trucks->gatepass_rls_date = $request->get("gatepass_rls_date");
                     $trucks->gatepass_exp_date = $request->get("gatepass_exp_date");
                     $trucks->door_number = $request->get("door_number");
                     $trucks->owner_type = $request->get("owner_type");
                     $trucks->flowmeter = $request->get("flowmeter");
                     $trucks->trailers = $request->get("trailers");
                     $trucks->type_id = $request->get("type_id");
                     $trucks->save();

                     $truck_id = $trucks;
             
                     return redirect()->route("trucks.index");

    }

    public function edit($id)
    {
        $index['types'] = TruckType::all();
        $index['data'] = Trucks::whereId($id)->first();
        return view("trucks.edit", $index);
    }

    public function update(TrucksRequest $request)
    {

        $trucks = Trucks::find($request->id);
      
        //$trucks = Trucks::find($id);
        //$trucks->make = $request->get("make");
        //$trucks->model = $request->get("model");
        $trucks->type = $request->get("type_id");
        $trucks->year = $request->get("year");
        //$trucks->truck_image = $request->get("truck_image");
        $trucks->vin = $request->get("vin");
        $trucks->machine_number = $request->get("machine_number");
        $trucks->license_plate = $request->get("license_plate");
        $trucks->lic_exp_date = $request->get("lic_exp_date");
        $trucks->tax_number = $request->get("tax_number");
        $trucks->tax_exp_date = $request->get("tax_exp_date");
        $trucks->kir = $request->get("kir");
        $trucks->tera_sertifikat = $request->get("tera_sertifikat");
        $trucks->tera_rls_date = $request->get("tera_rls_date");
        $trucks->tera_exp_date = $request->get("tera_exp_date");
        $trucks->gate_pass = $request->get("gate_pass");
        $trucks->gatepass_rls_date = $request->get("gatepass_rls_date");
        $trucks->gatepass_exp_date = $request->get("gatepass_exp_date");
        $trucks->door_number = $request->get("door_number");
        $trucks->type_id = $request->get("type_id");
        $trucks->owner_type = $request->get("owner_type");
        $trucks->flowmeter = $request->get("flowmeter");
        $trucks->trailers = $request->get("trailers");
        $trucks->save();
             
        return redirect()->route("trucks.index");
    }

    public function view_event($id)
    {

        $data['trucks'] = Trucks::where('id', $id)->get()->first();
        return view("trucks.view_event", $data);
    }


    
    public function destroy(Request $request)
    {
            Trucks::find($request->get('id'))->delete();
            return redirect()->route('trucks.index');
    }

    public function bulk_delete(Request $request)
        {
            Trucks::whereIn('id', $request->ids)->delete();
            return back();
        }

    public function get_buntut(Request $request)
        {
            //dd('alo test');
            // dd(request);
          
           
            $buntut= Trailers::where('id', $request->get('id'))->orderBy('id', 'desc')->first();
            if ($buntut != null) {
                $r = array('tera_sertifikat' => $buntut->tera_sertifikat); 
                // 'tera_sertifikat' => $trailer->tera_sertifikat, 'tera_rls_date' => $trailer->tera_rls_date,
                // 'tera_exp_date' => $trailer->tera_exp_date);
                
                } else {
                    $r = array('tera_sertifikat' => "");
                }
             //return $r;
             return response()->json($r);
        }
    }

    
