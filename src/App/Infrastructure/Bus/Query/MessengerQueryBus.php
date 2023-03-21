<?php

declare(strict_types=1);

namespace App\Infrastructure\Bus\Query;

use App\Application\Query\Collection;
use App\Application\Query\QueryBusInterface;
use App\Application\Query\QueryInterface;
use App\Infrastructure\Bus\MessageBusExceptionTrait;
use App\Shared\Application\Query\Item;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;
use Throwable;

final class MessengerQueryBus implements QueryBusInterface
{
    use MessageBusExceptionTrait;

    public function __construct(private readonly MessageBusInterface $messageBus)
    {
    }

    /**
     * @return Collection|mixed
     *
     * @throws Throwable
     */
    public function ask(QueryInterface $query)
    {
        try {
            $envelope = $this->messageBus->dispatch($query);

            /** @var HandledStamp $stamp */
            $stamp = $envelope->last(HandledStamp::class);

            return $stamp->getResult();
        } catch (HandlerFailedException $e) {
            $this->throwException($e);
        }
        return;
    }
}
