<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = "bill_detail";
    public function product()
    {
    	return $this->belongsTo('App/Product/','id_product','id'); //khóa ngoại là id_product +) id trong belongsTo là id của sản phẩm 
    }
    public function bill()
    {
    	return $this->belongsTo('App/Bill/','id_bill','id'); //khóa ngoại là id_product +) id trong belongsTo là id của sản phẩm 
    }
}
