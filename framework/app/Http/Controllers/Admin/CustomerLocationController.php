<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerLocationRequest;
use App\Http\Requests\ImportRequest;
use App\Model\CustomerLocation;
use App\Model\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
Use Importer;
use Validator;


class CustomerLocationController extends Controller
{
    Public function importCustomerLocation(ImportRequest $Request)
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
      foreach ($collection as $clocation) {
                  if ($clocation[0] != null) {
                    CustomerLocation::create([
                          'name' => $clocation[0],
                          'address' => $clocation[1],
                          'city' => $clocation[2],
                          'province' => $clocation[3],
                          'postal_code' => $clocation[4],
                          'country' => $clocation[5],
                          'longitude' => $clocation[6],
                          'latitude' => $clocation[7],
                          'phone' => $clocation[8],
                          'email_customer' => $clocation[9],
                          'note' => $clocation[10],
                       ]);
                       $clocation->save();
                  }

              }
              return back();
    }

    public function index()
    {
        $index['data'] = CustomerLocation::orderBy('id', 'desc')->get();
        return view('clocation.index', $index);
    }

    public function create()
    {
       $index['name'] = Customers::all();
        return view("clocation.create", $index);
    }
    
    public function store(CustomerLocationRequest $request)
    {            $id = CustomerLocation::create([

                        "name" => $request->get("name"),
                        "address" => $request->get("address"),
                        "city" => $request->get("city"),
                        "province" => $request->get("province"),
                        "postal_code" => $request->get("postal_code"),
                        "country" => $request->get("country"),
                        "longitude" => $request->get("longitude"),
                        "latitude" => $request->get("latitude"),
                        "phone" => $request->get("phone"),
                        "email_customer" =>$request->get("email_customer"),
                        "Note" => $request->get("Note"),
                        "customers_id" => $request->get("customers_id"),
                     ])->id;
                     $clocation = CustomerLocation::find($id);
                     $clocation->name = $request->get("name");
                     $clocation->address = $request->get("address");
                     $clocation->city = $request->get("city");
                     $clocation->province = $request->get("province");
                     $clocation->postal_code = $request->get("postal_code");
                     $clocation->country = $request->get("country");
                     $clocation->longitude = $request->get("longitude");
                     $clocation->latitude = $request->get("latitude");
                     $clocation->phone = $request->get("phone");
                     $clocation->email_customer = $request->get("email_customer");
                     $clocation->note = $request->get("note");
                     $clocation->customers_id = $request->get("customers_id");
                     $clocation->save();

                     $clocation_id = $clocation;
             
                     return redirect()->route("clocation.index");

    }

    public function edit($id)
    {   $customers = Customers::all();
        $clocation = CustomerLocation::all();
        $index['name'] = Customers::all();
        //$clocation = CustomerLocation::whereId($id)->first();
        //$index['customers'] = Customers::all();
        $index['data'] = CustomerLocation::whereId($id)->first();
        return view("clocation.edit", $index);
    }

    public function update(CustomerLocationRequest $request)
    {

        $clocation = CustomerLocation::find($request->id);
      
        // $user->password = bcrypt($request->get("password"));
        // $user->save();
        //$clocation->name = $request->get("name");
        $clocation->address = $request->get("address");
        $clocation->city = $request->get("city");
        $clocation->province = $request->get("province");
        $clocation->postal_code = $request->get("postal_code");
        $clocation->country = $request->get("country");
        $clocation->longitude = $request->get("longitude");
        $clocation->latitude = $request->get("latitude");
        $clocation->phone = $request->get("phone");
        $clocation->email_customer= $request->get("email_customer");
        $clocation->note = $request->get("note");
        $clocation->customers_id = $request->get("customers_id");
        $clocation->save();
        return redirect()->route("clocation.index");
    }

    public function view_event($id)
    {

        $data['clocation'] = CustomerLocation::where('id', $id)->get()->first();
        return view("clocation.view_event", $data);

    }


    public function destroy(Request $request)
    {
        CustomerLocation::find($request->get('id'))->delete();
            return redirect()->route('clocation.index');
    }

    public function bulk_delete(Request $request)
        {
        CustomerLocation::whereIn('id', $request->ids)->delete();
            return back();
        }
    }

    
