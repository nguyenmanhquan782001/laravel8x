<?php

namespace App\Http\Controllers\Backend;

use App\Components\Recursive;
use App\Http\Controllers\Controller;
use App\Models\Backend\CategoryModel;

use App\Models\Backend\GalleryModel;
use App\Models\Backend\ProductModel;
use App\Traits\StorageImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\False_;

class ProductController extends Controller
{
    protected $categoryModel;
    protected $productModel;
    protected $galleryModel;
    use StorageImage;


    public function __construct(CategoryModel $categoryModel,
                                ProductModel $productModel,
                                GalleryModel $galleryModel
    )
    {
        $this->categoryModel = $categoryModel;
        $this->productModel = $productModel;
        $this->galleryModel = $galleryModel;

    }

    public function index()
    {
        $products = $this->productModel->all();

        $products->load('category');

        return view("backend.product.index", compact('products'));
    }

    public function create()
    {
        $categories = $this->getCategory($parentId = '');
        return view("backend.product.create", compact('categories'));
    }

    public function getCategory($parentId)
    {
        $categories = $this->categoryModel->all();
        $recursive = new Recursive($categories);
        $html = $recursive->recursive($parentId);
        return $html;
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $ruler = [
                "product_name" => "required|unique:product,product_name",
                "product_price" => "required",
                "product_quantity" => "required",
                "category_id" => "required",
                "product_status" => "required",
                "product_image" => "required",
                "product_gallery" => "required",
                "product_desc" => "required",
                "short_desc" => "required",
            ];
            $message = [
                "product_name.required" => "Tên sản phẩm không được để trống",
                "product_name.unique" => "Sản phẩm này đã tồn tại",
                "product_price.required" => "Giá sản phẩm không được để trống",
                "product_quantity.required" => "Số lượng sản phẩm không để trống",
                "category_id.required" => "Chưa chọn danh mục",
                "product_status.required" => "Cần chọn trạng thái của sản phẩm",
                "product_image.required" => "Chưa có ảnh sản phẩm",
                "product_gallery.required" => "Cần 1 vài ảnh chi tiết",
                "product_desc.required" => "Không để trống mô tả sản phẩm",
                "short_desc.required" => "Cần có mô tả ngắn của sản phẩm",
            ];
            $validator = Validator::make($request->all(), $ruler, $message);
            $product_name = $request->input('product_name', '');
            $product_price = $request->input('product_price', 0);
            $product_publish = $request->input('product_publish', '');
            $product_quantity = $request->input('product_quantity', 0);
            $category_id = $request->input('category_id', '');
            $product_desc = $request->input('product_desc', '');
            $short_desc = $request->input('short_desc', '');

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            } else {
                $product = $this->productModel;
                $product->product_name = $product_name;
                $product->product_price = $product_price;
                $product->product_quantity = $product_quantity;
                $product->category_id = $category_id;
                $product->product_desc = $product_desc;
                $product->short_desc = $short_desc;
                if ($request->product_status == 1) {
                    $product->product_status = 1;
                } else {
                    $product->product_status = 2;
                }
                if (empty($product_publish)) {
                    $product_publish = date("Y-m-d H:i:s");
                }
                $product->product_publish = $product_publish;

                $product->user_id = 1;
                $data_image = $this->StorageImage($request, 'product_image', 'image_of_product');
                if (!empty($data_image)) {
                    $product_image = $data_image['file_path'];
                    $image_name = $data_image['file_name'];
                }
                $product->product_image = $product_image;
                $product->image_name = $image_name;
                $product->save();
                if ($request->hasFile('product_gallery')) {
                    foreach ($request->product_gallery as $productItem) {
                        $product_gallery = $this->StoreImageMultiple($productItem, 'product_gallery');
                        $image_path = $product_gallery['file_path'];
                        $image_name = $product_gallery['file_name'];
                        $product->gallery()->create([
                            'image_path' => $image_path,
                            'image_name' => $image_name
                        ]);
                    }
                }
                DB::commit();
                return redirect()->route('product.index')->with("success" , "Thêm mới sản phẩm thành công");
            }
        } catch (\Exception $exception) {
            DB::rollBack();

            return redirect()->route('404');
        }
    }

    public function edit($id)
    {
        $product = $this->productModel->find($id);
        $categories = $this->getCategory($product->category_id);
        return view("backend.product.edit", compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $ruler = [
                'product_name' => "required|unique:product,product_name,$id,id",
                'product_price' => "required",
                'product_quantity' => "required",
                'category_id' => "required",
                'product_desc' => "required",
                "short_desc" => "required",
            ];
            $message = [
                "product_name.required" => "Tên sản phẩm không được để trống",
                "product_name.unique" => "Sản phẩm đã tồn tại",
                "product_quantity.required" => "Số lượng sản phẩm chưa có",
                "category_id.required" => "Chưa chọn danh mục",
                "product_desc.required" => "Chưa có mô tả sản phẩm",
                "short_desc.required" => "Chưa có mô tả ngắn sản phẩm"

            ];
            $validator = Validator::make($request->all(), $ruler, $message);
            $product_name = $request->input("product_name", '');
            $product_price = $request->input('product_price', 0);
            $product_publish = $request->input('product_publish', '');
            $product_quantity = $request->input('product_quantity', 0);
            $category_id = $request->input('category_id', '');
            $product_status = $request->input('product_status', '');
            $product_desc = $request->input("product_desc", '');
            $short_desc = $request->input('short_desc', '');
            if (!$product_publish == "") {
                $product_publish = date("Y-m-d");
            }
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            $data = $this->StorageImage($request, 'product_image', 'image_of_product');
            if (!empty($data)) {
                $product_image = $data['file_path'];
                $image_name = $data['file_name'];
            }
            $product = $this->productModel->find($id);
            $product->product_name = $product_name;
            $product->product_price = $product_price;
            $product->product_publish = $product_publish;
            $product->product_quantity = $product_quantity;
            $product->category_id = $category_id;
            $product->product_status = $product_status;
            $product->user_id = 1 ;
            $product->product_desc = $product_desc;
            $product->short_desc = $short_desc;
            if ($request->hasFile('product_image')) {
                if ($product->product_image) {
                    $product_images = str_replace('/storage', '/public', $product->product_image);
                    Storage::delete($product_images);
                }
                $product->product_image = $product_image;
                $product->image_name = $image_name;
            }
            if ($request->hasFile('product_gallery')) {
                foreach ($this->galleryModel->where("product_id", $id)->get() as $gallery) {
                    if ($gallery->image_path) {
                        $galleries = str_replace('/storage', '/public', $gallery->image_path);
                        Storage::delete($galleries);
                    }
                }
                $this->galleryModel->where("product_id", $id)->delete();
                foreach ($request->product_gallery as $gallery) {
                    $galleries = $this->StoreImageMultiple($gallery, 'product_gallery');
                    $image_path = $galleries['file_path'];
                    $image_name = $galleries['file_name'];
                    $product->gallery()->create([
                        'image_path' => $image_path,
                        'image_name' => $image_name,
                    ]);
                }
            }
            $product->save();
            DB::commit();
            return redirect()->route("product.index")->with("success" , "Sửa sản phẩm xong");
        }catch (\Exception $exception) {
            echo  $exception;
            return  false ;
        }
    }

    public function remove($id)
    {
        $product = $this->productModel->find($id);
        $product_gallery = $this->galleryModel->where('product_id', $id)->get();
        $product_image = $this->galleryModel->where('product_id', $id);
        if ($product->product_image) {
            $delete_item = str_replace("/storage", '/public', $product->product_image);
            Storage::delete($delete_item);
        }

        foreach ($product_gallery as $item) {
            if ($item->image_path) {
                $delete_item = str_replace("/storage", '/public', $item->image_path);
                Storage::delete($delete_item);
            }
        }
        $product_image->delete();
        $product->delete();
        return response()->json([
            'code' => '200',
            'message' => 'success'
        ] ,200);

    }
}
