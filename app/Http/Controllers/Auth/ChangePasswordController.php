<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index(){
        return view('auth.passwords.change_password');
    }

    public function update(Request $request){
       
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required',
            'password' => 'required'
        ]);

        if(!Hash::check($request->old_password,Auth::user()->password)){
            return back()->with('error', 'please input the right password');
        }

        if($request->new_password != $request->password){
            return back()->with('error', 'please input the right confirmation password');
        }

        
        Auth::user()->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->to('/')->with('Success', 'your password has been changed');

    }
}
