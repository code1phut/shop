<?php

namespace App;
use App\Product;

class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}
	public function add($item, $id){
	$price_unit_or_promo = $item->unit_price;
	if($item->promotion_price != 0){
	$price_unit_or_promo = $item->promotion_price;
	}

	$cart = ['qty'=>0, 'price' => $price_unit_or_promo, 'item' => $item];
	if($this->items){
	if(array_key_exists($id, $this->items)){
		$cart = $this->items[$id];
	}
	}
	$cart['qty']++;
	$cart['price'] = $price_unit_or_promo * $cart['qty'];

	$this->items[$id] = $cart; 
	$this->totalQty++; 
	$this->totalPrice += $price_unit_or_promo; 
	}

	//xóa 1
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['price'];
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
