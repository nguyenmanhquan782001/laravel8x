<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetailModel extends Model
{
    protected  $table = "orderdetail";
    protected $primaryKey = "id" ;
    protected $fillable  = ['id' , 'product_id' , 'order_id' , 'product_price' , 'product_quantity'];


    use HasFactory;
}
