<?php

namespace App\Http\Controllers;

use App\Account;
use App\DataTables\AccountsDataTable;
use App\DataTables\AccountTransactionsDataTable;
use App\DataTables\Scopes\AccountDataTableScope;
use App\DataTables\Scopes\AccountTransactionScope;
use App\DataTables\TransactionsDataTable;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(AccountsDataTable $dataTable)
    {
        return $dataTable->addScope(new AccountDataTableScope)->render('account.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAccountRequest $request)
    {   
        //$this->authorize('create', Account::class);
        DB::beginTransaction();
        try {
            $user = Auth::user();
            $user->accounts()->create($request->all());
            DB::commit();
            return back()->with('success', 'Account Created!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('warning', 'Please Try Again Later!');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(AccountTransactionsDataTable $dataTable, Account $account)
    {
        $this->authorize('view', $account);
        return $dataTable->addScope(new AccountTransactionScope($account))->render('account.show', compact('account'));
        // return view('account.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        return view('account.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccountRequest $request, Account $account)
    {
        DB::beginTransaction();
        try {
            $account->update($request->all());
            DB::commit();
            return back()->withSuccess('Account Updated!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withWarning('warning', 'Account Update Failed!');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        
    }

    public function disable($id) {
        $account = Account::findOrFail($id);
        $account->toggleStatus();
        $account->save();
        dd($account);
    }
}
