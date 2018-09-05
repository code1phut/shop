<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customer";
    public function bill()
    {
    	return $this->hasMany('App/Bill/','id_customer','id'); //khóa ngoại là id_customer +) id trong hasMany là id của hóa đơn 
    }
}
