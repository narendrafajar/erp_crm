<?php

namespace App\Http\Controllers;

use App\Models\TransactionModel;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(TransactionModel $transactionModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransactionModel $transactionModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransactionModel $transactionModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransactionModel $transactionModel)
    {
        //
    }

    public function process(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'amount' => 'required|numeric',
            'transaction_type' => 'required|string',
        ]);

        // Simpan transaksi ke database
        $transaction = Transaction::create($validatedData);

        // Kirim data ke ERP dan CRM
        $this->sendDataToERP($transaction);
        $this->sendDataToCRM($transaction);

        // Respons berhasil
        return response()->json(['message' => 'Transaction processed successfully.', 'transaction' => $transaction], 201);
    }

    private function sendDataToERP($transaction)
    {
        // Sample implementasi pengiriman data ke API ERP
        $client = new Client();
        $response = $client->post('http://erp-api-url.com/api/transactions', [
            'json' => $transaction,
        ]);
    }

    private function sendDataToCRM($transaction)
    {
        // Sample implementasi pengiriman data ke API CRM
        $client = new Client();
        $response = $client->post('http://crm-api-url.com/api/transactions', [
            'json' => $transaction,
        ]);
    }
}
