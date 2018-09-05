<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bills";
    public function bill_detail()
    {
    	return $this->hasMany('App/BillDetail/','id_bill','id'); //khóa ngoại là id_bill +) id trong hasMany là id của sản phẩm 
    }
    public function bill()
    {
    	return $this->belongsTo('App/Bill/','id_customer','id'); //khóa ngoại là id_bill +) id trong hasMany là id của sản phẩm 
    }
}
