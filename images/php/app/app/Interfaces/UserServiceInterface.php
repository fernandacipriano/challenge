<?php

namespace App\Interfaces;

interface UserServiceInterface
{
    public function getUser($id);
    public function save($data);
    public function list();
}
