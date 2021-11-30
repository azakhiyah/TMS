<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PickupbyTransportRequest;
use App\Http\Requests\ImportRequest;
use App\Model\PickupbyTransport;
use App\Model\Customers;
use App\Model\CustomerLocation;
use App\Model\Depo;
use App\Model\Drivers;
use App\Model\OrderPlan;
use App\Model\Warehouse;
use App\Model\Product;
use App\Model\Trucks;
use App\Model\Transporter;
use App\Model\Trailers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
Use Importer;
use Validator;
use DB;


class PickupbyTransportController extends Controller
{
    Public function importPickupbyTransport(ImportRequest $Request)
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
      foreach ($collection as $pickup) {
                  if ($pickup[0] != null) {
                    PickupbyTransport::create([
                          'no_PO' => $pickup[0],
                          'no_SO' => $pickup[1],
                          'no_LO' => $pickup[2],
                          'customers' => $pickup[3],
                          'customer_location' => $pickup[4],
                          'depo' => $pickup[5],
                          'product' => $pickup[6],
                          'qty_order' => $pickup[7],
                          'warehouse' => $pickup[8],
                          'driver'=> $pickup[9],
                          'door_number' => $pickup[10],
                          'transporter' => $pickup[11],
                          'trailers' => $pickup[12],
                          'license_plate'=> $pickup[13],
                          'status' => $pickup[14],
                          'compartement' => $pickup[15],
                          'start_loading' => $pickup[16],
                          'stop_loading' => $pickup[17],
                         'planning_at' => $pickup[18],
                       ]);
                       $pickup->save();
                  }

              }
              return back();
    }

    public function index()
    {
        $index['data'] = PickupbyTransport::orderBy('id', 'desc')->get();
        return view('pickup_bytransport.index', $index);
    }

    public function viewcetak($id)
    { 
       

        $data['cetak'] = PickupbyTransport::find($id);
        //dd($data['cetak']);
        return view("pickup_bytransport.viewcetak", $data);
    }

    function print($id) {

        $data['cetak'] = PickupbyTransport::whereId($id)->get()->first();
        return view("pickup_bytransport.print", $data);
    }

    public function create()
    {

        $index['customers'] = Customers::all();

        $index['address'] = OrderPlan::all();
        $index['no_PO'] = OrderPlan::all();
        $index['no_SO'] = OrderPlan::all();
        $index['no_LO'] = OrderPlan::all();
        $index['product'] = OrderPlan::all();
        $index['depo'] = Depo::all();
        $index['warehouse'] = Warehouse::all();
        $index['drivers'] = Drivers::all();
        $index['door_number'] = Trucks::all();
        $index['transporter'] =Transporter::all();
        $index['trailers'] =Trailers::all();



        return view("pickup_bytransport.create", $index);

    }

    public function store(PickupbyTransportRequest $request)
    {
        $noSO=OrderPlan::where('id', $request->get('no_SO'))->first()->no_SO;
        $customers = Customers::where('id', $request->get('customers_id_hide'))->first()->name;
        $customersLocation = CustomerLocation::where('id', $request->get('customer_location_id_hide'))->first()->address;
        $product = Product::where('id', $request->get('product_id_hide'))->first()->name;
        $warehouse = Warehouse::where('id', $request->get('warehouse_id'))->first()->name;
        $depo = Depo::where('id', $request->get('depo_id'))->first()->name;
        $drivers = Drivers::where('id', $request->get('drivers_id'))->first()->name;
        $transporter = Transporter::where('id', $request->get('transporter_id'))->first()->name;
        $trailers = Trailers::where('id', $request->get('trailers_id'))->first()->brand;
        $trucks = Trucks::where('id', $request->get('door_number'))->first();
        $isStatusChecked = $request->has('chkstatus') ? 1 : 0;
  
        /*save*/
        $pickup = new PickupbyTransport();
        $pickup->no_SO = $noSO;
        $pickup->no_PO = $request->get("no_PO");
        $pickup->no_LO = $request->get("no_LO");
        $pickup->customers_id = $request->get("customers_id_hide");
        $pickup->customers_name = $customers;
        $pickup->customer_location_id = $request->get("customer_location_id_hide");
        $pickup->customer_location_address = $customersLocation;
        $pickup->qty_order = $request->get("qty_order");
        $pickup->product_id = $request->get("product_id_hide");
        $pickup->product_name =$product;
        $pickup->planning_at = $request->get('planning_at');
        $pickup->warehouse_id  = $request->get('warehouse_id');
        $pickup->warehouse_name  = $warehouse;
        $pickup->depo_id = $request->get("depo_id");
        $pickup->depo_name = $depo;
        $pickup->drivers_id = $request->get('drivers_id');
        $pickup->drivers_name = $drivers;
        $pickup->trucks_id = $trucks->id;
        $pickup->door_number = $trucks->door_number;
        $pickup->transporter_id = $request->get('transporter_id');
        $pickup->transporter_name = $transporter;
        $pickup->trailers_id = $request->get('trailers_id');
        $pickup->trailers_name = $trailers;
        $pickup->license_plate = $request->get('license_plate');
        $pickup->status = $isStatusChecked ;
        $pickup->statuspickup = $request->get('statuspickup');
        $pickup->compartement = $request->get('compartement');
        $pickup->start_loading = $request->get('start_loading');
        $pickup->stop_loading = $request->get('stop_loading');
        $pickup->note = $request->get('note');
        $pickup->save();


        return redirect()->route("pickup_bytransport.index");

    }

    public function edit($id)
    {

        
        // $index['orderplan'] = OrderPlan::all();
        $index['no_SO'] = OrderPlan::all();
        $index['customers'] = Customers::all();
        $index['product'] = Product::all();
        $index['depo'] = Depo::all();
        $index['warehouse'] = Warehouse::all();
        $index['address'] = CustomerLocation::all();
        $index['trucks'] = Trucks::all();
        $index['transporter'] =Transporter::all();
        $index['drivers'] =Drivers::all();
        $index['door_number'] = Trucks::all();
        $index['trailers'] =Trailers::all();
        $index['data'] = PickupbyTransport::whereId($id)->first();
        return view("pickup_bytransport.edit", $index);
    }

    public function update(PickupbyTransportRequest $request)
    {
        
        $noSO=OrderPlan::where('id', $request->get('no_SO'))->first()->no_SO;
        $doorNumber=Trucks::where('id', $request->get('door_number'))->first()->door_number;
        $customers = Customers::where('id', $request->get('customers_id_hide'))->first()->name;
        $customersLocation = CustomerLocation::where('id', $request->get('customer_location_id_hide'))->first()->address;
        $product = Product::where('id', $request->get('product_id_hide'))->first()->name;
        $warehouse = Warehouse::where('id', $request->get('warehouse_id'))->first()->name;
        $depo = Depo::where('id', $request->get('depo_id'))->first()->name;
        $drivers = Drivers::where('id', $request->get('drivers_id'))->first()->name;
        $transporter = Transporter::where('id', $request->get('transporter_id'))->first()->name;
        $trailers = Trailers::where('id', $request->get('trailers_id'))->first()->brand;
        $trucks = Trucks::where('id', $request->get('door_number'))->first();
        $isStatusChecked = $request->has('chkstatus') ? 1 : 0;



        /* update */
        $pickup = PickupbyTransport::find($request->id);


        $pickup->no_SO = $noSO;
        $pickup->no_PO = $request->get("no_PO");
        $pickup->no_LO = $request->get("no_LO");
        $pickup->customers_id = $request->get("customers_id_hide");
        $pickup->customers_name = $customers;
        $pickup->customer_location_id = $request->get("customer_location_id_hide");
        $pickup->customer_location_address = $customersLocation;
        $pickup->qty_order = $request->get("qty_order");
        $pickup->product_id = $request->get("product_id_hide");
        $pickup->product_name =$product;
        $pickup->planning_at = $request->get('planning_at');
        $pickup->warehouse_id  = $request->get('warehouse_id');
        $pickup->warehouse_name  = $warehouse;
        $pickup->depo_id = $request->get("depo_id");
        $pickup->depo_name = $depo;
        $pickup->drivers_id = $request->get('drivers_id');
        $pickup->drivers_name = $drivers;
        $pickup->trucks_id = $trucks->id;
        $pickup->door_number = $trucks->door_number;
        $pickup->transporter_id = $request->get('transporter_id');
        $pickup->transporter_name = $transporter;
        $pickup->trailers_id = $request->get('trailers_id');
        $pickup->trailers_name = $trailers;
        $pickup->license_plate = $request->get('license_plate');
        $pickup->status = $isStatusChecked ;
        $pickup->statuspickup = $request->get('statuspickup');
        $pickup->compartement = $request->get('compartement');
        $pickup->start_loading = $request->get('start_loading');
        $pickup->stop_loading = $request->get('stop_loading');
        $pickup->note = $request->get('note');
        $pickup->save();

        return redirect()->route("pickup_bytransport.index");
    }

    public function get_orderSO(Request $request)
    {
        // dd('alo test');
         //dd(request);
        $plan= OrderPlan::where('id', $request->get('id'))->orderBy('id', 'desc')->first();
        // $customer = Customers::where('id',$plan->customers_id)->first();
        // $customerLocation = CustomerLocation::where('id',$plan->customer_location_id)->first();
        // $dn = Depo ::where ('id',$plan->depo_id)->first();

        // if ($plan != null) {
        //     $r = array('no_PO' => $plan->no_PO, 'no_LO' => $plan->no_LO, 'customers_id' => $plan->customers,
        //     'customer_location_id' => $customerLocation->address, 'qty_order' => $plan->qty_order, 'product_id' => $plan->product,
        //     'depo_id' => $dn->name);
        // } else {
        //     $r = array('no_PO' => "", 'no_LO' => "", 'customers_id' => "", 'customer_location_id' => "",
        //     'qty_order' => "", 'product_id' => "", 'depo_id' => "" );
        // }

        if ($plan != null) {
            $r = array('no_PO' => $plan->no_PO, 'no_LO' => $plan->no_LO, 'customers_id' => $plan->customers,
            'customer_location_id' =>  $plan->customerslocation, 'qty_order' => $plan->qty_order, 'product_id' => $plan->product,
            'depo_id' => $plan->depo);
        } else {
            $r = array('no_PO' => "", 'no_LO' => "", 'customers_id' => "", 'customer_location_id' => "",
            'qty_order' => "", 'product_id' => "", 'depo_id' => "" );
        }


        // if ($plan != null) {
        //     $r = array('no_PO' => $plan->no_PO, 'no_LO' => $plan->no_LO,'customers_id' => $plan->name, 'customers' => $plan->customers,'customer_location' => $customerLocation->address, 'qty_order' => $plan->qty_order, 'product_id' => $plan->product_id,'product' => $plan->product, 'depo_id' =>  $dn->id,'depo' =>  $dn->name);
        // } else {
        //     $r = array('no_PO' => "", 'no_LO' => "",  'customers_id' => "",'customers' => "",'customer_location' => "", 'qty_order' => "", 'product_id' => "",'product' => "",'depo_id' => "" ,'depo' => "" );
        // }

        return $r;
       // return response()->json($plan);
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

        $data['pickup'] = PickupbyTransport::where('id', $id)->get()->first();
        return view("pickup_bytransport.view_event", $data);
    }

    public function destroy(Request $request)
    {
            PickupbyTransport::find($request->get('id'))->delete();
            return redirect()->route('pickup_bytransport.index');
    }

    public function bulk_delete(Request $request)
        {
            PickupbyTransport::whereIn('id', $request->ids)->delete();
            return back();
        }



    }


