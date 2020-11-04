<?php

namespace App\Repositories\Post;

use Corcel\Model\Post;
use App\Repositories\AbstractInterface;

/**
 * Interface PostInterface.
 */
interface PostInterface extends AbstractInterface
{
    /**
     * Get Posts by query search strings and vertical
     *
     * @param string $verticals
     * @param string $query
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function searchByVertical(string $vertical, string $query);
}
