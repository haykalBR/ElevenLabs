<?php

namespace App\Shared\Infrastructure\Model;

interface ResourceInterface
{
    public function getId(): ?int;

    public function setId(int $id): self;
}
