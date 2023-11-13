<?php

namespace App\Http\Controllers;

use App\Domain\Service\Interfaces\IUserService;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    public function __construct(private readonly IUserService $userService)
    {
    }

    public function index(): AnonymousResourceCollection
    {
        return UserResource::collection($this->userService->listAllUsers());
    }
}
