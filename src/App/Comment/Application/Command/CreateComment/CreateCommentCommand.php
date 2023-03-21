<?php

declare(strict_types=1);

namespace App\Comment\Application\Command\CreateComment;

use App\Application\Command\CommandInterface;
use App\Comment\Domain\ValueObject\Content;

final class CreateCommentCommand implements CommandInterface
{
    public Content $content;

    /**
     *
     * @param array<mixed> $parameters
     */
    public function __construct(public array $parameters = [])
    {
        $this->content = Content::fromString($this->parameters['content']);
    }
}
