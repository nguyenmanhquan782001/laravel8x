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


    public  function  detail() {
        return $this->belongsToMany(ProductModel::class ,
            'orderdetail' ,
            'order_id' ,
            'product_id')
            ->withPivot('product_quantity', 'product_price');
    }

}
