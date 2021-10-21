<?php

namespace App\Http\Controllers;

use App\Models\Keyboard;
use App\Models\KeyboardCategory;
use Illuminate\Http\Request;

class KeyboardController extends Controller
{
    public function index($id){
        $keyboards = Keyboard::where('category_id', $id)->paginate(8);

        return view('keyboard.keyboard', compact('keyboards'));
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

        $categories = KeyboardCategory::all();
        $this->validate($request, [
            'category' => 'required',
            'name' => 'required|min:5|unique:keyboards',
            'price' => 'required|integer|gt:0',
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

        return redirect()->route('welcome')->with( ['categories' => $categories], ['Success', 'Keyboard successfully inserted'] );
       
    }

    public function update($id){
        $keyboard = Keyboard::findOrFail($id);
        $categories = KeyboardCategory::all();
        
        return view('keyboard.update', compact('keyboard','categories'));
    }

    public function edit($id, Request $request){
        $keyboard = Keyboard::findOrFail($id);

        $this->validate($request, [
            'category' => 'required',
            'name' => 'required|min:5',
            'price' => 'required|integer|gt:0',
            'description' => 'required|min:20', 
        ]);

        if($request->file('image') != null){
            $image_path = $request->file('image')->store('keyboard','public');
        }
        else{
            $image_path = $keyboard->image;
        }

        Keyboard::findOrFail($id)->update([
            'category_id' => $request->category,
            'name' => $request->name,
            'price' => $request->price,
            'desc' => $request->description,

            'image' => $image_path
        ]);

        return redirect()->route('keyboards', [$keyboard->category_id])->with('Success', 'Keyboard successfully updated');
    }
    
    public function delete($id)
    {
        Keyboard::destroy($id);
        return back()->with('Success', 'Keyboard successfully deleted');
    }

    public function detail($id)
    {
        $keyboard = Keyboard::findOrFail($id);

        return view('keyboard.detail.detail', compact('keyboard'));
    }
}
