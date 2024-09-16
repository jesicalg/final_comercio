<?php

namespace App\Repositories\Contracts;

interface PostRepository
{
    public function getPostById(int $post_id);
    public function updatePostById(int $post_id,array $data);
    public function getPostsPaginate($perPage);
    public function delete(int $post_id);
    public function create(array $data);
}
