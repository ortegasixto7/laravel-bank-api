<?php

namespace App\Http\Controllers;

use App\Core\User\UserPersistence;
use App\Core\User\UseCases\SignUp\SignUpRequest;
use App\Core\User\UseCases\SignUp\SignUpUseCase;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(protected readonly UserPersistence $userPersistence)
    {
    }


    public function signUp(Request $request)
    {
        return $this->requestWrapper(function() use ($request) {
            $useCase = new SignUpUseCase($this->userPersistence);
            $useCase->execute(new SignUpRequest($request));
            return response()->noContent(200);
        });
    }
}
