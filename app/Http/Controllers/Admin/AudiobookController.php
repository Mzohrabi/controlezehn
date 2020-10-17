<?php

namespace App\Http\Controllers\Admin;

use App\AudioBook;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;


class AudiobookController extends Controller
{
    public function index() {
        $audiobooks = AudioBook::all();
        return view('admin.products.audiobooks.index', compact('audiobooks'));
    }

    public function create() {
        return view('admin.products.audiobooks.create');
    }

    public function edit($id) {
        $info = AudioBook::findOrFail($id);
        return view('admin.products.audiobooks.edit', compact('info'));
    }

    public function soundfile($id) {
        $info = AudioBook::findOrFail($id);
        $image = $info->getMedia('sound_file')->first();
        if($image != null){
            $response = Response::download($image->getPath(),$image->file_name);
            return $response;
        }else{
            return redirect()->back();
        }
    }

    public function imagefile($id) {
        $info = AudioBook::findOrFail($id);
        $image = $info->getMedia('sound_pics')->first();
        if($image != null){
            $response = Response::download($image->getPath(),$image->file_name);
            return $response;
        }else{
            return redirect()->back();
        }
    }

    public function store(Request $request, AudioBook $audioBook, Product $product) {
        DB::beginTransaction();
        try{
            $audioBook->description = $request->description;
            if($request->hasFile('sound_pic')){
                $audioBook->addMediaFromRequest('sound_pic')->toMediaCollection('sound_pics');
            }
            if($request->hasFile('sound_file')){
                $audioBook->addMediaFromRequest('sound_file')->toMediaCollection('sound_file');
            }
            $audioBook->image_url = "";
            $audioBook->sound_url = "";
            $audioBook->save();

            $product->title = $request->title;
            $product->price = $request->price;
            $product->is_free = $request->is_free ?? 0;
            $product->description = $request->description;
            $product->rate = 0;
            $product->productable()->associate($audioBook);
            $product->save();
            DB::commit();
            flash('کتاب صوتی با موفقیت ثبت شد.')->success();
            return redirect(route('admin.products.audiobooks'));
        }catch (\Exception $e){
            //die($e->getMessage());
            DB::rollBack();
            flash('خطایی هنگام ثبت اطلاعات رخ داده است.')->error();
            return redirect()->back()->withInput($request->all());
        }
    }

    public function update($id, Request $request, AudioBook $audioBook) {
        $info = AudioBook::findOrFail($id);
        DB::beginTransaction();
        try{
            $info->description = $request->description;
            if($request->hasFile('sound_pic')){
                $info->clearMediaCollection('sound_pics');
                $info->addMediaFromRequest('sound_pic')->toMediaCollection('sound_pics');
            }
            if($request->hasFile('sound_file')){
                $info->clearMediaCollection('sound_file');
                $info->addMediaFromRequest('sound_file')->toMediaCollection('sound_file');
            }
            $info->image_url = "";
            $info->sound_url = "";
            $info->save();

            $info->product->title = $request->title;
            $info->product->price = $request->price;
            $info->product->is_free = $request->is_free ?? 0;
            $info->product->description = $request->description;
            $info->product->save();
            DB::commit();
            flash('ویرایش فایل صوتی با موفقیت انجام شد.')->success();
            return redirect(route('admin.products.audiobooks'));
        }catch (\Exception $e){
            //die($e->getMessage());
            DB::rollBack();
            flash('خطایی هنگام ثبت اطلاعات رخ داده است.')->error();
            return redirect()->back()->withInput($request->all());
        }
    }

    public function delete($id){
        $user = AudioBook::findOrFail($id);
        $user->delete();
        return back();
    }
    //
}
