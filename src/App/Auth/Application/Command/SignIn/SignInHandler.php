<?php

declare(strict_types=1);

namespace App\Auth\Application\Command\SignIn;

use App\Application\Command\CommandHandlerInterface;

final class SignInHandler implements CommandHandlerInterface
{
    public function __invoke(SignInCommand $command): void
    {
        dd($command);
    }
}
