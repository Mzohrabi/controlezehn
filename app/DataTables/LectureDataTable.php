<?php


namespace App\DataTables;
use App\Lecture;
use App\User;
use Carbon\Carbon;
use Morilog\Jalali\Jalalian;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;

class LectureDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('jalali_date', function(Lecture $lecture){
                return $lecture->jalali_date;
            })
            ->addColumn('action', function(Lecture $lecture) {
                return '<a href="'.route('admin.products.lectures.edit',$lecture->id).'" class="btn btn-sm btn-success">ویرایش</a>
                                            <a href="#" class="btn btn-sm btn-danger delete-record" data-delete-url="'.route('admin.products.lectures.delete',$lecture->id) .'"
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

    public function query(Lecture $model)
    {
        return $model->query()->leftJoin('products',function($join){
            $join->on('products.productable_id','=','lectures.id');
            $join->where('products.productable_type','=',Lecture::class);
        })->with(['lecturer'])->select(['lectures.*','products.price','products.title','products.rate']);
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('lectures-table')
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
            Column::make('title','title')->title( 'عنوان'),
            Column::make('lecturer.name','lecturer.name')->title( 'سخنران'),
            Column::make('price','price')->title( 'قیمت'),
            Column::make('rate','rate')->title('امتیاز'),
            Column::make('jalali_date','jalali_date')->title('تاریخ ثبت'),
            Column::make('action','action')->title('عملیات')->orderable(false)->searchable(false),
        ];
    }

    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}
