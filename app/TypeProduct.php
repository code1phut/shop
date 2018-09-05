<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    protected $table = "type_products";
     public function product()
    {
    	return $this->hasMany('App/Product/','id_type','id');//khóa ngoại là id_type chung của sp
    	//id trong belongsTo là id của sản phẩm 
    }
}
