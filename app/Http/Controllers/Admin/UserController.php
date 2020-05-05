<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    public function create(){
        return view('admin.users.create');
    }

    public function store(Request $request){
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
        return view('admin.users.edit', compact('member'));
    }

    public function update($id, Request $request){
        $user = User::findOrFail($id);
        $user->update($request->all());
        flash('ویرایش کاربر با موفقیت انجام شد.')->success();
        return redirect(route('admin.users.all'));
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return back();
    }
}
