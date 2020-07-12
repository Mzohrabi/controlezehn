<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lecturer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LecturersController extends Controller
{
    public function index(){
        $lecturers = Lecturer::all();
        return view('admin.lecturers.index',compact('lecturers'));
    }

    public function create(){
        return view('admin.lecturers.create');
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
            return redirect(route('admin.users.all'));
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
        $user = User::findOrFail($id);
        $user->update($request->all());
        flash('ویرایش کاربر با موفقیت انجام شد.')->success();
        return redirect(route('admin.lecturers.all'));
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return back();
    }
}
