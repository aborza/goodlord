<?php

namespace Basket\Interview\Test;

use Basket\Interview\Basket;
use Basket\Interview\Product;
use Basket\Interview\ProductCollection;
use PHPUnit\Framework\TestCase;


class TestBasket extends TestCase
{
    private Basket $basket;

    public function setUp(): void
    {
        $this->basket = new Basket();
    }

    /**
     * @param ProductCollection $productCollection
     * @param float $totalCost
     * @dataProvider basketProvide
     */
    public function testGetTotalCost(ProductCollection $productCollection, float $totalCost)
    {
        foreach ($productCollection->getProducts() as $product)
        {
            $this->basket->addProduct($product);
        }

        $this->assertEquals($this->basket->getTotalCost(), $totalCost);
    }

    /**
     * @return array
     */
    public function basketProvide(): array
    {
        return [
            [new ProductCollection([
                new Product(1, 'PC', 1200),
                new Product(1, 'PC', 1200),
                new Product(1, 'PC', 1200),
                new Product(2, 'Snowboard', 500),
            ]), 4100],
        ];
    }
}