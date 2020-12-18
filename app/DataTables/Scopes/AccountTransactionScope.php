<?php

namespace App\DataTables\Scopes;

use Yajra\DataTables\Contracts\DataTableScope;

class AccountTransactionScope implements DataTableScope
{
    protected $account;

    public function __construct($company)
    {
        $this->company = $company;
    }
    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        return $query->where('account_id', $this->company->id);
    }
}
