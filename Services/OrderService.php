<?php

namespace LoD\Services;

use LoD\Entities\Client;
use LoD\Entities\Order;
use LoD\Entities\Wallet;

final class OrderService
{
    public function __construct(
        private Client $client = new Client(
            wallet: new Wallet(money: 100)
        ),
        private Order $order = new Order(),
    ) {
    }

    public function makeOrder(): void
    {
        $amount = $this->order->calculateAmount();

        $this->client->getWallet()->subtractMoney($amount); // <- !!! that violates LoD !!!

        $wallet = $this->client->getWallet();
        $wallet->subtractMoney($amount); // <- !!! that violates LoD !!!

        $this->client->subtractMoney($amount); // <- that doesn't violate LoD ! DELEGATE it !
        // В объектно-ориентированной парадигме объекты должны указывать другим объектам,
        // что делать — делегировать, а не запрашивать данные у других и делать все самостоятельно.

        // Мы не хотим, чтобы функции знали обо всей системной карте объектов.
        // Отдельные функции должны обладать ограниченным объемом знаний. Мы хотим говорить объектам по соседству,
        // что именно требуется сделать, и делегировать им передачу этого сообщения наружу.

        // Придерживаться данного правила довольно сложно.
        // Поэтому иногда его называют предложением Деметры — из-за того, с какой легкостью его можно нарушить.
        // Но плюсы очевидны: любая функция, которая следует данному правилу и «говорит» вместо того,
        // чтобы «спрашивать», отделяется от своих «соседей».
    }
}