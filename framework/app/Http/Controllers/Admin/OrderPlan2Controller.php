<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderPlanRequest;
use App\Model\PartsModel;
use App\Model\PartsUsedModel;
use App\Model\VehicleModel;
use App\Model\Vendor;
use App\Model\OrderPlanLogs;
use App\Model\OrderPlan;
use Auth;
use Illuminate\Http\Request;

class OrderPlan2Controller extends Controller
{

    public function logs()
    {
        if (Auth::user()->group_id == null || Auth::user()->user_type == "S") {
            $vehicle_ids = VehicleModel::pluck('id')->toArray();
        } else {
            $vehicle_ids = VehicleModel::where('group_id', Auth::user()->group_id)->pluck('id')->toArray();
        }
        $index['data'] = OrderPlanLogs::whereIn('vehicle_id', $vehicle_ids)->latest()->get();
        return view('order_plan.logs', $index);
    }

    public function index()
    {
        if (Auth::user()->group_id == null || Auth::user()->user_type == "S") {
            $vehicle_ids = VehicleModel::pluck('id')->toArray();
        } else {
            $vehicle_ids = VehicleModel::where('group_id', Auth::user()->group_id)->pluck('id')->toArray();
        }
        $index['data'] = OrderPlan::whereIn('vehicle_id', $vehicle_ids)->orderBy('id', 'desc')->get();
        return view('order_plan.index', $index);
    }

    public function create()
    {
        if (Auth::user()->group_id == null || Auth::user()->user_type == "S") {
            $data['vehicles'] = VehicleModel::whereIn_service("1")->get();
        } else {
            $data['vehicles'] = VehicleModel::where('group_id', Auth::user()->group_id)->whereIn_service("1")->get();
        }

        $data['vendors'] = Vendor::get();
        $data['parts'] = PartsModel::where('stock', '>', 0)->where('availability', 1)->get();
        return view('order_plan.create', $data);
    }

    public function store(OrderPlanRequest $request)
    {
        $order = new OrderPlan();
        $order->required_by = $request->get('required_by');
        $order->vehicle_id = $request->get('vehicle_id');
        $order->vendor_id = $request->get('vendor_id');
        $order->status = $request->get('status');
        $order->description = $request->get('description');
        $order->meter = $request->get('meter');
        $order->price = $request->get('price');
        $order->note = $request->get('note');
        $order->save();
        $log = OrderPlanLogs::create([
            'created_on' => date('Y-m-d', strtotime($order->created_at)),
            'vehicle_id' => $order->vehicle_id,
            'vendor_id' => $order->vendor_id,
            'required_by' => $order->required_by,
            'status' => $order->status,
            'description' => $order->description,
            'meter' => $order->meter,
            'note' => $order->note,
            'price' => $order->price,
            'type' => "Created",
        ]);
        $parts = $request->parts;

        if ($parts != null) {
            foreach ($parts as $part_id => $qty) {

                $update_part = PartsModel::find($part_id);
                PartsUsedModel::create(['work_id' => $order->id, 'part_id' => $part_id, 'qty' => $qty, 'price' => $update_part->unit_cost, 'total' => $qty * $update_part->unit_cost]);
                $update_part->stock = $update_part->stock - $qty;
                $update_part->save();
                if ($update_part->stock == 0) {
                    $update_part->availability = 0;
                    $update_part->save();
                }
            }
        }
        $log->parts_price = $order->parts->sum('total');
        $log->save();
        return redirect()->route('order_plan.index');
    }

    public function edit($id)
    {
        $index['parts'] = PartsModel::where('stock', '>', 0)->where('availability', 1)->get();
        $index['data'] = OrderPlan::whereId($id)->first();
        if (Auth::user()->group_id == null || Auth::user()->user_type == "S") {
            $index['vehicles'] = VehicleModel::whereIn_service("1")->get();
        } else {
            $index['vehicles'] = VehicleModel::where('group_id', Auth::user()->group_id)->whereIn_service("1")->get();
        }
        $index['vendors'] = Vendor::get();
        return view('order_plan.edit', $index);
    }

    public function update(OrderPlanRequest $request)
    {
        $order = OrderPlan::find($request->get("id"));
        $order->required_by = $request->get('required_by');
        $order->vehicle_id = $request->get('vehicle_id');
        $order->vendor_id = $request->get('vendor_id');
        $order->status = $request->get('status');
        $order->description = $request->get('description');
        $order->meter = $request->get('meter');
        $order->price = $request->get('price');
        $order->note = $request->get('note');
        $order->save();

        $log = OrderPlanLogs::create([
            'created_on' => date('Y-m-d', strtotime($order->created_at)),
            'vehicle_id' => $order->vehicle_id,
            'vendor_id' => $order->vendor_id,
            'required_by' => $order->required_by,
            'status' => $order->status,
            'description' => $order->description,
            'meter' => $order->meter,
            'note' => $order->note,
            'price' => $order->price,
            'type' => "Updated",
        ]);
        $parts = $request->parts;

        if ($parts != null) {
            foreach ($parts as $part_id => $qty) {
                $update_part = PartsModel::find($part_id);

                PartsUsedModel::create(['work_id' => $order->id, 'part_id' => $part_id, 'qty' => $qty, 'price' => $update_part->unit_cost, 'total' => $qty * $update_part->unit_cost]);
                $update_part->stock = $update_part->stock - $qty;
                $update_part->save();
                if ($update_part->stock == 0) {
                    $update_part->availability = 0;
                    $update_part->save();
                }
            }
        }
        $log->parts_price = $order->parts->sum('total');
        $log->save();
        return redirect()->route('order_plan.index');
    }

    public function destroy(Request $request)
    {
        OrderPlan::find($request->get('id'))->delete();
        return redirect()->back();
    }

    public function bulk_delete(Request $request)
    {
        OrderPlan::whereIn('id', $request->ids)->delete();
        return back();
    }

    public function remove_part($id)
    {
        $usedpart = PartsUsedModel::find($id);
        $part = PartsModel::find($usedpart->part_id);
        $part->stock = $part->stock + $usedpart->qty;
        $part->save();
        if ($part->stock > 0) {
            $part->availability = 1;
            $part->save();
        }
        $usedpart->delete();
        return back();
    }

    public function parts_used($id)
    {
        $order = OrderPlan::find($id);
        return view('order_plan.parts_used', compact('order'));
    }
}
