<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransporterRequest;
use App\Http\Requests\ImportRequest;
use App\Model\Transporter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
Use Importer;
use Validator;


class TransporterController extends Controller
{
    Public function importTransporter(ImportRequest $Request)
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
      foreach ($collection as $transporter) {
                  if ($transporter[0] != null) {
                      Warehouse::create([
                          'name' => $transporter[0],
                          'address' => $transporter[1],
                          'city' => $transporter[2],
                          'province' => $transporter[3],
                          'postal_code' => $transporter[4],
                          'country' => $transporter[5],
                          'phone' => $transporter[6],
                          'email_transporter' => $transporter[7],
                          'note' => $transporter[8],
                       ]);
                       $transporter->save();
                  }

              }
              return back();
    }

    public function index()
    {
        
      
        
        $index['data'] = Transporter::orderBy('id', 'desc')->get();
        return view('transporter.index', $index);
    }

    public function create()
    {
    
        return view("transporter.create");
    }
    
    public function store(TransporterRequest $request)
    {            $id = Transporter::create([
                        "name" => $request->get("name"),
                        "address" => $request->get("address"),
                        "city" => $request->get("city"),
                        "province" => $request->get("province"),
                        "postal_code" => $request->get("postal_code"),
                        "country" => $request->get("country"),
                        "phone" => $request->get("phone"),
                        "email_transporter" =>$request->get("email_transporter"),
                        "Note" => $request->get("Note"),
                     ])->id;
                     $transporter =  Transporter::find($id);
                     $transporter->name = $request->get("name");
                     $transporter->address = $request->get("address");
                     $transporter->city = $request->get("city");
                     $transporter->province = $request->get("province");
                     $transporter->postal_code = $request->get("postal_code");
                     $transporter->phone = $request->get("phone");
                     $transporter->email_transporter = $request->get("email_transporter");
                     $transporter->note = $request->get("note");
                     $transporter->save();
             
                     return redirect()->route("transporter.index");

    }

    public function edit($id)
    {
       
        $index['data'] = Transporter::whereId($id)->first();
        return view("transporter.edit", $index);
    }

    public function update(TransporterRequest $request)
    {

        $transporter = Transporter::find($request->id);
      
        // $user->password = bcrypt($request->get("password"));
        // $user->save();
        
                    $transporter->name = $request->get("name");
                     $transporter->address = $request->get("address");
                     $transporter->city = $request->get("city");
                     $transporter->province = $request->get("province");
                     $transporter->postal_code = $request->get("postal_code");
                     $transporter->phone = $request->get("phone");
                     $transporter->email_transporter = $request->get("email_transporter");
                     $transporter->note = $request->get("note");
                     $transporter->save();
             
        return redirect()->route("transporter.index");
    }

    public function view_event($id)
    {

        $data['transporter'] = Transporter::where('id', $id)->get()->first();
        return view("transporter.view_event", $data);

    }


    public function destroy(Request $request)
    {
            Transporter::find($request->get('id'))->delete();
            return redirect()->route('transporter.index');
    }

    public function bulk_delete(Request $request)
        {
            Transporter::whereIn('id', $request->ids)->delete();
            return back();
        }
    }

    
