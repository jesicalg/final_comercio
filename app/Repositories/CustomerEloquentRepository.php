<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Models\User;
use App\Repositories\Contracts\CustomerRepository;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Collection;
use DB;

class CustomerEloquentRepository implements CustomerRepository
{
    private Builder $builder;

    public function __construct()
    {
        $this->builder = Customer::query();
    }

    public function create(array $data): void
    {
        DB::transaction(function() use ($data) {
            $customer = Customer::create($data);
        });
    }

    public function getCustomers()
    {
        return User
            ::join('customers as c','users.user_id', '=', 'c.user_id')
            ->join('products as p', 'c.product_id', '=', 'p.product_id')
            ->where('contracted_end_date', '=', null)
            ->get();
    }
}
