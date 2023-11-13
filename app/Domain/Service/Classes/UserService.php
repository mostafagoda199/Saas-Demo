<?php

namespace App\Domain\Service\Classes;

use App\Domain\Repositories\Interfaces\IUserRepository;
use App\Domain\Service\Interfaces\IUserService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserService implements IUserService
{
    public function __construct(private readonly IUserRepository $userRepository)
    {
    }

    public function listAllUsers(): LengthAwarePaginator
    {
        return $this->userRepository->retrieve();
    }
}
