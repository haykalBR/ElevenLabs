<?php

declare(strict_types=1);

namespace App\Infrastructure\Model;

interface ResourceInterface
{
    public function getId(): ?int;

    public function setId(int $id): self;
}
