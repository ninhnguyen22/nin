<?php

namespace App\Repositories;

use App\Entities\User;
use Nin\Libs\Repository\AbstractRepository;

class UserRepository extends AbstractRepository
{
    public function entity()
    {
        return User::class;
    }
}
