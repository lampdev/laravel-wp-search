<?php

namespace App\Http\Controllers;

use App\Services\Post\PostService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * @var PostService
     */
    private $postService;

    /**
     * PostService constructor.
     * @param PostService $postService
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * @param string $vertical
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getSearch(string $vertical, Request $request)
    {
        return $this->postService->searchByVertical($vertical, $request->get('query'));
    }
}
