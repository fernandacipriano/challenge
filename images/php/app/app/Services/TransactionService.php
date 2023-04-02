<?php

namespace App\Services;

use App\Interfaces\TransactionRepositoryInterface;
use App\Models\User;
use App\Interfaces\TransactionServiceInterface;

class TransactionService implements TransactionServiceInterface
{

    private $transactionRepository;

    public function __construct(
        TransactionRepositoryInterface $transactionRepository
    )
    {
        $this->transactionRepository = $transactionRepository;
    }


    public function performTransaction($data): bool
    {
        try {
            $payer = User::find($data['payer']);
            $receiver = User::find($data['receiver']);

            if (!$this->isStore($payer) && $this->haveBalance($payer->balance, $data['amount'])) {
                $this->transactionRepository->conclude($data['amount'], $payer, $receiver);
            }

            return true;
        } catch (\Exception $e) {
            return false;
        }
        
    }

    protected function isStore(User $model): bool
    {
        if ($model->type == 'SHOPKEEPER') {
            return true;
        }
        return false;
    }

    protected function haveBalance($balancePayer, $amount): bool
    {
        if ($balancePayer >= $amount) {
            return true;
        }
        return false;
    }
    
}
