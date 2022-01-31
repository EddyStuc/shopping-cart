<?php

namespace App;


class Cart
{

    public function __construct(private array $items = []) {

    }

    public function addItem(Product $product, $amount)
    {
        $available = $product->getAvailableQuantity();

        if ($available < $amount) {
            echo 'Sorry there are ' . $available . ' ' . $product->getTitle() . ' in stock' . PHP_EOL;
        } else if ($available >= $amount) {
            for($i = 0; $i < $amount; $i++) {
                $this->items[] = $product;
                $available--;
                $product->setAvailableQuantity($available);
            }
            echo $amount . ' ' . $product->getTitle() . ' added to cart' . PHP_EOL;
        } 
    }

    public function deleteItem(Product $product, $amount)
    {
       $id = $product->getId();
       $deletedAmount = 0;
       $available = $product->getAvailableQuantity();

        if ($amount > $this->itemCartQuantity($product)) {
            echo 'Items to delete cannot exceed amount in cart' . PHP_EOL;
            exit;
        }

       foreach($this->items as $key => $value) {
            if ($id === $value->getId() && $amount > $deletedAmount ) {
                unset($this->items[$key]);
                $deletedAmount++;
            }
       }
       $product->setAvailableQuantity($available + $amount);
       return $this->items;
    }

    public function itemCartQuantity(Product $product)
    {
        $id = $product->getId();
        $quantity = 0;

        foreach($this->items as $item) {
            if ($id === $item->getId()) {
                $quantity++;
            }
        }
        return $quantity;
    }

    public function currentItems()
    {
        return $this->items;
    }
}
