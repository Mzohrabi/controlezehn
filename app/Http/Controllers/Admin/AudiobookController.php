<?php

namespace App\Http\Controllers\Admin;

use App\AudioBook;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AudiobookController extends Controller
{
    public function index() {
        $audiobooks = AudioBook::all();
        return view('admin.products.audiobooks.index', compact('audiobooks'));
    }

    public function create() {
        return view('admin.products.audiobooks.create');
    }

    public function store(Request $request, AudioBook $audioBook, Product $product) {


        DB::beginTransaction();
        try{
            $audioBook->description = $request->description;
            $audioBook->image_url = "test";
            $audioBook->sound_url = "test";
            $audioBook->save();

            $product->title = $request->title;
            $product->price = $request->price;
            $product->is_free = $request->is_free;
            $product->description = $request->description;
            $product->rate = 0;
            $product->productable()->associate($audioBook);
            $product->save();
            DB::commit();
            flash('کتاب صوتی با موفقیت ثبت شد.')->success();
            return redirect(route('admin.products.audiobooks'));
        }catch (\Exception $e){
            DB::rollBack();
            flash('خطایی هنگام ثبت اطلاعات رخ داده است.')->error();
            redirect()->back();
        }
    }
    //
}
