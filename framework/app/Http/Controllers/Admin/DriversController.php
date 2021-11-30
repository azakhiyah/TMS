<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DriversRequest;
use App\Http\Requests\ImportRequest;
use App\Model\Drivers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
Use Importer;
use Validator;


class DriversController extends Controller
{
    Public function importDrivers(ImportRequest $Request)
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
     
      //protected $fillable = ['name','address','city','province','postal_code','country','longitude','latitude','phone','email_WH','note'];
      foreach ($collection as $drivers) {
                  if ($drivers[0] != null) {
                      Drivers::create([
                        'name' => $drivers[0],
                        'address' => $drivers[1],
                        'phone' => $drivers[2],
                        'sex' => $drivers[3],
                        'sim_number' => $drivers[4],
                        'sim_exp_date' => $drivers[5],
                        'driver_image' => $drivers[6],
                        'emergency_contact' => $drivers[7],
                        'gatepass' => $drivers[8],
                        'gatepass_rls_date' => $drivers[9],
                        'gatepass_exp_date' => $drivers[10],
                        'join_date' => $drivers[11],
                       ]);
                       $drivers->save();
                  }

              }
              return back();
    }

    public function index()
    {
        
      
        
        $index['data'] = Drivers::orderBy('id', 'desc')->get();
        return view('drivers.index', $index);
    }

    public function create()
    {
    
        return view("drivers.create");
    }
    
    public function store(DriversRequest $request)
    {           
    
        
        $id = Drivers::create([
                        "name" => $request->get("name"),
                        "address" => $request->get("address"),
                        "phone" => $request->get("phone"),
                        "sex" => $request->get("sex"),
                        "sim_number" => $request->get("sim_number"),
                        "sim_exp_date" => $request->get("sim_exp_date"),
                        "driver_image" => $request->get("driver_image"),
                        "emergency_contact" => $request->get("emergency_contact"),
                        'gatepass' => $request->get("gatepass"),
                        'gatepass_rls_date' =>  $request->get("gatepass_rls_date"),
                        'gatepass_exp_date' => $request->get("gatepass_exp_date"),
                        "join_date" => $request->get("join_date"),
                     ])->id;
                     $drivers = Drivers::find($id);
                     $drivers->name = $request->get("name");
                     $drivers->address = $request->get("address");
                     $drivers->phone = $request->get("phone");
                     $drivers->sex = $request->get("sex");
                     $drivers->sim_number = $request->get("sim_number");
                     $drivers->sim_exp_date = $request->get("sim_exp_date");
                    //  $file = $request->file('driver_image');

                    //  if ($request->hasFile('driver_image') && $request->file('driver_image')->isValid()) {
                    //      $destinationPath = './uploads'; // upload path
                    //      $extension = $file->getClientOriginalExtension();
             
                    //      $fileName1 = 'drivers' . time() . '.' . $extension;
             
                    //      $file->move($destinationPath, $fileName1);
                    //      $new->icon = $fileName1;
                    //      $new->save();
                    //  }
                     $drivers->driver_image = $request->get("driver_image");
                     $drivers->emergency_contact = $request->get("emergency_contact");
                     $drivers->gatepass = $request->get("gatepass");
                     $drivers->gatepass_rls_date = $request->get("gatepass_rls_date");
                     $drivers->gatepass_exp_date = $request->get("gatepass_exp_date");
                     $drivers->join_date = $request->get("join_date");
                     $drivers->save();
             
                     return redirect()->route("drivers.index");

    }

    public function edit($id)
    {
       
        $index['data'] = Drivers::whereId($id)->first();
        return view("drivers.edit", $index);
    }

    public function update(DriversRequest $request)
    {

        $drivers = Drivers::find($request->id);
      
        
        $drivers->name = $request->get("name");
        $drivers->address = $request->get("address");
        $drivers->phone = $request->get("phone");
        $drivers->sex = $request->get("sex");
        $drivers->sim_number = $request->get("sim_number");
        $drivers->sim_exp_date = $request->get("sim_exp_date");
        $drivers->driver_image = $request->get("driver_image");
        $drivers->emergency_contact = $request->get("emergency_contact");
        $drivers->gatepass = $request->get("gatepass");
        $drivers->gatepass_rls_date = $request->get("gatepass_rls_date");
        $drivers->gatepass_exp_date = $request->get("gatepass_exp_date");
        $drivers->join_date = $request->get("join_date");
        $drivers->save();
             
        return redirect()->route("drivers.index");
    }

    public function view_event($id)
    {

        $data['drivers'] = Drivers::where('id', $id)->get()->first();
        return view("drivers.view_event", $data);

    }


    public function destroy(Request $request)
    {
            Drivers::find($request->get('id'))->delete();
            return redirect()->route('drivers.index');
    }

    public function bulk_delete(Request $request)
        {
            Drivers::whereIn('id', $request->ids)->delete();
            return back();
        }
    }

    
