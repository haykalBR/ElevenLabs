<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Bus\AsyncEvent;

use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler()]
interface AsyncEventHandlerInterface
{
}
