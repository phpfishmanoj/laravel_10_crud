<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $product = Product::get();
        return view('products.index', ['products' => $product]);
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'prodimg' => 'required|mimes:jpeg,jpg,png,gif|max:10000',

        ]);

        $imageName = time() . '.' . $request->prodimg->extension();
        $request->prodimg->move(public_path('products'), $imageName);
        $product = new Product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return redirect('/')->withSuccess('Product created');
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        return view('products.edit', ['product' => $product]);
    }
    public function update(Request $request, $id)
    {
        //dd($request->all());

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'prodimg' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        $product = Product::where('id', $id)->first();
        if ($request->prodimg) {
            $imageName = time() . '.' . $request->prodimg->extension();
            $request->prodimg->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return redirect('/')->withSuccess('Product updated successfully');
    }
    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();
        $product->delete();
        return redirect('/')->withSuccess('Product deleted successfully');
    }
    public function detail(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();
        return view('products.detail', ['product' => $product]);
    }
}
