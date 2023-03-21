<?php

declare(strict_types=1);

namespace App\Comment\Application\Command\CreateComment;

use App\Comment\Domain\Comment;
use App\Comment\Application\Command\CreateComment\CreateCommentCommand;
use App\Shared\Infrastructure\Bus\AsyncEvent\AsyncEventHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;

final class CreateCommentHandler implements AsyncEventHandlerInterface
{
    public function __construct(private EntityManagerInterface $manager)
    {
    }
    public function __invoke(CreateCommentCommand $command): void
    {
        $comment = new Comment();
        $comment->setContent($command->parameters['content']);
        $this->manager->persist($comment);
        $this->manager->flush();
    }
}
