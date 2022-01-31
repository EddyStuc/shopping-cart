<?php 

namespace App;

class Product
{
    public function __construct(private int $id, private string $title,private float $price, private int $availableQuantity) {
    
    }

    public function getId()
    {
        return $this->id;
    }
    
    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }
    
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getPrice()
    {
        return $this->price;
    }
    
    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    public function getAvailableQuantity()
    {
        return $this->availableQuantity;
    }
    
    public function setAvailableQuantity(int $availableQuantity)
    {
        $this->availableQuantity = $availableQuantity;
    }
}