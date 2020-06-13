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
    public function index()
    {
        $customer = new Customer;
        $list_customer = $customer->listCustomer();
        return view('customers.insert');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new Customer;
        $insert_customer = $customer->insertCustomer($request);

        // return redirect()->route('customers.list_customer');
        return back()->with('message-insert', 'Customer registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $customer = new Customer;
        $list_customer = $customer->listCustomer()->orderBy('id')->get();

        return view('customers.list', [
            'list_customer' => $list_customer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $customer = new Customer;
        $customer_info = $customer->listCustomer()->where('id', $request->id)->first();

        return view('customers.edit', [
            'customer_info' => $customer_info
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $customer = new Customer;
        $update_customer = $customer->updateCustomer($request);

        return back()->with('message-insert', 'Info updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $customer = new Customer;
        $delete_customer = $customer->deleteCustomer($request);

        return back()->with('message-delete', 'Customer deleted');
    }
}
