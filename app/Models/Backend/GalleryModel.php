<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryModel extends Model
{
//    use HasFactory;
    protected $table = "product_gallery";
    protected $primaryKey = "id";
    protected  $fillable = ['image_path', 'image_name' ];


}
