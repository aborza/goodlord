<?php

namespace Basket\Interview;

class Basket
{
    private CONST ADD_OPERATION = 'add';

    private CONST REMOVE_OPERATION = 'remove';

    /**
     * @var ProductCollection $products
     */
    private ProductCollection $products;

    /**
     * @var int[] $quantities
     */
    private array $quantities;

    public function __construct()
    {
        $this->products = new ProductCollection([]);
    }

    /**
     * @param Product $product
     */
    public function addProduct(Product $product): void
    {
        if ($this->isProductInTheBasket($product) === false) {
            $this->products->add($product);
        }

        $this->refreshQuantity($product->getId(), self::ADD_OPERATION);

    }

    public function removeProduct(Product $product)
    {
        $this->products->remove($product);

        $this->refreshQuantity($product->getId(), self::REMOVE_OPERATION);
    }

    public function resetBasket()
    {
        $this->products = new ProductCollection([]);
    }

    public function getTotalCost(): float
    {
        $totalCost = 0;

        foreach ($this->products->getProducts() as $product) {
            /**
             * @var Product $product
             */
            $totalCost += $product->getPrice() * $this->getProductQuantity($product);
        }

        return $totalCost;
    }

    /**
     * @param int $id
     * @param $operation
     */
    private function refreshQuantity(int $id, $operation)
    {
        $this->quantities[$id] = $this->quantities[$id] ?? 0;
        $operation === self::ADD_OPERATION ? $this->quantities[$id]++ : $this->quantities[$id]--;

        if ($this->quantities[$id] === 0) {
            unset($this->quantities[$id]);
        }
    }

    /**
     * @param int $id
     * @return int
     */
    private function getProductQuantity(Product $product): int
    {
        return $this->quantities[$product->getId()] ?? 0;
    }

    private function isProductInTheBasket(Product $product): bool
    {
        return isset($this->quantities[$product->getId()]);
    }


    public function test(): string
    {
        return 'CXXXXXX';
    }
}