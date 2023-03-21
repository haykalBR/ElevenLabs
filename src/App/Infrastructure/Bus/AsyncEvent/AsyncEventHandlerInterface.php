<?php

declare(strict_types=1);

namespace App\Infrastructure\Bus\AsyncEvent;

use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler()]
interface AsyncEventHandlerInterface
{
}
