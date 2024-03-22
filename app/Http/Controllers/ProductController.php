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

    public function processContract(Request $request)
    {
        //TODO Pasar al Repo
        $request->validate(Customer::validationRules(), Customer::validationMessages());

        $params = $request->only(['product_id', 'user_id']);

        $customer = Customer::where('user_id','=', $params['user_id'])->first();

        if($customer != null)
        {
            Customer::where('user_id','=', $params['user_id'])
                ->update(['contracted_end_date'=>now()]);
        }

        Customer::create($params);

        return redirect()
            ->route('product.welcome')
            ->with('feedback.message', 'Bienvenido a la familia!');
    }

}
