<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class BuyerDashController extends Controller
{
    public function index()
    {
        $farmers = User::where('user_role', 0)->with('product')->get();
        $cart_count = Cart::where('user_id', Auth::user()->id)->where('is_ordered', 0)->count();
        return view("buyer.buyer-index", compact("farmers", "cart_count"));
    }

    public function viewCart()
    {
        $cartItems = Cart::where('user_id', Auth::user()->id)->where('is_ordered', 0)->with('product')->get(); // Assuming user is authenticated
        return view('buyer.cart.view-cart', compact('cartItems'));
    }

    public function addToCart($id)
    {
        $user = Auth::user();



        $cartItem = new Cart;
        $cartItem->user_id = $user->id;
        $cartItem->product_id = $id;
        $cartItem->save();

        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }


    public function placeOrder()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Find cart items for the authenticated user that haven't been ordered yet
        $cartItems = Cart::where('user_id', $user->id)
            ->where('is_ordered', 0)
            ->get();

        // If there are no items to order, redirect back with a message
        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'No items available to place an order.');
        }

        // Generate an order number
        $orderNo = $this->generateOrderNumber();
        while ($this->orderNumberExists($orderNo)) {
            $orderNo = $this->generateOrderNumber();
        }

        // Create an order for each cart item and update is_ordered field
        foreach ($cartItems as $cartItem) {
            // Create an order record
            $order = new Order;
            $order->user_id = $cartItem->user_id;
            $order->product_id = $cartItem->product_id;
            $order->order_no = $orderNo;
            $order->save();


            // Update is_ordered field in the cart item
            $cartItem->is_ordered = 1;
            $cartItem->save();

        }


        // Optionally, you can redirect the user to a success page or any other page
        return redirect()->route('buyer.view.order')->with('success', 'Order placed successfully.');
    }


    private function generateOrderNumber($length = 6)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $orderNumber = '';
        for ($i = 0; $i < $length; $i++) {
            $randomIndex = mt_rand(0, $charactersLength - 1);
            $orderNumber .= $characters[$randomIndex];
        }
        return $orderNumber;
    }

    private function orderNumberExists($orderNo)
    {
        return Order::where('order_no', $orderNo)->exists();
    }

    public function deleteCartItem($id)
    {
        $data = Cart::where('id', $id)->where('is_ordered', 0)->delete();
        return redirect()->route('buyer.view.cart')->with('success', 'Item removed from cart successfully.');
    }


    public function viewOrder(){

        $orders = Order::where('user_id', Auth::user()->id)->with('product')->get();
        return view('buyer.order.view-order', compact('orders'));
    }
}
