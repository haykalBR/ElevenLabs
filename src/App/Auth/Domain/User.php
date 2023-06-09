<?php

declare(strict_types=1);

namespace App\Auth\Domain;

use App\Auth\Infrastructure\UserRepository;
use App\Infrastructure\Model\ResourceInterface;
use App\Infrastructure\Model\ResourceTrait;
use Doctrine\ORM\Mapping as ORM;

#[
    ORM\Entity(repositoryClass: UserRepository::class),
    ORM\Table(name: 'eleven_labs_user')
]
class User implements ResourceInterface
{
    use ResourceTrait;
}
