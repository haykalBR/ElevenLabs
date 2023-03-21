<?php

namespace App\Auth\Domain;

use App\Shared\Infrastructure\Model\ResourceInterface;
use App\Shared\Infrastructure\Model\ResourceTrait;
use Doctrine\ORM\Mapping as ORM;

#[
    ORM\Entity(repositoryClass: UserRepository::class),
    ORM\Table(name: 'eleven_labs_user')
]
class User implements ResourceInterface
{
    use ResourceTrait;
}
