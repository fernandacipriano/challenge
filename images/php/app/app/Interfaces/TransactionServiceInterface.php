<?php

namespace App\Interfaces;

use App\Models\User;

interface TransactionServiceInterface
{
    // public function isStore(User $model): bool;
    // public function haveBalance($balancePayer, $amount): bool;
    public function performTransaction($data): bool;
}
