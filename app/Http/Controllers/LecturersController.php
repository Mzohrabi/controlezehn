<?php

namespace App\Http\Controllers;

use App\Lecturer;

class LecturersController extends Controller
{
    //
    public function all() {
        $audioBooks = Lecturer::all();
        return response()->json(
            $audioBooks->toArray()
        );
    }
}
