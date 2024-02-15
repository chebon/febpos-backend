<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data = Category::all();
       $response = ['success' => true,  'status' => 200, 'data' => [$data]];
       return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $category = new Category;
            $category->name =  $request->name;
            $category->save();
            $response = ['success' => true,  'status' => 200, 'data' => [$category]];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
            $category = Category::find($id);
            $response = ['success' => true,  'status' => 200, 'data' => [$category]];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $category = Category::find($id);
            $category->name =  $request->name;
            $category->save();
            $response = ['success' => true,  'status' => 200, 'data' => [$category]];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::destroy($id);
        $response = ['success' => true,  'status' => 200];
        
    }
}
