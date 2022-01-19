<?php

namespace Basket\Interview;

class Product
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var float
     */
    private $price;
    private int $id;

    public function __construct(int $id, string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
}