<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrailersRequest;
use App\Http\Requests\ImportRequest;
use App\Model\Trailers;
use App\Model\VehicleCapacity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
Use Importer;
use Validator;


class TrailersController extends Controller
{
    Public function importTrailers(ImportRequest $Request)
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
     
      foreach ($collection as $trailers) {
                  if ($trailers[0] != null) {
                      trailers::create([
                          'brand' => $trailers[0],
                          'type' => $trailers[1],
                          'unit_maker' => $trailers[2],
                          'license_plate' => $trailers[3],
                          'tag_id' =>$trailers[4],
                          'year' =>$trailers[5],
                          'lic_exp_date' => $trailers[6],
                          'reg_exp_date' => $trailers[7],
                          //'trailer_image' => $trailers[7],
                          'tera_sertifikat' =>$trailers[8],
                          'tera_rls_date' => $trailers[9],
                          'tera_exp_date' => $trailers[10],
                          'compartement' => $trailers[11],
                          'capacity' => $trailers[12],
                        //   'C1' => $trailers[12],
                        //   'C2' => $trailers[13],
                        //   'C3' => $trailers[14],
                        //   'C4' => $trailers[15],
                       ]);
                       $trailers->save();
                  }

              }
              return back();
    }

    public function index()
    {
        
      
        
        $index['data'] = Trailers::orderBy('id', 'desc')->get();
        return view('trailers.index', $index);
    }

    public function create()
    {
    
        return view("trailers.create");
    }
    
    public function store(TrailersRequest $request)
    {            $id = Trailers::create([
                        'brand' =>  $request->get("brand"),
                        'type' => $request->get("type"),
                        'unit_maker' =>  $request->get("unit_maker"),
                        'license_plate' =>  $request->get("license_plate"),
                        'tag_id' => $request->get("tag_id"),
                        'year' => $request->get("year"),
                        'lic_exp_date' =>  $request->get("lic_exp_date"),
                        'reg_exp_date' =>  $request->get("reg_exp_date"),
                        'tera_sertifikat' => $request->get("tera_sertifikat"),
                        'tera_rls_date' =>  $request->get("tera_rls_date"),
                        'tera_exp_date' =>  $request->get("tera_exp_date"),
                       // 'trailer_image' =>  $request->get("trailer_image"),
                        'capacity' =>  $request->get("capacity"),
                        'compartement' =>  $request->get("compartement"),
                        // 'C1' =>  $request->get("C1"),
                        // 'C2' =>  $request->get("C2"),
                        // 'C3' =>  $request->get("C3"),
                        // 'C4' =>  $request->get("C4"),
                     ])->id;
                     $trailers = Trailers::find($id);
                     $trailers->brand = $request->get("brand");
                     $trailers->type = $request->get("type");
                     $trailers->unit_maker = $request->get("unit_maker");
                     $trailers->license_plate = $request->get("license_plate");
                     $trailers->tag_id = $request->get("tag_id");
                     $trailers->year = $request->get("year");
                     $trailers->lic_exp_date = $request->get("lic_exp_date");
                     $trailers->reg_exp_date = $request->get("reg_exp_date");
                    // $trailers->trailer_image = $request->get("trailer_image");
                     $trailers->tera_sertifikat = $request->get("tera_sertifikat");
                     $trailers->tera_rls_date = $request->get("tera_rls_date");
                     $trailers->tera_exp_date = $request->get("tera_exp_date");
                     $trailers->capacity = $request->get("capacity");
                     $trailers->compartement = $request->get("compartement");
                    //  $trailers->C1 = $request->get("C1");
                    //  $trailers->C2 = $request->get("C2");
                    //  $trailers->C3 = $request->get("C3");
                    //  $trailers->C4 = $request->get("C4");
                     $trailers->save();
             
                     return redirect()->route("trailers.index");

    }

    public function edit($id)
    {
       
        $index['data'] = Trailers::whereId($id)->first();
        return view("trailers.edit", $index);
    }

    public function update(TrailersRequest $request)
    {

        $trailers = Trailers::find($request->id);
      
        // $user->password = bcrypt($request->get("password"));
        // $user->save();
        //$trailers = Trailers::find($id);
        $trailers->brand = $request->get("brand");
        $trailers->type = $request->get("type");
        $trailers->unit_maker = $request->get("unit_maker");
        $trailers->license_plate = $request->get("license_plate");
        $trailers->tag_id = $request->get("tag_id");
        $trailers->year = $request->get("year");
        $trailers->lic_exp_date = $request->get("lic_exp_date");
        $trailers->reg_exp_date = $request->get("reg_exp_date");
       // $trailers->trailer_image = $request->get("trailer_image");
        $trailers->tera_sertifikat = $request->get("tera_sertifikat");
        $trailers->tera_rls_date = $request->get("tera_rls_date");
        $trailers->tera_exp_date = $request->get("tera_exp_date");
        $trailers->capacity = $request->get("capacity");
        $trailers->compartement = $request->get("compartement");
        // $trailers->C1 = $request->get("C1");
        // $trailers->C2 = $request->get("C2");
        // $trailers->C3 = $request->get("C3");
        // $trailers->C4 = $request->get("C4");
        $trailers->save();

        return redirect()->route("trailers.index");
    }

    public function view_event($id)
    {

        $data['trailers'] = Trailers::where('id', $id)->get()->first();
        return view("trailers.view_event", $data);
    }

    public function destroy(Request $request)
    {
            Trailers::find($request->get('id'))->delete();
            return redirect()->route('trailers.index');
    }

    public function bulk_delete(Request $request)
        {
            Trailers::whereIn('id', $request->ids)->delete();
            return back();
        }
    }

    
