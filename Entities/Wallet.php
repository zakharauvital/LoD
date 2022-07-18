<?php

namespace LoD\Entities;

final class Wallet
{
    public function __construct(
        private float $money,
    ) {
    }

    public function subtractMoney(float $amount): void
    {
        $this->money -= $amount;
    }
}