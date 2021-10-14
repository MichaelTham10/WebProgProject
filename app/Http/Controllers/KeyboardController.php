<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeyboardController extends Controller
{
    public function index(){
        
    }

    public function add(){
        return view('add-keyboard');
    }

    public function store(){
        return view('categories');
    }
}
