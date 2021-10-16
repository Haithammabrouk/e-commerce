<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view(view: 'admin.products.index')->with(compact('products'));
    }
    public function create()
    {
        $product = new Product();
        return view(view: 'admin.products.create')->with(compact('product'));
    }
    public function store(Request $request)
    {

        //Validate The form
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'image|required',

        ]);
        // Upload the image
        if ($request->hasFile(key: 'image')) {
            $image = $request->image;
            $image->move('uploads', $image->getClientOriginalName());
        }
        //Save the data in database
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->image->getClientOriginalName(),
        ]);
        //send a message
        $request->session()->flash('msg', 'Your product has been added');

        return redirect(to: 'admin/products/create');
    }
    public function edit($id)
    {

        $product = Product::find($id);
        return view(view: 'admin.products.edit')->with(compact('product'));
    }

    public function update(Request $request, $id)
    {
        //Find the product
        $product = Product::find($id);
        //validate the form
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        //check if there any image
        if ($request->hasFile(key: 'image')) {
            //check if the old image exist inside folder
            if (file_exists(filename: public_path(path: 'uploads/') . $product->image)) {
                unlink(filename: public_path(path: 'uploads/') . $product->image);
            }
            //upload new image
            $image = $request->image;
            $image->move('uploads', $image->getClientOriginalName());
            $product->image = $request->image->getClientOriginalName();
        }

        // updating the product
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $product->image
        ]);
        // store a message in session
        $request->session()->flash('msg', 'You product has been updated');

        //redirect
        return redirect(to: '/admin/products');
    }
    public function show($id)
    {
        $product = Product::find($id);
        return view(view: 'admin.products.details')->with(compact('product'));
    }


    public function destroy($id)
    {
        //Delete the product
        Product::destroy($id);
        //Store a message
        session()->flash('msg', 'the product has been deleted');

        return redirect(to: 'admin/products');
    }
}
