<?php

namespace App\Http\Controllers;

use App\Core\User\UserPersistence;
use App\Core\User\UseCases\SignUp\SignUpRequest;
use App\Core\User\UseCases\SignUp\SignUpUseCase;
use App\External\Auth\AuthService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        private readonly UserPersistence $userPersistence,
        private readonly AuthService $authService)
    {
    }


    public function signUp(Request $request)
    {
        return $this->requestWrapper(function() use ($request) {
            $useCase = new SignUpUseCase($this->userPersistence, $this->authService);
            $useCase->execute(new SignUpRequest($request));
            return response()->noContent(200);
        });
    }
}
