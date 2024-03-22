<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Contracts\PostRepository;
use Illuminate\Contracts\Database\Query\Builder;

class PostEloquentRepository implements PostRepository
{
    private Builder $builder;

    public function __construct()
    {
        $this->builder = Post::query();
    }

    public function getPostById($post_id)
    {
        return $this->builder->where('post_id','=', $post_id)->first();
    }

    public function updatePostById($post_id, $data)
    {
        $this->builder->where('post_id', '=', $post_id)
            ->update($data);
    }

    public function getPostsPaginate($perPage)
    {
        return $this->builder
            ->join('categories as c',
                'posts.category_id', '=', 'c.category_id')
            ->paginate($perPage);
    }

    public function delete($post_id)
    {
        $this->builder->where('post_id', '=', $post_id)->delete();
    }

    public function create($data)
    {
        Post::create($data);
    }
}
