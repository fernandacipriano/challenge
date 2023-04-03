<?php

namespace App\Models;

class TransactionValidate
{

   const RULE_TRANSACTION = [
        'payer' => 'required|integer',
        'receiver' => 'required|integer',
        'amount' => 'required|numeric'
   ];

   CONST RULE_MESSAGE_TRANSACTION = [
        'payer.required' => 'O campo pagador é obrigatório',
        'payer.integer' => 'O campo pagador deve ser um número inteiro',
        'receiver.required' => 'O campo recebedor é obrigatório',
        'receiver.integer' => 'O campo recebedor deve ser um número inteiro',
        'amount.required' => 'O campo valor é obrigatório',
        'amount.numeric' => 'O campo valor deve ser um número',
   ];
}
