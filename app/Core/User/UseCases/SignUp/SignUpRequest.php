<?php

namespace App\Core\User\UseCases\SignUp;

use App\Exceptions\BadRequestException;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class SignUpRequest
{
    public string $firstName;
    public string $lastName;
    public string $userName;
    public string $password;

    /**
     * @throws BadRequestException
     */
    public function __construct(Request $request)
    {
        $this->firstName = $request->input('firstName', '');
        $this->lastName = $request->input('lastName', '');
        $this->userName = $request->input('userName', '');
        $this->password = $request->input('password', '');

        if (empty($this->firstName)) throw new BadRequestException('FIRST_NAME_IS_REQUIRED');
        if (empty($this->lastName)) throw new BadRequestException('LAST_NAME_IS_REQUIRED');
        if (empty($this->userName)) throw new BadRequestException('USER_NAME_IS_REQUIRED');
        if (empty($this->password)) throw new BadRequestException('PASSWORD_IS_REQUIRED');
    }
}
