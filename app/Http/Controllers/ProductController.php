<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Customer;
use App\Models\Movie;
use App\Repositories\Contracts\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ProductRepository $repo;

    public function __construct(ProductRepository $repo)
    {
        $this->repo = $repo;
    }

    public function showcase()
    {
        $products = $this->repo->get();

        return view('product.showcase', [
            'products' => $products,
        ]);
    }

    public function productWelcome()
    {
        return view('product.welcome');
    }



}
