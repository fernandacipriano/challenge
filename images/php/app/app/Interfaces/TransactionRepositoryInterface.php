<?php

namespace App\Interfaces;

interface TransactionRepositoryInterface
{
    public function conclude($amount, $payer, $receiver): bool;
}
