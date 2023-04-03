<?php

namespace App\Interfaces;

interface TransactionRepositoryInterface
{
    public function getTransactions();
    public function conclude($amount, $payer, $receiver);
}
