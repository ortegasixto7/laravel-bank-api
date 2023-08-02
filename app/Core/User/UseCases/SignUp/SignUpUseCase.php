<?php

namespace App\Core\User\UseCases\SignUp;

use App\Core\User\IUserPersistence;
use App\Core\User\User;
use App\Exceptions\BadRequestException;
use App\External\Auth\Auth;
use App\External\Auth\IAuthService;

class SignUpUseCase
{
    public function __construct(
        private readonly IUserPersistence $userPersistence,
        private readonly IAuthService $authService)
    {
    }

    /**
     * @throws BadRequestException
     */
    function execute(SignUpRequest $request): void {

        $userNameExists = $this->userPersistence->getByUserNameOrNull($request->userName);
        if(!is_null($userNameExists)) throw new BadRequestException('INVALID_USER_NAME');

        $auth = new Auth();
        $auth->userName = $request->userName;
        $auth->password = $request->password;
        $auth->roles = ['USER'];

        $user = new User();
        $user->id = $auth->id;
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->userName = $request->userName;

        $this->authService->create($auth);
        $this->userPersistence->create($user);
    }
}
