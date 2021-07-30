<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\CategoryModel;
use App\Models\Backend\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
     public  function  shop() {
         $products = ProductModel::paginate(12);
         $data = [] ;
         $data['products'] = $products  ;
         return view('frontend.product.products' ,$data);
     }
     public function productCategory($id) {
           $category = CategoryModel::find($id);
            $category->load("countProduct");
           return view("frontend.product.productcategory" , compact('category')) ;
     }
}
