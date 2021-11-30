<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryOrderRequest;
use App\Http\Requests\ImportRequest;
use App\Model\PickupbyTransport;
use App\Model\DeliveryOrder;
use App\Model\Customers;
use App\Model\CustomerLocation;
use App\Model\Depo;
use App\Model\Drivers;
use App\Model\OrderPlan;
use App\Model\Warehouse;
use App\Model\Trucks;
use App\Model\Transporter;
use App\Model\Trailers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
Use Importer;
use Validator;
use DB;


class DeliveryOrderController extends Controller
{
    Public function importDeliveryOrder(ImportRequest $Request)
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
      foreach ($collection as $do) {
                  if ($do[0] != null) {
                    DeliveryOrder::create([
                          'no_PO' => $do[0],
                          'no_SO' => $do[1],
                          'no_LO' => $do[2],
                          'customers' => $do[3],
                          'customer_location' => $do[4],
                          'depo' => $do[5],
                          'product' => $do[6],
                          'qty_order' => $do[7],
                          'warehouse' => $do[8],
                          'driver'=> $do[9],
                          'door_number' => $do[10],
                          'transporter' => $do[11],
                          'trailers' => $do[12],
                          'license_plate'=> $do[13],
                          'status' => $do[14],
                          'compartement' => $do[15],
                          'note' => $do[16],
                          'qty_delivery' => $do[17],
                          'date_delivery' => $do[18],
                          'actual_delivery' => $do[19],
                          'attachment1' => $do[20],
                          'attachment2' => $do[21],

                       ]);
                       $do->save();
                  }

              }
              return back();
    }

    public function index()
    {  $index['data'] = DeliveryOrder::orderBy('id', 'desc')->get();
        return view('delivery_order.index', $index);

       
    }

    public function create()
    { 
        
        $index['customers'] = PickupbyTransport::all();
        $index['address'] = PickupbyTransport::all();
        $index['no_PO'] = PickupbyTransport::all();
        $index['no_SO'] =PickupbyTransport::all();
        $index['no_LO'] =PickupbyTransport::all();
        $index['product'] = PickupbyTransport::all();
        $index['depo'] = PickupbyTransport::all();
        $index['warehouse'] = Warehouse::all();
        $index['drivers'] = Drivers::all();
        $index['door_number'] = Trucks::all();
        $index['transporter'] =Transporter::all();
        $index['trailers'] =Trailers::all();
    
    

        return view("delivery_order.create", $index);
   
    }
    
    public function store(DeliveryOrderRequest $request)
    {           
        //   dd($request->all());
       $pickup = PickupbyTransport::where('id', $request->get('no_SO'))->first();

                    $id = DeliveryOrder::create([
                        'no_SO' => $pickup->no_SO,
                        'no_PO' => $pickup->no_PO,
                        'no_LO' => $pickup->no_LO,
                        'customers_id' => $pickup->customers->id,
                        'customers_name' => $pickup->customers->name,
                        'customer_location_id' => $pickup->customerslocation->id,
                        'customer_location_address' => $pickup->customerslocation->address,
                        'qty_order' =>  $pickup->qty_order,
                        'product_id' =>  $pickup->product->id,
                        'product_name' =>  $pickup->product->name,
                        'warehouse_id' =>  $pickup->warehouse->id,
                        'warehouse_name' =>  $pickup->warehouse->name,
                        'depo_id' =>  $pickup->depo->id,
                        'depo_name' =>  $pickup->depo->name,
                        'drivers_id' =>  $pickup->drivers->id,
                        'drivers_name' =>  $pickup->drivers->name,
                        'trucks_id' =>  $pickup->trucks->id,
                        'door_number' =>  $pickup->trucks->door_number,
                        'license_plate' =>  $pickup->license_plate,
                        'transporter_id' =>  $pickup->transporter->id,
                        'transporter_name' =>  $pickup->transporter->name,
                        'trailers_id' =>  $pickup->trailers->id,
                        'trailers_name' =>  $pickup->trailers->brand,
                        'status' => $pickup->status,
                        'compartement' => $pickup->compartement,
                        'note' => $request->get('note'),
                        'statusdelivery' => $request->get('statusdelivery'),
                        'qty_delivery' => $request->get('qty_delivery'),
                        'date_delivery' => $request->get('date_delivery'),
                        'actual_delivery' => $request->get('actual_delivery'),                            
                        'attachment1' => $request->get('attachment1'),
                        'attachment2' => $request->get('attachment2'),                        

                     ])->id;

                    //  $do = DeliveryOrder::find($id);
                    //  $do->no_SO = $noSO;
                    //  $do->no_PO = $request->get("no_PO");
                    //  $do->no_LO = $request->get("no_LO");
                    //  $do->customers = $request->get("customers_id");
                    //  $do->customer_location = $request->get("customer_location_id");
                    //  $do->qty_order = $request->get("qty_order");
                    //  $do->product = $request->get("product_id");
                    // // $do->planning_at = $request->get('planning_at');
                    //  $do->warehouse  = $request->get('warehouse_id');
                    //  $do->depo = $request->get("depo_id");
                    //  $do->drivers = $request->get('drivers_id');
                    //  $do->door_number = $request->get('door_number');
                    //  $do->transporter = $request->get('transporter_id');
                    //  $do->trailers = $request->get('trailers_id');
                    //  //$do->license_plate = $request->get('license_plate');
                    //  $do->status = $request->get('status');
                    //  $do->compartement = $request->get('compartement');
                    //  $do->note = $request->get('note');
                    //  $do->qty_delivery = $request->get('qty_delivery');
                    //  $do->date_delivery = $request->get('date_delivery');
                    //  $do->attachment1 = $request->get('attachment1');
                    //  $do->attachment2 = $request->get('attachment2');
                        

                    //  $do->save();

                     //$pickup_id = $do;
             
                     return redirect()->route("delivery_order.index");

    }

    public function edit($id)
    {    

        // $index['customers'] = PickupbyTransport::all();
        // $index['address'] = PickupbyTransport::all();
        // $index['no_PO'] = PickupbyTransport::all();
        // $index['no_SO'] =PickupbyTransport::all();
        // $index['no_LO'] =PickupbyTransport::all();
        // $index['product'] = PickupbyTransport::all();
        // $index['depo'] = PickupbyTransport::all();
        // $index['warehouse'] = Warehouse::all();
        // $index['drivers'] = Drivers::all();
        // $index['door_number'] = Trucks::all();
        // $index['transporter'] =Transporter::all();
        // $index['trailers'] =Trailers::all();
    
    

        // return view("delivery_order.create", $index);


        $index['pickups'] = PickupbyTransport::all();
        $index['orderplan'] = OrderPlan::all();
        $index['customers'] = OrderPlan::all();
        $index['product'] = OrderPlan::all();
        $index['warehouse'] = Warehouse::all();
        $index['address'] = CustomerLocation::all();
        $index['trucks'] = Trucks::all();
        $index['transporter'] =Transporter::all();
        $index['drivers'] =Drivers::all();
        $index['door_number'] = Trucks::all();
        $index['trailers'] =Trailers::all();
        $index['data'] = DeliveryOrder::whereId($id)->first();
        return view("delivery_order.edit", $index);
    }

    public function update(DeliveryOrderRequest $request)
    {


        $pickup = PickupbyTransport::where('id', $request->get('no_SO'))->first();
         

        /* update */
        $do = DeliveryOrder::find($request->id);      
        
        $do->no_SO = $pickup->no_SO;
        $do->no_PO = $pickup->no_PO;
        $do->no_LO = $pickup->no_LO;
        $do->customers_id = $pickup->customers->id;
        $do->customers_name = $pickup->customers->name;
        $do->customer_location_id = $pickup->customerslocation->id;
        $do->customer_location_address = $pickup->customerslocation->address;
        $do->qty_order = $pickup->qty_order;
        $do->product_id  = $pickup->product->id;
        $do->product_name= $pickup->product->name;
        $do->warehouse_id =$pickup->warehouse->id;
        $do->warehouse_name =$pickup->warehouse->name;
        $do->depo_id =  $pickup->depo->id;
        $do->depo_name= $pickup->depo->name;
        $do->drivers_id =  $pickup->drivers->id;
        $do->drivers_name = $pickup->drivers->name;
        $do->door_number =  $pickup->trucks->door_number;
        $do->license_plate =  $pickup->license_plate;
        $do->transporter_id =  $pickup->transporter->id;
        $do->transporter_name =  $pickup->transporter->name;
        $do->trailers_id =  $pickup->trailers->id;
        $do->trailers_name =  $pickup->trailers->brand;
        $do->status = $pickup->status;
        $do->compartement = $pickup->compartement;
        $do->note = $request->get('note');
        $do->statusdelivery = $request->get('statusdelivery');
        $do->qty_delivery = $request->get('qty_delivery');
        $do->date_delivery = $request->get('date_delivery');
        $do->actual_delivery = $request->get('actual_delivery');                        
        $do->attachment1 = $request->get('attachment1');
        $do->attachment2 = $request->get('attachment2');    

        $do->save();
             
        return redirect()->route("delivery_order.index");
    }

    public function get_orderSO(Request $request)
    { 
        // dd('alo test');
        //dd(request);
       
        $pick = PickupbyTransport::where('id', $request->get('id'))->orderBy('id', 'desc')->first();

        if ($pick != null) {
            $r = array('no_PO' => $pick->no_PO,'no_LO' => $pick->no_LO, 'customers' => $pick->customers, 
            'customer_location' => $pick->customerslocation, 'product' => $pick->product,'qty_order' => $pick->qty_order,
            'depo' => $pick->depo,'warehouse' => $pick->warehouse, 'drivers' => $pick->drivers,'door_number' => $pick->door_number,
            'transporter' => $pick->transporter,'trailers' => $pick->trailers, 'compartement' => $pick->compartement,
            'license_plate' => $pick->license_plate);
        } else {
            $r = array('no_PO' => "",'no_LO' =>"", 'customers' => "", 
            'customer_location' => "", 'product' => "",'qty_order' => "",
            'depo' => "",'warehouse' => "", 'drivers' => "",'door_number' => "",
            'transporter' => "",'trailers' => "", 'compartement' => "", 
            'license_plate' => "");
        
        }

         
        //return $r;
        //untuk debug response dari variable yang dipanggil
        return response()->json($r);
      

        //untuk debug response json
        // return response()->json(['success'=>'Record is successfully added']);         
        // return Response::json(['msg' => 'Error msg']);

    }

    public function get_plate(Request $request)
    {  
        $plate= Trucks::where('id', $request->get('id'))->orderBy('id', 'desc')->first();
        if ($plate != null) {
            $r = array('license_plate' => $plate->license_plate);
        } else {
            $r = array('license_plate' => "");
        }

        return $r;
    }
/*
   public function getCustomers()
    {
        $customers = DB::table('customers')->pluck("name","id");
        return view('order_plan.create',compact('customers'));
    }

    public function getAddress($customers_id) 
    {
        //$address = DB::table("customer_location")->where("customers_id",$id)->pluck("address","id");
        //return json_encode($address);
        $customers = Customers::find($customers_id);
        return $customers->customerlocation()->select('id', 'address')->get();
    }
   

   
    */

    public function view_event($id)
    {
       

        $data['delivery'] = DeliveryOrder::where('id', $id)->get()->first();
        return view("delivery_order.view_event", $data);
    }

    public function destroy(Request $request)
    {
        DeliveryOrder::find($request->get('id'))->delete();
            return redirect()->route('delivery_order.index');
    }

    public function bulk_delete(Request $request)
        {
            DeliveryOrder::whereIn('id', $request->ids)->delete();
            return back();
        }
    }

    
