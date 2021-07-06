<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
//    use HasFactory;
protected  $table = "category";
protected $primaryKey = "id";
protected  $fillable = ['category_name' , 'slug' , 'status'];


}