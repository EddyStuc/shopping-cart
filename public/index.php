<?php

use App\Product;
use App\Cart;

require_once __DIR__ . '/../vendor/autoload.php';

$product1 = new Product(1, 'Iphone', 1000, 10);
$product2 = new Product(2, 'Samsung', 2100, 10);
$product3 = new Product(3, 'Nokia', 800, 10);

$cart = new Cart();

$cart->addItem($product1, 2);
$cart->addItem($product2, 2);

$cart->deleteItem($product1, 1);

var_dump($product1->getAvailableQuantity());

$cart->addItem($product1, 10);