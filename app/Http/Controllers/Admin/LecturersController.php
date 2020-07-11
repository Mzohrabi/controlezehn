<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lecturer;
use App\User;
use Illuminate\Http\Request;

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
        $lecturer = new Lecturer($request->except(['image','_token']));
        $lecturer->save();

        if($request->hasFile('image')){
            $lecturer->addMediaFromRequest('image')->toMediaCollection('lecturer_image');
        }


        die(json_encode($_FILES));
        $this->validate($request,
            [
                'fname' => 'required',
                'lname' => 'required',
                'mobile' => 'required|unique:users|digits_between:10,11',
            ]
        );

        $userData = [
            'fname' => $request->fname,
            'lname' => $request->lname,
            'mobile' => $request->mobile,
            'password' => bcrypt("test")
        ];

        DB::beginTransaction();
        try{
            $user = new User($userData);
            $user->save();
            DB::commit();
            flash('کاربر با موفقیت ثبت شد.')->success();
            return redirect(route('admin.users.all'));
        }catch (\Exception $e){
            DB::rollBack();
            flash('خطایی هنگام ثبت اطلاعات رخ داده است.')->error();
            redirect()->back();
        }
    }
    //

    public function edit($id){
        $member = User::findOrFail($id);
        return view('admin.lecturers.edit', compact('member'));
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
