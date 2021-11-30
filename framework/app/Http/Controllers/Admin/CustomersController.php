<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomersRequest;
use App\Http\Requests\ImportRequest;
use App\Model\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
Use Importer;
use Validator;


class CustomersController extends Controller
{
    Public function importCustomers(ImportRequest $Request)
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
      foreach ($collection as $customers) {
                  if ($customers[0] != null) {
                      Customers::create([
                          'name' => $customers[0],
                       ]);
                       $customers->save();
                  }

              }
              return back();
    }

    public function index()
    {
        
      
        
        $index['data'] = Customers::orderBy('id', 'desc')->get();
        return view('customers.index', $index);
    }

    public function create()
    {
    
        return view("customers.create");
    }
    
    public function store(CustomersRequest $request)
    {            $id = Customers::create([
                        "name" => $request->get("name"),
                     ])->id;
                     $customers = Customers::find($id);
                     $customers->name = $request->get("name");
                     $customers->save();
             
                     return redirect()->route("customers.index");

    }

    public function edit($id)
    {
       
        $index['data'] = Customers::whereId($id)->first();
        return view("customers.edit", $index);
    }

    public function update(CustomersRequest $request)
    {

        $customers = Customers::find($request->id);
      
        // $user->password = bcrypt($request->get("password"));
        // $user->save();
        $customers->name = $request->get("name");
        $customers->save();
        return redirect()->route("customers.index");
    }

    public function view_event($id)
    {

        $data['customers'] = Customers::where('id', $id)->get()->first();
        return view("customers.view_event", $data);

    }


    public function destroy(Request $request)
    {
            Customers::find($request->get('id'))->delete();
            return redirect()->route('customers.index');
    }

    public function bulk_delete(Request $request)
        {
            Customers::whereIn('id', $request->ids)->delete();
            return back();
        }
    }

    
