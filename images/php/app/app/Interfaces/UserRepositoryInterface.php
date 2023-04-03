<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function find($id);
    public function save($data);
    public function all();
}
