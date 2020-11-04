<?php

namespace App\Services\Post;

use App\Constants\PostVerticalsConstants;
use App\Repositories\Post\PostRepository;
use Exception;

/**
 * Class PostService.
 */
class PostService
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * PostService constructor.
     * @param PostRepository $PostRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
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
        // add some bussiness logic here, could be used to build api paginator

        return $this->postRepository->searchByVertical($vertical, $query);
    }
}
