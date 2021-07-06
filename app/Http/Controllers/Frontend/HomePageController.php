<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\ProductModel;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    protected $productModel;
    public  function  __construct(ProductModel  $productModel)
    {
        $this->productModel = $productModel ;
    }

    public function index() {
          $products = $this->productModel->all();


         return view("frontend.homepage.index", compact('products'));
     }
}
