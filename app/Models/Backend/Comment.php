<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected  $table = "comments";
    protected $primaryKey = "id";
    protected $fillable = ['user_id' , 'product_id' , 'content'];
    public  function  userId() {
       return  $this->belongsTo(User::class , 'user_id');
    }
}
