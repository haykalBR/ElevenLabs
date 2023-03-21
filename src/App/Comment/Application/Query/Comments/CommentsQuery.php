<?php

declare(strict_types=1);

namespace App\Comment\Application\Query\Comments;

use App\Application\Query\QueryInterface;
use Assert\Assertion;

class CommentsQuery implements QueryInterface
{
    public function __construct(public int $page = 1, public int $limit = 50)
    {
        Assertion::numeric($page, 'Page number must be an integer');
        Assertion::numeric($limit, 'Limit results must be an integer');
    }
}
