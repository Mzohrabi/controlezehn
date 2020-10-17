<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\LecturerDataTable;
use App\Http\Controllers\Controller;
use App\Lecturer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class LecturersController extends Controller
{
    public function index(LecturerDataTable $dataTable){
        $lecturers = Lecturer::all();
        return $dataTable->render('admin.lecturers.index', compact('lecturers'));
        //return view('admin.lecturers.index',compact('lecturers'));
    }

    public function create(){
        return view('admin.lecturers.create');
    }

    public function imagefile($id) {
        $info = Lecturer::findOrFail($id);
        $image = $info->getMedia('lecturer_image')->first();
        if($image != null){
            $response = Response::download($image->getPath(),$image->file_name);
            return $response;
        }else{
            return redirect()->back();
        }
    }
    public function store(Request $request){
        DB::beginTransaction();
        try{
            $lecturer = new Lecturer($request->except(['image','_token']));
            $lecturer->save();

            if($request->hasFile('image')){
                $lecturer->addMediaFromRequest('image')->toMediaCollection('lecturer_image','public_image');
            }
            DB::commit();
            flash('سخنران با موفقیت ثبت شد.')->success();
            return redirect(route('admin.lecturers.all'));
        }catch (\Exception $e){
            DB::rollBack();
            flash('خطایی هنگام ثبت اطلاعات رخ داده است.')->error();
            redirect()->back();
        }
    }
    //

    public function edit($id){
        $info = Lecturer::findOrFail($id);

        return view('admin.lecturers.edit', compact('info'));
    }

    public function update($id, Request $request){
        $lecturer = Lecturer::findOrFail($id);
        $lecturer->update($request->all());
        if($request->hasFile('image')){
            $lecturer->clearMediaCollection('lecturer_image');
            $lecturer->addMediaFromRequest('image')->toMediaCollection('lecturer_image','public_image');
        }
        flash('ویرایش کاربر با موفقیت انجام شد.')->success();
        return redirect(route('admin.lecturers.all'));
    }

    public function delete($id){
        $user = Lecturer::findOrFail($id);
        $user->delete();
        return back();
    }
}
