<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\CategoryModel;
use App\Models\Backend\ProductModel;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    protected $productModel;
    protected $categoryModel;
    public  function  __construct(ProductModel  $productModel ,
                                  CategoryModel  $categoryModel)
    {
        $this->productModel = $productModel ;
        $this->categoryModel = $categoryModel;
    }

    public function index() {
        $products1 = $this->productModel->all();

          $categories = $this->categoryModel->limit(2)->get();
        $data = [
            "categories" => $categories
        ] ;
        $products2 = $this->productModel->orderByDesc("id")->limit(3)->get();



          $data['products1'] = $products1 ;
        $data['products2'] = $products2 ;
         return view("frontend.homepage.index", $data);
     }
}
