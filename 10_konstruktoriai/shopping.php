<?php

class ShoppingCart
{
    public $items = array();
  //  public $date = null;

    public function addItem($item)
    {
        array_push($this->items, $item);
    }

    public function getItems(){
        return $this->items;
    }


}

class ShoppingCartItem extends ShoppingCart
{
    public $id = null;
    public $price = null;
    public $quantity = null;
    public $name = null;
}


$cart = new ShoppingCart;
$item = new ShoppingCartItem;
$item->name = "Potato";
$item->price = 5;
$item->quantity = 10;
$item->id = 2;
$cart->addItem($item);
var_dump($cart->getItems());
echo "<br>";



class Drink{
    protected $name = null;

    protected function setDrinkName($name){
        $name->name;
    }
    public function getDrinkName(){
        return $this->name;
    }

}

class Coffee extends Drink{
    protected $name="caramel macchiato";
}

$coffee = new Coffee;
echo "My new drink is:".$coffee->getDrinkName();
