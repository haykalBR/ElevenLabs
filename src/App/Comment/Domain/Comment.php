<?php

declare(strict_types=1);

namespace App\Comment\Domain;

use App\Comment\Domain\ValueObject\Content;
use App\Comment\Infrastructure\CommentRepository;
use App\Infrastructure\Model\ResourceInterface;
use App\Infrastructure\Model\ResourceTrait;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[
    ORM\Entity(repositoryClass: CommentRepository::class),
    ORM\Table(name: 'eleven_labs_comment')
]
class Comment implements ResourceInterface
{
    use ResourceTrait;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    public Content $content;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    public \DateTime $publishedAt;

    public function __construct()
    {
        $this->publishedAt = new \DateTime();
    }
    public function getContent(): string
    {
        return $this->content->toString();
    }



    public function getPublishedAt(): \DateTime
    {
        return $this->publishedAt;
    }


    public function createComment(
        Content $content
    ): Comment {
        $this->publishedAt = new \DateTime();
        $this->content = $content;
        return $this;
    }
}
