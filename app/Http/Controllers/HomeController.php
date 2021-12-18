<?php

namespace App\Http\Controllers;

use App\Models\KeyboardCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        $categories = KeyboardCategory::simplePaginate(3);
        return view('welcome', compact('categories'));
    }
}
