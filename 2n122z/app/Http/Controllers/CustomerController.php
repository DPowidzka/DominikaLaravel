<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    $query = $request->input('search');

    if ($query) {

        $customers = Customer::where('name', 'like', "%$query%")
                             ->orWhere('email', 'like', "%$query%")
                             ->paginate(10);
    } else {

        $customers = Customer::paginate(10);
    }

    return view('customers.index', compact('customers', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'vat' => 'nullable|string|max:20',
        'email' => 'required|email|unique:customers,email',
        'phone' => 'required|string|max:20',
        'street' => 'required|string|max:255',
        'building_number' => 'required|string|max:10',
        'flat_number' => 'nullable|string|max:10',
        'postcode' => 'required|string|max:10',
        'city' => 'required|string|max:100',
    ]);

    Customer::create($validatedData);

    return redirect()->route('customers.index')->with('success', 'Klient dodany pomyślnie');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {

        return view('customers.view',[
            'customer' => $customer
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit',[
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'vat' => 'nullable|string|max:20',
        'email' => 'required|email|unique:customers,email,' . $customer->id,
        'phone' => 'required|string|max:20',
        'street' => 'required|string|max:255',
        'building_number' => 'required|string|max:10',
        'flat_number' => 'nullable|string|max:10',
        'postcode' => 'required|string|max:10',
        'city' => 'required|string|max:100',
    ]);

    $customer->update($validatedData);

    return redirect()->route('customers.index')->with('success', 'Zmiany dokonane pomyślnie!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect(route('customers.index'));
    }

}
