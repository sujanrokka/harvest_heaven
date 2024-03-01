<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class FarmerController extends Controller
{
    public function addNewProduct()
    {
        return view('addNewProduct');
    }

    public function viewMyProduct()
    {
        // data fetch
        // $b = Product::all();
        $b = Product::orderBy('updated_at', 'desc')->get();

        // print_r($b);
        // data pass
        return view('viewMyProduct', [
            'products' => $b,
        ]);
    }

    public function editProduct($id)
    {
        // data fetch
        // $b = Product::all();
        $product = Product::find($id);

        return view('editProduct', [
            'product' => $product,
        ]);
    }

    public function editProductPost($id, Request $req)
    {
        $b = $req->validate([
            'name' => 'required',
            // 'image' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        // Assuming $id is the ID of the product you want to update
        $product = Product::find($id);

        if ($product) {
            $product->update($b);
        } else {
            // Handle the case where the product with the given ID doesn't exist
            echo "Does not exist";
        }


        return redirect("/viewMyProduct");
    }

    public function addNewProductPost(Request $req)
    {
        // buyer lai login garaune
        $b = $req->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
            'description' => 'required',
            'price' => 'required',
        ]);

        //handle upload image
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public', $imageName);

            $b['image'] = $imagePath;
        }

        $user_id = auth()->id();
        $product = new Product;
        $product->user_id = $user_id;
        $product->image = $imageName;
        $product->name = $req->name;
        $product->price = $req->price;
        $product->description = $req->description;
        $product->save();
        return redirect('/viewMyProduct');
    }

    public function deleteProduct($id)
    {
        Product::destroy($id);

        return redirect("/viewMyProduct");
    }

    public function viewOrders()
    {
        $products = Cart::with(['user', 'product'])->get();

        return view("viewOrders", compact('products'));
    }

    public function has_deliver($id)
    {
        $order = Cart::where('id', $id)->first();
        $order->has_deliver = 1;
        $order->save();
        return redirect('/viewOrders');
    }

    public function bill_detail($id)
    {
        $b = Cart::where('has_deliver', 1)->with(['user', 'product'])->first();
        return view("billView", compact('b'));
    }
}
