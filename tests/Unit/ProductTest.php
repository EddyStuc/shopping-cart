<?php

use App\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function test_that_a_product_is_created(): void
    {
        $product1 = new Product(1, 'Iphone', 1000, 10);

        $this->assertIsObject($product1);
    }

    public function test_that_correct_available_quantity_is_returned()
    {
        $product1 = new Product(1, 'Iphone', 1000, 10);

        $expected = 10;

        $this->assertSame($expected, $product1->getAvailableQuantity());
    }

    public function test_that_correct_available_quantity_can_be_set()
    {
        $product1 = new Product(1, 'Iphone', 1000, 10);
        
        $product1->setAvailableQuantity(15);

        $expected = 15;

        $this->assertSame($expected, $product1->getAvailableQuantity());
    }
}