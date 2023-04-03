<?php

namespace App\Models;

class UserValidate
{

   const RULE_USER = [
     'name' => 'required',
     'identity' => 'required|unique:users',
     'email' => 'required|unique:users',
     'password' => 'required',
     'balance' => 'required',
     'type' => 'required'
   ];

   CONST RULE_MESSAGE_USER = [
     'name.required' => 'O campo nome é obrigatório',
     'identity.required' => 'O campo identidade é obrigatório',
     'identity.unique' => 'O campo identidade deve ser único',
     'email.required' => 'O campo email é obrigatório',
     'email.unique' => 'O campo email deve ser único',
     'password.required' => 'O campo senha é obrigatório',
     'balance.required' => 'O campo saldo é obrigatório',
     'type.required' => 'O campo tipo é obrigatório',
   ];
}
