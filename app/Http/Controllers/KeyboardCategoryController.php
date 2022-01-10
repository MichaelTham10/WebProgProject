<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeyboardCategory;
use App\Models\Keyboard;

class KeyboardCategoryController extends Controller
{
    public function index(){
        $categories = KeyboardCategory::all();
        return view('keyboard.categories.categories', compact('categories'));
    }

    public function update($id){
        $category = KeyboardCategory::findOrFail($id);
        $categories = KeyboardCategory::all();
        return view('keyboard.categories.update', compact('category', 'categories'));
    }

    public function edit($id, Request $request){
        $category = KeyboardCategory::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|min:5',
        ]);

        if($request->file('image') != null){
            $image_path = $request->file('image')->store('keyboard','public');
        }
        else{
            $image_path = $category->image;
        }

        KeyboardCategory::findOrFail($id)->update([
            'name' => $request->name,
            'image' => $image_path
        ]);

        return redirect()->route('manage-category')->with('Success', 'Category successfully updated');
    }

    public function delete($id)
    {
        Keyboard::where('category_id', $id)->delete();
        KeyboardCategory::destroy($id);
        return back()->with('Success', 'Category successfully deleted');
    }
}
