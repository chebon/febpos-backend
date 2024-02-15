<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Faker\Factory;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data = Product::with('category')->with('sale')->get();
       $response = ['success' => true,  'status' => 200, 'data' => [$data]];
       return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $product = new Product;
           $product->name = $request->name;
           $product->category_id = $request->category_id;
           $product->selling_price = $request->selling_price;
           $product->unit = $request->unit;
           $product->description = $request->description;
           $product->save();

           $data = Product::where('id', $product->id)->with('category')->with('sale')->get();
           $response = ['success' => true,  'status' => 200, 'data' => [$data]];
           return response()->json($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Product::where('id', $product->id)->with('category')->with('sale')->get();
        $response = ['success' => true,  'status' => 200, 'data' => [$data]];
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
           $product = Product::find($id);
           $product->name = $request->name;
           $product->category_id = $request->category_id;
           $product->selling_price = $request->selling_price;
           $product->unit = $request->unit;
           $product->description = $request->description;
           $product->save();

           $data = Product::where('id', $product->id)->with('category')->with('sale')->get();
           $response = ['success' => true,  'status' => 200, 'data' => [$data]];
           return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        $response = ['success' => true,  'status' => 200];
        return response()->json($response);
    }
}
