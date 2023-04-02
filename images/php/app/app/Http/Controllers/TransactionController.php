<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Interfaces\TransactionServiceInterface;

class TransactionController extends Controller
{

    private $transactionService;

    public function __construct(TransactionServiceInterface $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function index()
    {
        $transactions = Transaction::all();
        return response()->json($transactions, 200);
    }

    public function transaction(Request $request)
    {
        try {
            $this->validate($request, [
                'payer' => 'required|integer',
                'receiver' => 'required|integer',
                'amount' => 'required|numeric'
            ]);

            $this->transactionService->performTransaction($request->all());
            
            return response()->json(['success' => 'Transação realizada com sucesso'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'Erro ao realizar transação'], 500);
        }
    }

    
    
}
