<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\CustomerRepository;
use App\Models\Customer;

class CustomerController extends Controller
{
    private CustomerRepository $customerRepo;

    public function __construct(CustomerRepository $customerRepo)
    {
        $this->customerRepo = $customerRepo;
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

    public function customerList()
    {
        try {
            $customers = $this->customerRepo->getCustomers();

            if($customers == null)
            {
                return redirect()
                    ->route('admin.customers-view')
                    ->with('feedback.message', 'No hay clientes aun.');
            }

            return view('admin.customers-view', [
                'customers' => $customers,
            ]);
        }
        catch (\Exception $e){
            return redirect()
                ->route('admin.customers-view')
                ->with('feedback.message', 'Ocuirrio un error al cargar los clientes.');
        }
    }
}
