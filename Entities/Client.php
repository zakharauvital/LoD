<?php

namespace LoD\Entities;

final class Client
{
    public function __construct(
        private Wallet $wallet,
    ) {
    }

    // violation of LoD
    public function getWallet(): Wallet
    {
        return $this->wallet;
    }

    // right way! DELEGATE it!
    public function subtractMoney(float $amount): void
    {
        $this->wallet->subtractMoney($amount);
    }
}