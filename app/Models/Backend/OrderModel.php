<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class OrderModel extends Model
{
    use HasFactory;
    protected $table = "order" ;
    protected $primaryKey = "id";
    protected  $guarded = [] ;
    public  function  product() {
        return $this->belongsToMany(ProductModel::class , 'orderdetail' , 'product_id' , 'order_id' );
    }
}
