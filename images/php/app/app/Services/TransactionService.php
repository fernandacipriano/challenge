<?php

namespace App\Services;

use App\Interfaces\TransactionRepositoryInterface;
use App\Models\User;
use App\Interfaces\TransactionServiceInterface;
use App\Interfaces\UserRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

class TransactionService implements TransactionServiceInterface
{

    private $transactionRepository;
    private $userRepository;

    public function __construct(
        TransactionRepositoryInterface $transactionRepository,
        UserRepositoryInterface $userRepository
    )
    {
        $this->transactionRepository = $transactionRepository;
        $this->userRepository = $userRepository;
    }

    public function getTransactions()
    {
        return $this->transactionRepository->getTransactions();
    }

    public function performTransaction($data)
    {
        try {
            $payer = $this->userRepository->find($data['payer']);
            $receiver = $this->userRepository->find($data['receiver']);

            if ($this->isStore($payer)){
                return response()->json([
                        'error' => 'Transação não realizada, loja não pode fazer transferências'
                    ], 
                    Response::HTTP_PARTIAL_CONTENT
                );
            }

            if (!$this->haveBalance($payer->balance, $data['amount'])) {
                return response()->json([
                        'error' => 'Transação não realizada, saldo insuficiente'
                    ], 
                    Response::HTTP_PARTIAL_CONTENT
                );
            }

            $this->transactionRepository->conclude($data['amount'], $payer, $receiver);
            return response()->json(['success' => 'Transação realizada com sucesso'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
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
