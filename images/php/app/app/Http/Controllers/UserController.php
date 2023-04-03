<?php

namespace App\Http\Controllers;

use App\Interfaces\UserServiceInterface;
use App\Models\UserValidate;
use Illuminate\Http\Request;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{

    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function create(Request $request){
        try{
            $this->validate($request, 
                UserValidate::RULE_USER, 
                UserValidate::RULE_MESSAGE_USER
            );

            return $this->userService->save($request->all());

        }catch(Exception $e){
            return response()->json($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    public function getUser($id){
        return $this->userService->getUser($id);
    }

    public function list(){
        return response()->json($this->userService->list());
    }
    
}
