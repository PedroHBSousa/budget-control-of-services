<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Address;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CostumerController extends Controller
{
    public function index()
    {
        return Inertia::render('Customer/Index');
    }
    public function create()
    {
        return Inertia::render('Customer/Create');
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'street' => 'required',
            'number' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
        ]);

        $address = Address::create([
            'street' => $request->street,
            'number' => $request->number,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
        ]);

        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'addresses_id' => $address->id,
        ]);

        return redirect()->route('customers.index');
    }

}
