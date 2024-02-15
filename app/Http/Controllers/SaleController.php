<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Sale::with('category')->with('sale')->get();
        $response = ['success' => true,  'status' => 200, 'data' => [$data]];
        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $sale = new Sale();
           $sale->customer_id = $request->customer_id;
           $sale->save();

           foreach($request->sale_item as $key => $value){
            $categories = new SaleItem();
            $categories->sale_id = $sale->id;
            $categories->product_id = $value['product_id'];
            $categories->units_purchased = $value['units_purchased'];
            $categories->save();
           }

            $data = Sale::where('id', )->with('category')->with('sale')->get();
            $response = ['success' => true,  'status' => 200, 'data' => [$data]];
            return response()->json($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Sale::where('id', )->with('category')->with('sale')->get();
        $response = ['success' => true,  'status' => 200, 'data' => [$data]];
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Sale::destroy($id);
        $response = ['success' => true,  'status' => 200];
        return response()->json($response);
    }
}
