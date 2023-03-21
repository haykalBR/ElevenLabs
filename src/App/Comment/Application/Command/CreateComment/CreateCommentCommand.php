<?php

declare(strict_types=1);

namespace App\Comment\Application\Command\CreateComment;

use App\Shared\Application\Command\CommandInterface;

final class CreateCommentCommand implements CommandInterface
{
    /**
     *
     * @param array<mixed> $parameters
     */
    public function __construct(public array $parameters = [])
    {
    }
}
