<?php


namespace App\DataTables;
use App\Lecture;
use App\Lecturer;
use App\User;
use Carbon\Carbon;
use Morilog\Jalali\Jalalian;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;

class LecturerDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('jalali_date', function(Lecturer $lecture){
                return $lecture->jalali_date;
            })
            ->addColumn('action', function(Lecturer $lecture) {
                return '<a href="'.route('admin.lecturers.edit',$lecture->id).'" class="btn btn-sm btn-success">ویرایش</a>
                                            <a href="#" class="btn btn-sm btn-danger delete-record" data-delete-url="'.route('admin.lecturers.delete',$lecture->id) .'"
                                               data-record-id="'.$lecture->id.'">حذف</a>';
            })
            ->filterColumn('persian_date',function($query, $keyword) {
                $query->whereRaw("PDATE(created_at) like ?", ["%$keyword%"]);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function query(Lecturer $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('lecturers-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons("create")
            ->language (asset('gentella/src/js/Persian.json'))
            ->parameters([
                'buttons' => [],
                'dom' => "
                        <'row'
                        <'col-sm-12 col-md-6'f>
                        <'col-sm-12 col-md-6 text-left'l>
                        >
                        <'row'
                        <'col-sm-12'tr>
                        >
                        <'row'
                        <'col-sm-12 col-md-5'i>
                        <'col-sm-12 col-md-7'p>
                        >",
            ])
        //                          <'row'
            //                        <'col-sm-12'
            //                        <'text-center bg-body-light py-2 mb-2'B>
            //                        >
            //                        >
            ;
    }

    protected function getColumns()
    {
        return [
            Column::make('DT_RowIndex','DT_RowIndex')->title('ردیف')->className('text-center')->width(100)->orderable(false)->searchable(false),
            Column::make('id','id')->title('ID')->className('text-center')->width(100),
            Column::make('name','name')->title( 'نام'),
            Column::make('jalali_date','jalali_date')->title('تاریخ ثبت'),
            Column::make('action','action')->title('عملیات')->orderable(false)->searchable(false),
        ];
    }

    protected function filename()
    {
        return 'Lecturer_' . date('YmdHis');
    }
}
