<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function index()
    {
        return view("backend.comment.index");
    }

    public function displayComment(Request $request)
    {

        if (Auth::user()) {
            $validator = Validator::make($request->all(),
                ['content' => "required"],
                ['content.required' => "Chưa có gì"]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            $input = $request->all();
            $input['user_id'] = Auth::id();
            Comment::create($input);
            return redirect()->back()->with("toast_success", 'Đã bình luận sản phẩm này');
        }
        return redirect()->back()->with("toast_info", "Bạn cần đăng nhập để bình luận");
    }
    public  function deleteComment($id){
        $item = Comment::find($id);
        $item->delete();
        return redirect()->back();

    }


}
