<?php

declare(strict_types=1);

namespace App\Auth\Application\Command\SignIn;

use App\Application\Command\CommandInterface;

final class SignInCommand implements CommandInterface
{
    public function __construct(public string $token)
    {
    }
}
