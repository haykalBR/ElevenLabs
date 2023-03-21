<?php

namespace App\Comment\Domain;

use App\Shared\Infrastructure\Model\ResourceInterface;
use App\Shared\Infrastructure\Model\ResourceTrait;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[
    ORM\Entity(repositoryClass: CommentRepository::class),
    ORM\Table(name: 'eleven_labs_comment')
]
class Comment implements ResourceInterface
{
    use ResourceTrait;

    #[ORM\Column(type: Types::TEXT)]
    public string $content;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    public \DateTime $publishedAt;

    public function __construct()
    {
        $this->publishedAt = new \DateTime();
    }
    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getPublishedAt(): \DateTime
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(\DateTime $publishedAt): void
    {
        $this->publishedAt = $publishedAt;
    }
}
