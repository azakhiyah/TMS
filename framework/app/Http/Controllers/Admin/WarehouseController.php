<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WarehouseRequest;
use App\Http\Requests\ImportRequest;
use App\Model\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
Use Importer;
use Validator;


class WarehouseController extends Controller
{
    Public function importWarehouse(ImportRequest $Request)
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
      foreach ($collection as $warehouse) {
                  if ($warehouse[0] != null) {
                      Warehouse::create([
                          'name' => $warehouse[0],
                          'address' => $warehouse[1],
                          'city' => $warehouse[2],
                          'province' => $warehouse[3],
                          'postal_code' => $warehouse[4],
                          'country' => $warehouse[5],
                          'longitude' => $warehouse[6],
                          'latitude' => $warehouse[7],
                          'phone' => $warehouse[8],
                          'email_WH' => $warehouse[9],
                          'note' => $warehouse[10],
                       ]);
                       $warehouse->save();
                  }

              }
              return back();
    }

    public function index()
    {
        
      
        
        $index['data'] = Warehouse::orderBy('id', 'desc')->get();
        return view('warehouse.index', $index);
    }

    public function create()
    {
    
        return view("warehouse.create");
    }
    
    public function store(WarehouseRequest $request)
    {            $id = Warehouse::create([
                        "name" => $request->get("first_name"),
                        "address" => $request->get("address"),
                        "city" => $request->get("city"),
                        "province" => $request->get("province"),
                        "postal_code" => $request->get("postal_code"),
                        "country" => $request->get("country"),
                        "longitude" => $request->get("longitude"),
                        "latitude" => $request->get("latitude"),
                        "phone" => $request->get("phone"),
                        "email_WH" =>$request->get("email_WH"),
                        "Note" => $request->get("Note"),
                     ])->id;
                     $warehouse = Warehouse::find($id);
                     $warehouse->name = $request->get("name");
                     $warehouse->address = $request->get("address");
                     $warehouse->city = $request->get("city");
                     $warehouse->province = $request->get("province");
                     $warehouse->postal_code = $request->get("postal_code");
                     $warehouse->country = $request->get("country");
                     $warehouse->longitude = $request->get("longitude");
                     $warehouse->latitude = $request->get("latitude");
                     $warehouse->phone = $request->get("phone");
                     $warehouse->email_WH = $request->get("email_WH");
                     $warehouse->note = $request->get("note");
                     $warehouse->save();
             
                     return redirect()->route("warehouse.index");

    }

    public function edit($id)
    {
       
        $index['data'] = Warehouse::whereId($id)->first();
        return view("warehouse.edit", $index);
    }

    public function update(WarehouseRequest $request)
    {

        $warehouse = Warehouse::find($request->id);
      
        // $user->password = bcrypt($request->get("password"));
        // $user->save();
        $warehouse->name = $request->get("name");
        $warehouse->address = $request->get("address");
        $warehouse->city = $request->get("city");
        $warehouse->province = $request->get("province");
        $warehouse->postal_code = $request->get("postal_code");
        $warehouse->country = $request->get("country");
        $warehouse->longitude = $request->get("longitude");
        $warehouse->latitude = $request->get("latitude");
        $warehouse->phone = $request->get("phone");
        $warehouse->email_WH = $request->get("email_WH");
        $warehouse->note = $request->get("note");
        $warehouse->save();
        return redirect()->route("warehouse.index");
    }

    public function view_event($id)
    {

        $data['warehouse'] = Warehouse::where('id', $id)->get()->first();
        return view("warehouse.view_event", $data);

    }


    public function destroy(Request $request)
    {
            Warehouse::find($request->get('id'))->delete();
            return redirect()->route('warehouse.index');
    }

    public function bulk_delete(Request $request)
        {
            Warehouse::whereIn('id', $request->ids)->delete();
            return back();
        }
    }

    
