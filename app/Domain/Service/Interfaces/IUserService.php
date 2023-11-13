<?php

namespace App\Domain\Service\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface IUserService
{
    public function listAllUsers(): LengthAwarePaginator;
}
