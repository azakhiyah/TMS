<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepoRequest;
use App\Http\Requests\ImportRequest;
use App\Model\Depo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
Use Importer;
use Validator;


class DepoController extends Controller
{
    Public function importDepo(ImportRequest $Request)
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
      foreach ($collection as $depo) {
                  if ($depo[0] != null) {
                      Depo::create([
                          'name' => $depo[0],
                          'address' => $depo[1],
                          'city' => $depo[2],
                          'province' => $depo[3],
                          'postal_code' => $depo[4],
                          'country' => $depo[5],
                          'longitude' => $depo[6],
                          'latitude' => $depo[7],
                          'phone' => $depo[8],
                          'email_depo' => $depo[9],
                          'note' => $depo[10],
                       ]);
                       $depo->save();
                  }

              }
              return back();
    }

    public function index()
    {
        
      
        
        $index['data'] = Depo::orderBy('id', 'desc')->get();
        return view('depo.index', $index);
    }

    public function create()
    {
    
        return view("depo.create");
    }
    
    public function store(DepoRequest $request)
    {            $id = Depo::create([
                        "name" => $request->get("first_name"),
                        "address" => $request->get("address"),
                        "city" => $request->get("city"),
                        "province" => $request->get("province"),
                        "postal_code" => $request->get("postal_code"),
                        "country" => $request->get("country"),
                        "longitude" => $request->get("longitude"),
                        "latitude" => $request->get("latitude"),
                        "phone" => $request->get("phone"),
                        "email_depo" =>$request->get("email_depo"),
                        "Note" => $request->get("Note"),
                     ])->id;
                     $depo = Depo::find($id);
                     $depo->name = $request->get("name");
                     $depo->address = $request->get("address");
                     $depo->city = $request->get("city");
                     $depo->province = $request->get("province");
                     $depo->postal_code = $request->get("postal_code");
                     $depo->country = $request->get("country");
                     $depo->longitude = $request->get("longitude");
                     $depo->latitude = $request->get("latitude");
                     $depo->phone = $request->get("phone");
                     $depo->email_depo = $request->get("email_depo");
                     $depo->note = $request->get("note");
                     $depo->save();
             
                     return redirect()->route("depo.index");

    }

    public function edit($id)
    {
       
        $index['data'] = Depo::whereId($id)->first();
        return view("depo.edit", $index);
    }

    public function update(DepoRequest $request)
    {

        $depo = Depo::find($request->id);
      
        // $user->password = bcrypt($request->get("password"));
        // $user->save();
        $depo->name = $request->get("name");
        $depo->address = $request->get("address");
        $depo->city = $request->get("city");
        $depo->province = $request->get("province");
        $depo->postal_code = $request->get("postal_code");
        $depo->country = $request->get("country");
        $depo->longitude = $request->get("longitude");
        $depo->latitude = $request->get("latitude");
        $depo->phone = $request->get("phone");
        $depo->email_depo = $request->get("email_depo");
        $depo->note = $request->get("note");
        $depo->save();
        return redirect()->route("depo.index");
    }

    public function view_event($id)
    {

        $data['depo'] = Depo::where('id', $id)->get()->first();
        return view("depo.view_event", $data);

    }


    public function destroy(Request $request)
    {
            Depo::find($request->get('id'))->delete();
            return redirect()->route('depo.index');
    }

    public function bulk_delete(Request $request)
        {
            Depo::whereIn('id', $request->ids)->delete();
            return back();
        }
    }

    
