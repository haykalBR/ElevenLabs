<?php

namespace App\Comment\Domain\ValueObject;

use Assert\Assertion;
use Assert\AssertionFailedException;

final class Content implements \JsonSerializable, \Stringable
{
    private function __construct(private readonly string $content)
    {
    }

    /**
     * @throws AssertionFailedException
     */
    public static function fromString(string $content): self
    {

        Assertion::string($content, 'Not a valid string');

        return new self($content);
    }

    public function toString(): string
    {
        return $this->content;
    }

    public function __toString(): string
    {

        return $this->content;
    }

    public function jsonSerialize(): string
    {
        return $this->toString();
    }
}
