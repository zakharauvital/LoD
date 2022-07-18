<?php

namespace LoD\Entities;

final class Order
{
    /**
     * @var Item[] array
     */
    private array $items = [];

    public function calculateAmount(): float
    {
        $amount = 0;

        foreach ($this->items as $item) {
            $amount += $item->getPrice();
        }

        return $amount;
    }
}