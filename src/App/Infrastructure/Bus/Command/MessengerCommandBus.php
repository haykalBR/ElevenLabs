<?php

declare(strict_types=1);

namespace App\Infrastructure\Bus\Command;

use App\Application\Command\CommandBusInterface;
use App\Application\Command\CommandInterface;
use App\Infrastructure\Bus\MessageBusExceptionTrait;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\MessageBusInterface;
use Throwable;

final class MessengerCommandBus implements CommandBusInterface
{
    use MessageBusExceptionTrait;

    public function __construct(private readonly MessageBusInterface $messageBus)
    {
    }

    /**
     * @throws Throwable
     */
    public function handle(CommandInterface $command): void
    {
        try {
            $this->messageBus->dispatch($command);
        } catch (HandlerFailedException $e) {
            $this->throwException($e);
        }
    }
}
