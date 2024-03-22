<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Collection;

class ProductEloquentRepository implements ProductRepository
{
    private Builder $builder;

    public function __construct()
    {
        $this->builder = Product::query();
    }

    /**
     * @return Collection
     */
    public function get(): Collection
    {
        return $this->builder->get();
    }

    public function paginate(int $perPage): LengthAwarePaginator
    {
        return $this->builder->paginate($perPage)->withQueryString();
    }
}
