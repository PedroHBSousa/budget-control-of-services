<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Models\Address;
use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = Customer::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(3);
        return Inertia::render('Customer/Index', ['customers' => $customers]);
    }

    public function create()
    {
        return Inertia::render('Customer/Create');
    }

    public function store(StoreCustomerRequest $request): RedirectResponse
    {
        $address = Address::create([
            'street' => $request->street,
            'number' => $request->number,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
        ]);

        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_id' => Auth::user()->id,
            'addresses_id' => $address->id,
        ]);

        return redirect()->route('customers.index')->with('message', 'Cliente cadastrado com sucesso!' );
    }

    public function show(Customer $customer)
    {
        $customer->load('address');
        return Inertia::render('Customer/Show', ['customer' => $customer]);
    }

    public function edit(Customer $customer)
    {
        $customer->load('address');
        return Inertia::render('Customer/Edit', ['customer' => $customer]);
    }

    public function update(UpdateCustomerRequest $request, Customer $customer): RedirectResponse
    {
        $customer->update($request->only(['name', 'email', 'phone']));
        $customer->address()->update($request->only(['street', 'number', 'city', 'state', 'zip']));
        return redirect()->route('customers.index');
    }

    public function destroy(Customer $customer): RedirectResponse
    {
        $customer->address()->delete();
        $customer->delete();
        return redirect()->route('customers.index');
    }
}
