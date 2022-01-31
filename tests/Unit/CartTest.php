<?php

use App\Product;
use App\Cart;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    public function test_that_a_cart_is_created(): void
    {
        $cart = new Cart();

        $this->assertIsObject($cart);
    }

    public function test_that_new_cart_is_empty()
    {
        $cart = new Cart();
        
        $this->assertEmpty($cart->currentItems()); 
    }

    public function test_that_an_item_can_be_added_to_cart()
    {
        $cart = new Cart();
        $product1 = new Product(1, 'iphone', 20, 10);
        $cart->addItem($product1, 1);

        $this->assertNotEmpty($cart->currentItems());
    }

    public function test_that_quantity_added_cannot_exceed_available_quantity()
    {
        $cart = new Cart();
        $product1 = new Product(1, 'iphone', 20, 10);
        $cart->addItem($product1, 11);

        $this->assertEmpty($cart->currentItems());
    }

    public function test_that_an_item_is_deleted_from_cart()
    {
        $cart = new Cart();
        $product1 = new Product(1, 'iphone', 20, 10);
        $cart->addItem($product1, 1);
        $cart->deleteItem($product1, 1);

        $this->assertEmpty($cart->currentItems());
    }

    public function test_that_delete_will_delete_correct_quantity()
    {
        $cart = new Cart();
        $product1 = new Product(1, 'iphone', 20, 10);
        $cart->addItem($product1, 6);
        $cart->deleteItem($product1, 2);

        $expected = 4;

        $this->assertSame($expected, $cart->itemCartQuantity($product1));
    }

    public function test_that_correct_car_item_quantity_is_returned()
    {
        $cart = new Cart();
        $product1 = new Product(1, 'iphone', 20, 10);
        $cart->addItem($product1, 3);

        $expected = 3;

        $this->assertSame($expected, $cart->itemCartQuantity($product1));
    }
}