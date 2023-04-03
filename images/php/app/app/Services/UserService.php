<?php

namespace App\Services;

use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\UserServiceInterface;

class UserService implements UserServiceInterface
{

    private $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function getUser($id)
    {
        $user = $this->userRepository->find($id);
        return response()->json($user);
    }

    public function save($data)
    {
        return $this->userRepository->save($data);
    }

    public function list(){
        $users = $this->userRepository->all();
        return response()->json($users);
    }
    
}
