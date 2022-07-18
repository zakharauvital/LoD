<?php

namespace LoD\Entities;

final class Item
{
    public function __construct(
        private float $price,
    ) {
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}