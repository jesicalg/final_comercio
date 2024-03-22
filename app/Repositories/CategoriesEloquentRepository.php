<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoriesRepository;
use Illuminate\Contracts\Database\Query\Builder;

class CategoriesEloquentRepository implements CategoriesRepository
{
    private Builder $repo;

    public function __construct()
    {
        $this->repo = Category::query();
    }

    public function getCategories()
    {
        return $this->repo->get();
    }
}
