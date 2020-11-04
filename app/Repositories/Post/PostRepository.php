<?php

namespace App\Repositories\Post;

use Corcel\Model\Post;
use App\Repositories\AbstractRepository;

/**
 * Class PostRepository.
 */
class PostRepository extends AbstractRepository implements PostInterface
{
    /**
     * @var Post
     */
    protected $model;

    /**
     * PostRepository constructor.
     * @param Post $Post
     */
    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    /**
     * Get Posts by query search strings and vertical
     *
     * @param string $verticals
     * @param string $query
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function searchByVertical(string $vertical, string $query)
    {
        return $this->model
            ->published()
            ->type('post')
            ->taxonomy('verticals', $vertical)
            ->search($query)
            ->paginate(10);
    }
}
