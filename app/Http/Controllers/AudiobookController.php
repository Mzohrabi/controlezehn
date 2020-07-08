<?php

namespace App\Http\Controllers;

use App\AudioBook;
use Illuminate\Http\Request;

class AudiobookController extends Controller
{
    //
    public function all() {
        $audioBooks = AudioBook::with('product')->get();
        return response()->json(
            $audioBooks->toArray()
        );
    }
}
