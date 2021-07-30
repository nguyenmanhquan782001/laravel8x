<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\OrderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Backend\ProductModel;
use function GuzzleHttp\Psr7\try_fopen;

class PaymentController extends Controller
{
    public function index()
    {
        return view("frontend.carts.payment");
    }

    public function checkout(Request $request)
    {
        try {
            DB::beginTransaction();
            $ruler = [
                'customer_name' => 'required',
                'customer_email' => 'required',
                'customer_phone' => 'required',
                'customer_address' => 'required'
            ];
            $message = [
                'customer_name.required' => "Yêu cầu điền đầy đủ tên",
                'customer_email.required' => "Điền email của bạn",
                'customer_phone.required' => "Điền số điện thoại của bạn",
                'customer_address.required' => 'Chưa có địa chỉ giao hàng'
            ];
            $validator = Validator::make($request->all(), $ruler, $message);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            if (session('cart')) {
                $cartInfo = session('cart');
            }
            $order = new OrderModel();
            $order->customer_name = $request->input("customer_name", '');
            $order->customer_email = $request->input("customer_email", '');
            $order->customer_phone = $request->input("customer_phone", '');
            $order->customer_address = $request->input("customer_address", '');
            if ($request->order_note == "") {
                $order->order_note = "";
            } else {
                $order->order_note = $request->order_note;
            }
            $order->order_status = 3;
            foreach ($cartInfo as $cartItem) {
                $quantities = $cartItem['product_quantity'];
                $order->total_product += $quantities;
                $order->total_price += $cartItem['product_quantity'] * $cartItem['price'];
            }
            DB::commit();
            $order->save();
            foreach ($cartInfo as $id => $cartItem) {
                 $order->detail()->attach($order->id ,
                     ['product_quantity' => $cartItem['product_quantity']  ,
                         'product_price' => $cartItem['price'] ,
                         'product_id' => $id
                 ]);
            }
            session()->forget('cart');
            return  redirect()->route("cart.show")->with("success" , 'Cảm ơn bạn đã mua sản phẩm của chúng tôi');



        } catch (\Exception $exception) {
            DB::rollBack();

            return redirect()->route('404');
        }

    }

}
