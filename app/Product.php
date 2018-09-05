<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    public function product()
    {
    	return $this->belongsTo('App/Product/','id_type','id'); //khóa ngoại là id_type +) id trong belongsTo là id của sản phẩm 
    }
    public function bill_detail()
    {
    	return $this->hasMany('App/BillDetail','id_product','id'); // id của hóa đơn 
    }
}
