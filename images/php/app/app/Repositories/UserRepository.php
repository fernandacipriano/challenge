<?php 

namespace App\Repositories;

use App\Models\User;
use App\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    
    public function find($id): User
    {
        return $this->user->find($id);
    }
    
    public function save($data)
    {
        $this->user->name = $data['name'];
        $this->user->email = $data['email'];
        $this->user->identity = $data['identity'];
        $this->user->password = $data['password'];
        $this->user->balance = $data['balance'];
        $this->user->save();
        
        return $this->user;
    }

    public function all(): array
    {
        return $this->user->all()->toArray();
    }
}
