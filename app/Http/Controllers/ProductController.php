<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    //Return all products
    public function index()
    {
        return Product::all();
    }

    //Create a product
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required',
        ]);
        return Product::create($request->all());
    }

    //Get a product
    public function show($id)
    {
        return Product::find($id);
    }
    //Update  a product
    public function update(Request $request,$id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return $product;
    }
    //Delete a product
    public function destroy($id)
    {
        return Product::destroy($id);
    }

    //Search a product by name
    public function search($name)
    {
        return Product::where('name','like', '%'.$name.'%')->get();
    }


}

