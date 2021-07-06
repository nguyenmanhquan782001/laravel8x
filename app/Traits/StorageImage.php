<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait StorageImage
{
    public function StorageImage($request, $file_name, $dir)
    {
        if ($request->hasFile($file_name)) {
            $file = $request->$file_name;
            $file_name_Origin = $file->getClientOriginalName(); // lấy tên file ảnh
            $file_name_Hash = Str::random(10) . "." . $file->getClientOriginalExtension(); // lấy đuôi file ảnh
            $path_image = $request->file($file_name)->storeAs('public/' . $dir, $file_name_Hash);
            $data_insert = [
                'file_name' => $file_name_Origin,
                'file_path' => Storage::url($path_image)
            ];
            return $data_insert;
        }
        return false;
    }

    public function StoreImageMultiple($file_name, $dir)
    {
        $file_name_Origin = $file_name->getClientOriginalName();
        $file_name_Hash = Str::random(10) . "." . $file_name->getClientOriginalExtension();
        $path_image = $file_name->storeAs("public/" . $dir, $file_name_Hash);
        $data_insert = [
            'file_name' => $file_name_Origin,
            'file_path' => Storage::url($path_image)
        ];
        return $data_insert;

    }

}
