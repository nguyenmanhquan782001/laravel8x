<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremissionModel extends Model
{
    use HasFactory;
    protected $table = "permission" ;
    protected $primaryKey = "id" ;
    public  function  parentPermission () {
        return $this->hasMany(PremissionModel::class , 'parent_id');
    }
}
