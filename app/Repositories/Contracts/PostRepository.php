<?php

namespace App\Repositories\Contracts;

interface PostRepository
{
    public function getPostById($post_id);
    public function updatePostById($post_id, $data);
    public function getPostsPaginate($perPage);
    public function delete($post_id);
    public function create($data);
}
