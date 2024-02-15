<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Faker\Factory;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Customer::with('sale')->with('salesItems')->get();
        $response = ['success' => true,  'status' => 200, 'data' => [$data]];
        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $customer = new Customer;
           $customer->name = $request->name;
           $customer->phone = $request->phone;
           $customer->save();
           $data = Customer::where('id', $customer->id)->with('sale')->with('salesItems')->get();
           $response = ['success' => true,  'status' => 200, 'data' => [$data]];
           return response()->json($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Customer::where('id', $id)->with('sale')->with('salesItems')->get();
        $response = ['success' => true,  'status' => 200, 'data' => [$data]];
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
           $customer =  Customer::find($id);
           $customer->name = $request->name;
           $customer->phone = $request->phone;
           $customer->save();
           $data = Customer::where('id', $customer->id)->with('sale')->with('salesItems')->get();
           $response = ['success' => true,  'status' => 200, 'data' => [$data]];
           return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
           $customer =  Customer::destroy($id);
           $response = ['success' => true,  'status' => 200];
           return response()->json($response);
    }
}
