<?php

namespace App\Core\User\UseCases\SignUp;

use App\Core\User\IUserPersistence;
use App\Core\User\User;
use App\Exceptions\BadRequestException;

class SignUpUseCase
{
    public function __construct(private readonly IUserPersistence $userPersistence)
    {
    }

    /**
     * @throws BadRequestException
     */
    function execute(SignUpRequest $request): void {

        $userNameExists = $this->userPersistence->getByUserNameOrNull($request->userName);
        if(!is_null($userNameExists)) throw new BadRequestException('INVALID_USER_NAME');

        $user = new User();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->userName = $request->userName;

        $this->userPersistence->create($user);
    }
}
