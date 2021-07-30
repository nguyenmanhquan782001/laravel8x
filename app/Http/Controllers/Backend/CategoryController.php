<?php

namespace App\Http\Controllers\Backend;

use App\Components\Recursive;
use App\Http\Controllers\Controller;
use App\Models\Backend\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    protected $categoryModel;

    public function __construct(CategoryModel $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    public function index()
    {
        try {
            DB::beginTransaction();
            $categories = $this->categoryModel->all();
            DB::commit();
            return view('backend.category.index', compact('categories'));


        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('404');
        }
    }

    public function getCategory($parentId)
    {
        $data = $this->categoryModel->all();
        $category = new Recursive($data);
        $html = $category->recursive($parentId);
        return $html;
    }

    public function create()
    {
        try {
            DB::beginTransaction();
            $categories = $this->getCategory('');
            DB::commit();
            return view('backend.category.create', compact('categories'));
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('404');
        }
    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $ruler = [
                'category_name' => 'required|unique:category,category_name',
                'slug' => 'required',
            ];
            $message = [
                'category_name.required' => "Tên danh mục không được để trống",
                'category_name.unique' => "Danh mục đã tồn tại",
                'slug.required' => 'Slug danh mục không được để trống',
            ];
            $validator = Validator::make($request->all(), $ruler, $message);
            $category_name = $request->input('category_name', '');
            $slug = $request->input('slug', '');

            $parent_id = $request->input('parent_id', 0);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            } else {
                $category = new  CategoryModel();
                $category->category_name = $category_name;
                $category->slug = $slug;
                if ($request->input('status') === "on") {
                    $status = 1;
                } else {
                    $status = 0;
                }
                $category->status = $status;
                $category->parent_id = $parent_id;
                DB::commit();
                $category->save();
                return redirect()->route('category.index')->withSuccess('Thêm danh mục thành công');

            }
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
            return redirect()->route('404');
        }

    }

    public function edit($id)
    {
        try {
            DB::beginTransaction();
            $category = $this->categoryModel->find($id);
            $categories = $this->getCategory($category->parent_id);
            DB::commit();
            return view("backend.category.edit", compact('category', 'categories'));
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('404');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $ruler = [
                'category_name' => "required|unique:category,category_name,$id,id",
                'slug' => 'required',
            ];
            $message = [
                'category_name.required' => 'Không được để trống tên danh mục',
                'category_name.unique' => 'Danh mục này đã tồn tại',
                'slug.required' => 'Không để trống slug'
            ];
            $validator = Validator::make($request->all(), $ruler, $message);
            $category_name = $request->input('category_name', '');
            $slug = $request->input('slug', '');
            $parent_id = $request->input('parent_id', 0);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            } else {
                $category = $this->categoryModel->find($id);
                $category->category_name = $category_name;
                $category->slug = $slug;
                $category->parent_id = $parent_id ;
                if ($request->input('status') === "on") {
                    $category->status = 1;

                } else {
                    $category->status = 0;
                }
                DB::commit();
                $category->save();
                return redirect()->route('category.index')->withSuccess('Sửa danh mục thành công');
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('404');
        }
    }

    public function delete($id)
    {
        $category = $this->categoryModel->find($id);
        $category->delete();
        return response()->json([
            'code' => '200' ,
            'message' => 'success'
        ] , 200) ;

    }
}
