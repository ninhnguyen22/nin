<?php

namespace Nin\Repositories;

use Nin\Entities\User;
use Nin\Libs\Repository\AbstractRepository;

class UserRepository extends AbstractRepository
{
    public function entity()
    {
        return User::class;
    }
}
