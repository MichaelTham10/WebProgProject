<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeyboardCategoryController extends Controller
{
    public function index(){
        return view('categories');
    }
}
