<?php

namespace Basket\Interview;

class ProductCollection
{
    /**
     * @var Product
     */
    private array $products;

    public function __construct(array $products)
    {
        $this->products = $products;
    }

    public function add(Product $product)
    {
        $this->products[] = $product;
    }

    public function remove(Product $product)
    {
        foreach ($this->products as $key => $collectionProduct) {
            /**
             * @var Product $collectionProduct
             */
            if ($collectionProduct->getId() === $product->getId()) {
                unset($this->products[$key]);
                return;
            }
        }
    }

    /**
     * @return Product
     */
    public function getProducts()
    {
        return $this->products;
    }
}