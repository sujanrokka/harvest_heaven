<?php

namespace App\Http\Controllers;

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
            // 'image' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $b['image'] = 'NA';
        $b['user_id'] = auth()->id();

        $x = Product::create($b);

        return redirect('/viewMyProduct');
    }

    public function deleteProduct($id) {
        Product::destroy($id);

        return redirect("/viewMyProduct");
    }

    public function viewOrders() {
        $products = Product::orderBy('updated_at', 'desc')->get();
        $shopIds = $products->pluck('shop_id')->unique();
        $shops = Shop::whereIn('id', $shopIds)->get();
        $productsWithShop = $products->map(function ($product) use ($shops) {
            $shop = $shops->where('id', $product->shop_id)->first();
            $product->shop = $shop;
            return $product;
        });

        return view("viewOrders", ["products" => $productsWithShop]);
    }
}
