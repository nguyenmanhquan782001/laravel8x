<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\ProductModel;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function addCart($id)
    {
        $product = ProductModel::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['product_quantity'] = $cart[$id]['product_quantity'] + 1;
        } else {
            $cart[$id] = [
                'name' => $product->product_name,
                'price' => $product->product_price,
                'product_quantity' => 1,
                'image' => $product->product_image,
            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }

    public function showCart()
    {
//        session()->forget('cart');
        $carts = session()->get("cart");
        return view("frontend.carts.carts", compact('carts'));
    }
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $carts = session()->get('cart');
            $carts[$request->id]['product_quantity'] = $request->quantity;
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cart = view("frontend.carts.cartrender", compact('carts'))->render();
            return response()->json(['cart' => $cart, 'code' => 200], 200);
        } else {
            return  false ;
        }
    }

    public function delete(Request $request)
    {
        if ($request->id ) {
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cart = view("frontend.carts.cartrender", compact('carts'))->render();
            return response()->json(['cart' => $cart, 'code' => 200], 200);
        } else {
            return  false ;
        }
    }
    public  function  clearCart () {
        if (session('cart')){
              session()->forget('cart');
            $cart = view("frontend.carts.cartrender")->render();
            return response()->json([ 'code' => 200 , 'message' => 'success'], 200);
        }
    }
}
