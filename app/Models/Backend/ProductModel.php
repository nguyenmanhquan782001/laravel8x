<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\CategoryModel;
use App\Models\Backend\GalleryModel ;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = "product";
    protected $primaryKey = "id";
    protected $fillable = [
        'product_name', 'product_price',
        'product_publish', 'product_quantity',
        'category_id', 'product_status', 'product_image',
        'product_desc', 'short_desc'
    ];
    public function category () {
        return $this->belongsTo(CategoryModel::class) ;
    }
    public  function  gallery() {
        return $this->hasMany(GalleryModel::class , 'product_id');
    }
}
