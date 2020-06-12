<?php

namespace App\DataTables;

use App\Models\FillingDocument;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Auth;
class FillingDocumentDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'filling_documents.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\FillingDocument $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(FillingDocument $model)
    {
           if(Auth::check() && Auth::user()->type=='Enterprise'){ 
            $enterprise= \App\Models\LoanApplication::where('user_id',Auth::id())->orderBy('id','DESC')->first();
            return $model->where('enterprise_id',$enterprise->id)->orderBy('id','DESC');
    
           }else if(Auth::check() && Auth::user()->type=='MicroFoundManager'){ 
            $microFundApplication = \App\Models\MicroFundApplication::where('user_id',\Auth::id())->orderBy('id','DESC')->first();
            return $model->where('microfund_manager_id',$microFundApplication->id);
           
        }else if(Auth::check() && Auth::user()->type=='Admin'){ 
            return $model->newQuery();
        }
        
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
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
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
            'name',
            
            'filling_category',
            'country',
            'published'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return '$MODEL_NAME_PLURAL_SNAKE_$datatable_' . time();
    }
}
