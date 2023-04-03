<?php

namespace App\Interfaces;

interface TransactionServiceInterface
{
    public function getTransactions();
    public function performTransaction($data);
}
