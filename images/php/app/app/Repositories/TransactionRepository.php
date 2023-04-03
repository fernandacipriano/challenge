<?php 

namespace App\Repositories;

use App\Models\Transaction;
use App\Interfaces\TransactionRepositoryInterface;
use Illuminate\Support\Facades\DB;

class TransactionRepository implements TransactionRepositoryInterface
{
    
    public function getTransactions(): array
    {
        return Transaction::all()->toArray();
    }


    public function conclude($amount, $payer, $receiver): bool
    {

        try {
            DB::beginTransaction();
            $transaction = new Transaction();
            $transaction->amount = $amount;
            $transaction->payer_user_Id = $payer->id;
            $transaction->receiver_user_id = $receiver->id;
            $transaction->save();

            $payer->balance -= $transaction->amount;
            $payer->save();

            $receiver->balance += $transaction->amount;
            $receiver->save();

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }
}
