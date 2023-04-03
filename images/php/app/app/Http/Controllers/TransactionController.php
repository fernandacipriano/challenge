<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\TransactionServiceInterface;
use App\Models\TransactionValidate;
use Symfony\Component\HttpFoundation\Response;

class TransactionController extends Controller
{

    private $transactionService;

    public function __construct(TransactionServiceInterface $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function index()
    {
        $transactions = $this->transactionService->getTransactions();
        return response()->json($transactions, 200);
    }

    public function transaction(Request $request)
    {
        try {
            $this->validate($request, 
                TransactionValidate::RULE_TRANSACTION, 
                TransactionValidate::RULE_MESSAGE_TRANSACTION
            );

            return $this->transactionService->performTransaction($request->all());
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    
    
}
