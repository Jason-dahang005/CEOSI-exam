<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();

        return response()->json([
            'data'  =>  $products
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name'  => 'required|string|unique:products,product_name'
        ],[
            'product_name.required' =>  'Product name is required',
            'product_name.unique'   =>  'Product name is already taken'
        ]);

        $product = Product::create($request->all());

        return response()->json([
            'Data'      =>  $product,
            'Message'   =>  'New Product is Added'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.update');
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product, $id)
    {
        $data = $request->validate([
            'product_name'  =>  'sometimes|string|unique:products,product_name'
        ]);

        $product = Product::findOrFail($id);

        $product->update($data);

        return response()->json([
            'Data'      =>  $product,
            'Message'   =>  'Product updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return response()->json([
            'Message'   =>  'Product deleted'
        ]);
    }
}
