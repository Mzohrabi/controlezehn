<?php

namespace App\Http\Controllers;

use App\AudioBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AudiobookController extends Controller
{
    //
    public function all() {
        $audioBooks = AudioBook::with('product')->get();
        return response()->json(
            $audioBooks->toArray()
        );
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
}
