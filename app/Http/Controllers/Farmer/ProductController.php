<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('user_id', Auth::user()->id)->get();
        return view("farmer.product.product-index", compact("products"));
    }

    public function index_add()
    {
        return view("farmer.product.product-add");
    }
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming max file size is 2MB
        ]);

        // Create a new product instance
        $product = new Product;
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->price = $request->price;

        // Check if image is uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        // Assign user_id from authenticated user
        $product->user_id = Auth::id();

        // Save the product
        $product->save();

        // Redirect to a success page or return a response
        return redirect()->route('farmer.product')->with('success', 'Product created successfully!');
    }


    public function edit($id)
    {
        $product = Product::find($id);
        return view('farmer.product.product-edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming max file size is 2MB
        ]);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->price = $request->price;

        // Check if image is uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        // Assign user_id from authenticated user
        $product->user_id = Auth::id();

        // Save the product
        $product->save();

        return redirect()->route('farmer.product')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('farmer.product')->with('success', 'Product deleted successfully!');
    }

    public function viewOrder()
    {

        $user = Auth::user();

        // Retrieve orders associated with products created by the farmer
        $orders = Order::join('products', 'orders.product_id', '=', 'products.id')
            ->where('products.user_id', $user->id)
            ->get();
        return view('farmer.order.order-index', compact('orders'));
    }

    public function orderDeliver($order)
    {
        $farmer = Auth::user();
        // Update the is_delivered field only for orders associated with products created by the farmer
        Order::where('order_no', $order)
            ->whereHas('product', function ($query) use ($farmer) {
                $query->where('user_id', $farmer->id);
            })
            ->update(['is_delivered' => 1]);
        return redirect()->route('farmer.view.order')->with('success', 'Product Delivered successfully!');
    }

    public function billView($order){

    }
}
