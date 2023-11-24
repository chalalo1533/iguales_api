<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() { 
        $product=Product::all(); 
        if(count($product) == 0){ 
           return response()->json([ 
           'message' => 'There are no registered products yet' ], 404); 
        } 
     return response()->json($product); 
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //se validan los datos recibidos
         $this->validate($request, [
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'required',
            'quantity' => 'required',
            'price' => 'required'
        ]);
        //se recepciona el archivo de imagen
        if ($request->hasFile('image')) {
            $originalName = $request->file('image')->getClientOriginalName();
            $newName =  Carbon::now()->timestamp . "_" . $originalName;
            $destinationFolder = './upload/';
            $request->file('image')->move($destinationFolder, $newName);
            //se crea un nuevo objeto Product y se guarda en la BD
            $product = new Product;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->image = ltrim($destinationFolder, '.') . $newName;
            $product->quantity = $request->quantity;
            $product->price = $request->price;
            $product->save();
            return response()->json($product, 201);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product=Product::find($id); 
        if(!$product){ 
           abort(404,$message="Product not found"); 
        } 
     return response()->json($product); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
