<?php

namespace App\Http\Controllers\Admin;

use App\AudioBook;
use App\DataTables\LectureDataTable;
use App\Http\Controllers\Controller;
use App\Lecture;
use App\Lecturer;
use App\Product;
use App\Utilities\FormUtilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class LectureController extends Controller
{
    public function index(LectureDataTable $dataTable) {
        $lectures = Lecture::all();
        return $dataTable->render('admin.products.lectures.index', compact('lectures'));
    }

    public function create() {
        $lecturers = Lecturer::all();
        $lecturer_array = FormUtilities::createSelectArray($lecturers, 'id', 'name');
        return view('admin.products.lectures.create', compact('lecturer_array'));
    }

    public function edit($id) {
        $info = Lecture::findOrFail($id);
        $lecturers = Lecturer::all();
        $lecturer_array = FormUtilities::createSelectArray($lecturers, 'id', 'name');
        return view('admin.products.lectures.edit', compact('info','lecturer_array'));
    }

    public function lecturefile($id) {
        $info = Lecture::findOrFail($id);
        $image = $info->getMedia('lecture_file')->first();
        if($image != null){
            $response = Response::download($image->getPath(),$image->file_name);
            return $response;
        }else{
            return redirect()->back();
        }
    }

    public function imagefile($id) {
        $info = Lecture::findOrFail($id);
        $image = $info->getMedia('lecture_pics')->first();
        if($image != null){
            $response = Response::download($image->getPath(),$image->file_name);
            return $response;
        }else{
            return redirect()->back();
        }
    }

    public function store(Request $request, Lecture $lecture, Product $product) {
        DB::beginTransaction();
        try{
            if($request->hasFile('lecture_pic')){
                $lecture->addMediaFromRequest('lecture_pic')->toMediaCollection('lecture_pics');
            }
            if($request->hasFile('lecture_file')){
                $lecture->addMediaFromRequest('lecture_file')->toMediaCollection('lecture_file');
            }
            $lecture->description = $request->description;
            $lecture->brief_description = $request->description;
            $lecture->lecturer_id = $request->lecturer_id;
            $lecture->save();

            $product->title = $request->title;
            $product->price = $request->price;
            $product->is_free = $request->is_free ?? 0;
            $product->description = $request->description;
            $product->rate = 0;
            $product->productable()->associate($lecture);
            $product->save();
            DB::commit();
            flash('سخنرانی با موفقیت ثبت شد.')->success();
            return redirect(route('admin.products.lectures'));
        }catch (\Exception $e){
            die($e->getMessage());
            DB::rollBack();
            flash('خطایی هنگام ثبت اطلاعات رخ داده است.')->error();
            return redirect()->back()->withInput($request->all());
        }
    }

    public function update($id, Request $request) {
        $info = Lecture::findOrFail($id);
        DB::beginTransaction();
        try{
            $info->description = $request->description;
            if($request->hasFile('lecture_pic')){
                $info->clearMediaCollection('lecture_pics');
                $info->addMediaFromRequest('lecture_pic')->toMediaCollection('lecture_pics');
            }
            if($request->hasFile('lecture_file')){
                $info->clearMediaCollection('lecture_file');
                $info->addMediaFromRequest('lecture_file')->toMediaCollection('lecture_file');
            }
            $info->description = $request->description;
            $info->brief_description = $request->description;
            $info->lecturer_id = $request->lecturer_id;
            $info->save();

            $info->product->title = $request->title;
            $info->product->price = $request->price;
            $info->product->is_free = $request->is_free ?? 0;
            $info->product->description = $request->description;
            $info->product->save();
            DB::commit();
            flash('ویرایش سخنرانی با موفقیت انجام شد.')->success();
            return redirect(route('admin.products.lectures'));
        }catch (\Exception $e){
            die($e->getMessage());
            DB::rollBack();
            flash('خطایی هنگام ثبت اطلاعات رخ داده است.')->error();
            return redirect()->back()->withInput($request->all());
        }
    }

    public function delete($id){
        $user = Lecture::findOrFail($id);
        $user->delete();
        return back();
    }
}
