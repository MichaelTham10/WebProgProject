<?php

namespace App\Http\Controllers;

use App\Models\KeyboardCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
 
    public function welcome()
    {
        $categories = KeyboardCategory::simplePaginate(3);
        return view('welcome', compact('categories'));
    }
}
