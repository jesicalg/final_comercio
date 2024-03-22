<?php

namespace App\Repositories\Contracts;

use App\SearchParams\CustomerSearchParams;

interface CustomerRepository
{
    public function create(array $data);
    public function getCustomers();
}
