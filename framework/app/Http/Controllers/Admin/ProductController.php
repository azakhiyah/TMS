<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ImportRequest;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
Use Importer;
use Validator;


class ProductController extends Controller
{
    Public function importProduct(ImportRequest $Request)
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
      foreach ($collection as $product) {
                  if ($product[0] != null) {
                      Product::create([
                          'name' => $product[0],
                          'density' => $product[1],
                       ]);
                       $product->save();
                  }

              }
              return back();
    }

    public function index()
    {
        
      
        
        $index['data'] = Product::orderBy('id', 'desc')->get();
        return view('product.index', $index);
    }

    public function create()
    {
    
        return view("product.create");
    }
    
    public function store(ProductRequest $request)
    {            $id = Product::create([
                        "name" => $request->get("name"),
                        "density" => $request->get("density"),
                     ])->id;
                     $product = Product::find($id);
                     $product->name = $request->get("name");
                     $product->density = $request->get("density");
                     $product->save();
             
                     return redirect()->route("product.index");

    }

    public function edit($id)
    {
       
        $index['data'] = Product::whereId($id)->first();
        return view("product.edit", $index);
    }

    public function update(ProductRequest $request)
    {

        $product = Product::find($request->id);
      
        // $user->password = bcrypt($request->get("password"));
        // $user->save();
        $product->name = $request->get("name");
        $product->density = $request->get("density");
        $product->save();
        return redirect()->route("product.index");
    }

    public function view_event($id)
    {

        $data['product'] = Product::where('id', $id)->get()->first();
        return view("product.view_event", $data);

    }


    public function destroy(Request $request)
    {
            Product::find($request->get('id'))->delete();
            return redirect()->route('product.index');
    }

    public function bulk_delete(Request $request)
        {
            Product::whereIn('id', $request->ids)->delete();
            return back();
        }
    }

    
