<?php

namespace App\DataTables;

use App\Account;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AccountsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($query) {
                return '<a href="/accounts/'.$query->id.'" class="btn btn-xs btn-primary"><i class="fas fa-eye"></i> View</a>
                        <a href="/accounts/'.$query->id.'/disable" class="btn btn-xs btn-warning" id=""><i class="fas fa-ban"></i> Disable</a>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Account $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Account $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('accounts-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    // ->addColumn('action',function ($data){
                    //     return $this->getActionColumn($data);
                    // })
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            
            Column::make('id'),
            Column::make('name'),
            Column::make('number'),
            Column::make('status'),
            Column::make('created_at'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(120)
                  ->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Accounts_' . date('YmdHis');
    }

    // protected function getActionColumn($data): string
    // {
    //     // $showUrl = route('admin.brands.show', $data->id);
    //     // $editUrl = route('admin.brands.edit', $data->id);
    //     return "<a class='btn btn-warning' href='#'><i class='fas fa-edit'></i>Edit</a> 
    //             <a class='btn btn-danger' href='#'><i class='fas fa-trash'></i>Delete</a>";
    // }
    
}
