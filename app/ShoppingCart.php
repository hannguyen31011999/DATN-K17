<?php
namespace App;
class ShoppingCart{
	public $products = null;
	public $totalPrice = 0;
	public $totalQuantity = 0;
	public function __construct($cart)
	{
		if($cart){
			$this->products = $cart->products;
			$this->totalPrice = $cart->totalPrice;
			$this->totalQuantity = $cart->totalQuantity;
		}
	}
	public function AddCart($product,$id)
	{
		$newProduct = ['name'=>"",'unit_price'=>0,'promotion_price'=>0,'qty'=>0,'image'=>""];
		if(!empty($this->products))
		{
			if(array_key_exists($id,$this->products))
			{
				$newProduct = $this->products[$id];
			}
		}
		$newProduct["name"] = $product->product_name;
		$newProduct["qty"]++;
		$newProduct["unit_price"]=$product->unit_price;
		$newProduct["promotion_price"]=$product->promotion_price;
		$newProduct["image"]=$product->image;
		$this->products[$id]=$newProduct;
		$this->totalPrice += empty($product->promotion_price) ? $product->unit_price : $product->promotion_price;
		$this->totalQuantity++;
	}

	public function updateCart($id,$soluong)
	{
		$this->totalPrice -= empty($this->products[$id]["promotion_price"]) ? 
		$this->products[$id]["qty"] * $this->products[$id]["unit_price"] : 
		$this->products[$id]["qty"] * $this->products[$id]["promotion_price"];

		$this->totalQuantity -= $this->products[$id]["qty"];
		$newProduct = ['name'=>$this->products[$id]["name"],'unit_price'=>$this->products[$id]["unit_price"],'promotion_price'=>$this->products[$id]["promotion_price"],'qty'=>$soluong,'image'=>$this->products[$id]["image"]];
		if(array_key_exists($id,$this->products))
		{
			$this->products[$id] = $newProduct;
		}
		$this->totalQuantity += $soluong;
		$this->totalPrice += empty($this->products[$id]["promotion_price"]) ? 
		$soluong * $this->products[$id]["unit_price"] : 
		$soluong * $this->products[$id]["promotion_price"];
	}

	public function updateAddCart($id,$soluong)
	{
		$this->totalQuantity -= 1;
		$this->totalPrice -= empty($this->products[$id]["promotion_price"]) ? $this->products[$id]["unit_price"] : $this->products[$id]["promotion_price"];
		$newProduct = ['name'=>$this->products[$id]["name"],'unit_price'=>$this->products[$id]["unit_price"],'promotion_price'=>$this->products[$id]["promotion_price"],'qty'=>$soluong,'image'=>$this->products[$id]["image"]];
		if(array_key_exists($id,$this->products))
		{
			$this->products[$id]['qty'] += $newProduct['qty']-1;
		}
		$this->totalQuantity += $soluong;
		$this->totalPrice += empty($this->products[$id]["promotion_price"]) ? 
		$soluong * $this->products[$id]["unit_price"] : 
		$soluong * $this->products[$id]["promotion_price"];
	}
	public function deleteCart($id)
	{
		if(array_key_exists($id,$this->products))
		{
			$this->totalPrice -= empty($this->products[$id]["promotion_price"]) ? 
			$this->products[$id]["qty"] * $this->products[$id]["unit_price"] : 
			$this->products[$id]["qty"] * $this->products[$id]["promotion_price"];

			$this->totalQuantity -= $this->products[$id]["qty"];
			unset($this->products[$id]);
		}
	}
}
?>