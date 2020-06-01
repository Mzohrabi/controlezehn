<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AudiobookController extends Controller
{
    public function index() {
        return view('admin.products.audiobooks.index');
    }

    public function create() {
        return view('admin.products.audiobooks.create');
    }

    public function store() {
        die(json_encode($_POST));
    }
    //
}
