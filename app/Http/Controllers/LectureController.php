<?php

namespace App\Http\Controllers;

use App\AudioBook;
use App\Lecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LectureController extends Controller
{
    //
    public function all() {
        $lectures = Lecture::with('product','lecturer')->get();
        return response()->json(
            $lectures->toArray()
        );
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
}
