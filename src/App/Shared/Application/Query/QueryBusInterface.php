<?php

declare(strict_types=1);

namespace App\Shared\Application\Query;

interface QueryBusInterface
{
    /**
    * @return Collection|mixed
    */
    public function ask(QueryInterface $query);
}
