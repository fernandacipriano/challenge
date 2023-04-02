<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class UserController extends Controller
{

    public function create(Request $request){
        try{
            $this->validate($request, [
                'name' => 'required',
                'identity' => 'required|unique:users',
                'email' => 'required|unique:users',
                'password' => 'required',
                'balance' => 'required',
                'type' => 'required'
            ]);

            $user = new User();
            $user->name = $request->name;
            $user->identity = $request->identity;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->balance = $request->balance;
            $user->type = $request->type;            
            $user->save();
        }catch(Exception $e){
            return response()->json($e->getMessage(), 422);
        }
    }


    public function getUser($id){
        $user = User::find($id);
        return response()->json($user);
    }

    public function list(){
        $users = User::all();
        return response()->json($users);
    }

    
    
}
