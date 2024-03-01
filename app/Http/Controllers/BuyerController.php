<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    // public function processBuy($id)
    // {
    //     $b = [];
    //     $b['product_id'] = $id;
    //     $b['user_id'] = auth()->id();

    //     Shop::create($b);
    //     return redirect('/dashboard');
    // }

    public function processBuy($id)
{
   $cart=new Cart;
   $cart->product_id=$id;
   $cart->user_id=auth()->id();
   $cart->save();

    return redirect('/dashboard')->with('success', 'Product added to cart successfully');
}


 public function profile()
{
    $userId = auth()->id();
    $shops = Shop::where('user_id', $userId)->get();
    $shopIds = $shops->pluck('product_id')->toArray();
    $products = Product::whereIn('id', $shopIds)->get();

    $user = auth()->user();
    $cartItems = $user->cart;

    return view('profile', ['user' => $user, 'cartItems' => $cartItems, 'products' => $products]);
}



  


    public function search(Request $req) {
        $query = $req->input('q');

        $b = Product::orderBy('updated_at', 'desc')->get();

        // Product has "name"
        $similar = $this->find_similar_product_based_on_name($b, $query);


        return view("searchresult", ["products" => $similar, "q" =>  $query]);
    }

    /// Algorithm 1
    public function find_similar_product_based_on_name($products, $query) {
        $similarProducts = [];

        foreach ($products as $product) {
            // Calculate similarity based on the custom function
            $similarity = $this->custom_similar_text(strtolower($query), strtolower($product->name));

            // Store product and its similarity in an array
            $similarProducts[] = ['product' => $product, 'similarity' => $similarity];
        }

        // Sort the products based on similarity in descending order
        usort($similarProducts, function ($a, $b) {
            return $b['similarity'] <=> $a['similarity'];
        });

        // Get the top 10 similar products
        $topSimilarProducts = array_slice($similarProducts, 0, 10);

        // Extract only the product objects from the result
        $result = array_map(function ($item) {
            return $item['product'];
        }, $topSimilarProducts);

        return $result;
    }

    // Custom similar_text function
    private function custom_similar_text($str1, $str2) {
        $length1 = strlen($str1);
        $length2 = strlen($str2);

        $matches1 = array_fill(0, $length1, false);
        $matches2 = array_fill(0, $length2, false);

        for ($i = 0; $i < $length1; $i++) {
            for ($j = 0; $j < $length2; $j++) {
                if (!$matches2[$j] && $str1[$i] === $str2[$j]) {
                    $matches1[$i] = $matches2[$j] = true;
                    break;
                }
            }
        }

        $matchCount = 0;
        for ($i = 0; $i < $length1; $i++) {
            if ($matches1[$i]) {
                $matchCount++;
            }
        }

        $similarity = 2 * $matchCount / ($length1 + $length2);

        return $similarity;
    }


}
