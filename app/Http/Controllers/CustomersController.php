<?php

namespace App\Http\Controllers;

use App\Models\CustomersModel;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function register(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'phone' => 'required|string|max:15',
        ]);

        // Simpan customer ke database
        $customer = CustomersModel::create($validatedData);

        // Kirim data customer ke CRM
        $this->sendDataToCRM($customer);

        // Respons berhasil
        return response()->json(['message' => 'Customer registered successfully.', 'customer' => $customer], 201);
    }

    private function sendDataToCRM($customer)
    {
        // Sample implementasi pengiriman data ke API CRM
        $client = new Client();
        $response = $client->post('http://crm-api-url.com/api/customers', [
            'json' => $customer,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomersModel $customersModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomersModel $customersModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomersModel $customersModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomersModel $customersModel)
    {
        //
    }
}
