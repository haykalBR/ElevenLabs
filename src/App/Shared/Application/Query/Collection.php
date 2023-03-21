<?php

declare(strict_types=1);

namespace App\Shared\Application\Query;

use Doctrine\ORM\EntityNotFoundException;

class Collection
{
    /**
     *
     * @param integer $page
     * @param integer $limit
     * @param integer $total
     * @param array<mixed> $data
     */
    public function __construct(
        public readonly int $page,
        public readonly int $limit,
        public readonly int $total,
        public readonly array $data
    ) {
        $this->exists($page, $limit, $total);
    }


    private function exists(int $page, int $limit, int $total): void
    {
        if (($limit * ($page - 1)) >= $total) {
            throw new EntityNotFoundException();
        }
    }
}
