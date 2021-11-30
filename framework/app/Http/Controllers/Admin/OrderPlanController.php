<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderPlanRequest;
use App\Http\Requests\ImportRequest;
use App\Model\OrderPlan;
use App\Model\Customers;
use App\Model\User;
use App\Model\CustomerLocation;
use App\Model\Depo;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
Use Importer;
use Validator;
use DB;


class OrderPlanController extends Controller
{
    Public function importOrderPlan(ImportRequest $Request)
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
      foreach ($collection as $orderplan) {
                  if ($orderplan[0] != null) {
                      orderplan::create([
                          'no_PO' => $orderplan[0],
                          'no_SO' => $orderplan[1],
                          'no_LO' => $orderplan[2],
                          'customer' => $orderplan[3],
                          //'truck_image' => $orderplan[4],
                          'customer_location' => $orderplan[4],
                          'depo' => $orderplan[5],
                          'product' => $orderplan[6],
                          'qty_order' => $orderplan[7],
                          'attachment' => $orderplan[8],
                       ]);
                       $orderplan->save();
                  }

              }
              return back();
    }

    public function index()
    {  $index['data'] = OrderPlan::orderBy('id', 'desc')->get();
        return view('order_plan.index', $index);

       
            $customers = Customers::pluck('name', 'id');
    
            return view('order_plan.index', [
                'customers' => $customers,
            ]);
    
        //$index['data'] = OrderPlan::orderBy('id', 'desc')->get();
        //return view('order_plan.index', $index);
    }

    public function create()
    { 
        
        //$index['customer'] = User::all();
        $index['name'] = Customers::all();
        
        $index['address'] = CustomerLocation::all();
       // $index['customers_location'] = CustomerLocation::all();
        

        $index['product'] = Product::all();
        $index['depo'] = Depo::all();
        
        //$index['address'] = Customers::find($id);
        //return $customers->customerlocation()->select('id', 'address')->get();

        return view("order_plan.create", $index);
   
    }
    
    public function store(OrderPlanRequest $request)
    {           
       // dd($request->get("type_id"));
       //Log::Debug();
                    $id = OrderPlan::create([
                        'no_SO' =>  $request->get("no_SO"),
                        'no_PO' => $request->get("no_PO"),
                        //'type' =>  $request->get("type_id"),
                        'no_LO' =>  $request->get("no_LO"),
                        'qty_order' =>  $request->get("qty_order"),
                        'attachment' =>  $request->get("attachment"),
                        'customers_id' => $request->get('customer_id'),
                        'address' => $request->get('address'),
                        'customer_location_id' => $request->get('customer_location_id'),
                        'depo_id' => $request->get('depo_id'),
                        'product_id' => $request->get('product_id'),
                     ])->id;
                     $orderplan = OrderPlan::find($id);
                     $orderplan->no_SO = $request->get("no_SO");
                     $orderplan->no_PO = $request->get("no_PO");
                     //$orderplan->type = $request->get("type_id");
                     $orderplan->no_LO = $request->get("no_LO");
                     $orderplan->customers_id = $request->get("customers_id");
                     $orderplan->address = $request->get("address");
                     $orderplan->customer_location_id = $request->get("customer_location_id");
                     $orderplan->depo_id = $request->get("depo_id");
                     $orderplan->product_id = $request->get("product_id");
                     $orderplan->qty_order = $request->get("qty_order");
                     $orderplan->attachment = $request->get("attachment");
                     $orderplan->save();

                     $orderplan_id = $orderplan;
             
                     return redirect()->route("order_plan.index");

    }

    public function edit($id)
    {   
       
        //get customer id from order plan
        $custId = OrderPlan::whereId($id)->first()->customers_id;

        $index['address'] = CustomerLocation::where('customers_id', $custId)->get();
        $index['name'] = Customers::all();
        $index['product'] = Product::all();
        $index['depo'] = Depo::all();
        $index['data'] = OrderPlan::whereId($id)->first();
        
        return view("order_plan.edit", $index);
    }

    public function update(OrderPlanRequest $request)
    {


        $orderplan = OrderPlan::find($request->id);
      
        //$orderplan = OrderPlan::find($id);
        //$orderplan = OrderPlan::find($id);
        $orderplan->no_PO = $request->get("no_PO");
        $orderplan->no_SO = $request->get("no_SO");
        //$orderplan->type = $request->get("type_id");
        $orderplan->no_LO = $request->get("no_LO");
        $orderplan->qty_order = $request->get("qty_order");
        $orderplan->attachment = $request->get("attachment");
        $orderplan->customers_id = $request->get("customers_id");
        $orderplan->customer_location_id = $request->get("customer_location_id");
        $orderplan->depo_id = $request->get("depo_id");
        $orderplan->product_id = $request->get("product_id");

        $orderplan->save();
             
        return redirect()->route("order_plan.index");
    }

   public function getCustomers()
    {
        $customers = DB::table('customers')->pluck("name","id");
        return view('order_plan.create',compact('customers'));
    }

    public function getAddress(Request $request) 
    {
        //$address = DB::table("customer_location")->where("customers_id",$id)->pluck("address","id");
        //return json_encode($address);
          
        //$customers_id = $request->get("id");
        $customers = Customers::find($customers_id);
        return $customers->customerlocation()->select('id', 'address')->get();

        //$customers_id = $request->get("id");
        //$customers = Customers::find($customers_id);
        //$address = $customers->customerlocation()->select('id', 'address')->get();

        // return response()->json([
        //     'name' => 'Abigail',
        //     'state' => 'CA'
        // ]);

    }


    public function get_address(Request $request) 
    {
        $customers_id = $request->get("id");
        $customers = Customers::find($customers_id);
        $address = $customers->customerlocation()->select('id', 'address')->get();
       
        return response()->json($address);
       
    }
   

    public function view_event($id)
    {

        $data['orderplan'] = OrderPlan::where('id', $id)->get()->first();
        return view("order_plan.view_event", $data);
    }

    public function destroy(Request $request)
    {
            OrderPlan::find($request->get('id'))->delete();
            return redirect()->route('order_plan.index');
    }

    public function bulk_delete(Request $request)
        {
            OrderPlan::whereIn('id', $request->ids)->delete();
            return back();
        }
    }

    
