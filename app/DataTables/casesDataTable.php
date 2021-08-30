<?php

namespace App\DataTables;

use App\Models\Cases;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class casesDataTable extends DataTable
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
            ->addColumn('action', 'cases.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\cases $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Cases $model)
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
                    ->setTableId('cases-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    ;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'suspect_name',
            'case_judge',
            'courtroom',
            'time',
            'activity',
            'outcome',
            'type',
            'photo',
            'case_description',
            'case_notes',
            'date',
            'plea',
            'hearing_time',
            'hearing_date',
            'hearing_courtroom',          
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'cases_' . date('YmdHis');
    }
}
