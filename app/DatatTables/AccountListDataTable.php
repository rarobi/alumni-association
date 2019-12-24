<?php

namespace App\DataTables;

use App\Modules\Account\Models\Account;
use Carbon\Carbon;
use DB;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Utilities\Request;
use Illuminate\Support\Str;


class AccountListDataTable extends DataTable
{

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return datatables()
            ->eloquent($this->query())
//            ->addColumn('action', function ($data) {
//                if($data->is_archive == 1){
//                    return '-';
//                }
//
//                $actionBtn = '';
//                if (in_array($data->status, [0])) {
//                    $actionBtn .= "<a href='/tickets/edit/$data->id' class='btn btn-sm btn-info' title='Edit'><i class='fa fa-edit'></i></a> ";
//                    $actionBtn .= " <a href='/tickets/discard/$data->id' class='btn btn-sm btn-danger discard-ticket' title='Discard'><i class='fa fa-trash'></i></a>";
//                } elseif (in_array($data->status, [1, 3])) {
//                    $actionBtn .= " <a href='/tickets/re-open/$data->id' class='btn btn-sm btn-warning re-open-ticket' title='Reopen ticket'><i class='fa fa-recycle'></i></a>";
//                } else {
//                    return '-';
//                }
//                return $actionBtn;
//                return '-';
//            })
            ->addColumn('purpose',function($data){
                if($data->transaction_type == 'income'){
                    return $data->income_purpose;
                }elseif($data->transaction_type == 'expense'){
                    return $data->expense_purpose;
                }
                return '-';
            })
            ->addColumn('income',function($data){
                if($data->transaction_type == 'income'){
                    return "<label class='badge badge-success'> $data->amount </label>";
                }
                return '-';
            })
            ->addColumn('expense',function($data){
                if($data->transaction_type == 'expense'){
                    return "<label class='badge badge-danger'> $data->amount </label>";
                }
                return '-';
            })

            ->addColumn('transaction_date',function($data){
                return Carbon::parse($data->transaction_date)->format('F d, y');
            })

            ->rawColumns(['income','expense','action'])
//            ->removeColumn('id')
            ->make(true);

    }

    /**
     * Get query source of dataTable.
     * @return \Illuminate\Database\Eloquent\Builder
     * @internal param \App\Models\AgentBalanceTransactionHistory $model
     */
    public function query()
    {
        $param = $this->list_type;
        $account = Account::paramBasedList($param);
        $account->select([
            'accounts.id',
            'accounts.transaction_date',
            'accounts.transaction_type',
            'accounts.ref_id',
            'accounts.amount',
            'income.purpose as income_purpose',
            'expense.purpose as expense_purpose'
        ]);
        return $this->applyScopes($account);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
//            ->addAction(['width' => '160px'])
//            ->minifiedAjax('', null, request()->only(['from', 'to', 'team', 'user', 'category', 'status']))
            ->parameters([
                'dom'         => 'Blfrtip',
                'responsive'  => true,
                'autoWidth'   => false,
                'paging'      => true,
                "pagingType"  => "full_numbers",
                'searching'   => true,
                'info'        => true,
                'searchDelay' => 350,
                "serverSide"  => true,
                'order'       => [[1, 'asc']],
                'buttons'     => ['excel','csv', 'print', 'reset', 'reload'],
                'pageLength'  => 10,
                'lengthMenu'  => [[10, 20, 25, 50, 100, 500, -1], [10, 20, 25, 50, 100, 500, 'All']],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'transaction_date'            => ['data' => 'transaction_date', 'name' => 'transaction_date', 'orderable' => true, 'searchable' => true],
            'purpose'                     => ['data' => 'purpose', 'name' => 'purpose', 'orderable' => true, 'searchable' => true],
            'income'                      => ['data' => 'income', 'name' => 'income', 'orderable' => true, 'searchable' => true],
            'expense'                     => ['data' => 'expense', 'name' => 'expense', 'orderable' => true, 'searchable' => true],
//            'tracking_no'               => ['data' => 'tracking_no', 'name' => 'tracking_no', 'orderable' => true, 'searchable' => true],
//            'status'                    => ['data' => 'status', 'name' => 'status', 'orderable' => true, 'searchable' => true],
//            'category'                  => ['data' => 'category_name', 'name' => 'tc.name', 'orderable' => true, 'searchable' => true],
//            'priority'                  => ['data' => 'priority_name', 'name' => 'tp.name', 'orderable' => true, 'searchable' => true],
//            'team'                      => ['data' => 'team_name', 'name' => 't.name', 'orderable' => true, 'searchable' => true],
//            'last_updated'              => ['data' => 'updated_at', 'name' => 'updated_at', 'orderable' => true, 'searchable' => true],
//            'action'                    => ['searchable' => false]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'account_list_' . date('Y_m_d_H_i_s');
    }
}
