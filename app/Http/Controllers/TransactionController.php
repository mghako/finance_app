<?php

namespace App\Http\Controllers;

use App\Account;
use App\DataTables\TransactionsDataTable;
use App\Http\Requests\StoreTransactionRequest;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index(TransactionsDataTable $dataTable)
    {  
        return $dataTable->render('transaction.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = auth()->user()->accounts()->select(['name', 'id'])->get();
        return view('transaction.create', compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {

        DB::beginTransaction();
        try {
            Transaction::create([
                'account_id' => $request->account,
                'amount' => $request->amount,
                'description' => $request->description,
                'user_id' => auth()->user()->id
            ]);

            $account = auth()->user()->accounts->find($request->account);
            $account->balance = $account->balance - $request->amount; // reduct the used amount from account
            $account->push();

            DB::commit();

            return back()->withSuccess('Transaction Stored!');

        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withWarning('Transaction Failed!');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
