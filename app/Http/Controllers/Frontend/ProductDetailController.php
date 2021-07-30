<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\CategoryModel;
use App\Models\Backend\GalleryModel;
use App\Models\Backend\ProductModel;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    protected $productModel;
    protected $categoryModel;
    protected $galleryModel;

    public function __construct(ProductModel $productModel,
                                CategoryModel $categoryModel,
                                GalleryModel $galleryModel
    )
    {
        $this->productModel = $productModel;
        $this->categoryModel = $categoryModel;
        $this->galleryModel = $galleryModel;


    }

    public function ProductDetail($id)
    {
        $product = $this->productModel->find($id);
        $categories = $this->categoryModel->all();
        $gallery = $this->galleryModel->where("product_id" , $product->id)->get();
        $data = [];
        $data['product'] = $product;
        $data['categories'] = $categories;
        $data['gallery'] = $gallery;
        return view("frontend.product.detail", $data);

    }
}
