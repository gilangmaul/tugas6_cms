<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::with('category')->get();

        return view('products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        return view('products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required',
            'product_desc' => 'required',
            'product_price' => 'required|numeric',
            'category_id' => 'required',
            'product_qty' => 'required|numeric'
        ]);

        Product::create([
            'name' => $validated['product_name'],
            'description' => $validated['product_desc'],
            'price' => $validated['product_price'],
            'category_id' => $validated['category_id'],
            'qty' => $validated['product_qty'],
        ]);
        return redirect('products');
    }

    /**
     * Display the specified resource.
     *s
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['categories'] = Category::all();
        $data['products'] = Product::find($id);
        return view('products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'product_name' => 'required',
            'product_desc' => 'required',
            'product_price' => 'required|numeric',
            'category_id' => 'required',
            'product_qty' => 'required|numeric'
        ]);

        Product::create([
            'name' => $validated['product_name'],
            'description' => $validated['product_desc'],
            'price' => $validated['product_price'],
            'category_id' => $validated['category_id'],
            'qty' => $validated['product_qty'],
        ]);
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('/product');
    }
}
