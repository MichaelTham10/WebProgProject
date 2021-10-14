<?php

namespace App\Http\Controllers;

use App\Models\Keyboard;
use App\Models\KeyboardCategory;
use Illuminate\Http\Request;

class KeyboardController extends Controller
{
    public function index(){
        
    }

    public function welcome(){
        $categories = KeyboardCategory::all();
        return view('welcome', compact('categories'));
    }

    public function add(){
        $categories = KeyboardCategory::all();
        return view('keyboard.add-keyboard', compact('categories'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'category' => 'required',
            'name' => 'required|min:5|unique:keyboards',
            'price' => 'required|max:30',
            'description' => 'required|min:20',
            'image' => 'required',
        ]);

        
        $image_path = $request->file('image')->store('keyboard','public');
        
        

        Keyboard::create([
            'category_id' => $request->category,
            'name' => $request->name,
            'price' => $request->price,
            'desc' => $request->description,
            'image' => $image_path
        ]);

        $categories = KeyboardCategory::all();
        return view('welcome', compact('categories'))->with('Success', 'Keyboard successfully inserted');
    }
}
