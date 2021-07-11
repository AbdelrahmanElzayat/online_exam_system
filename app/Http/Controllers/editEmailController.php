<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class editEmailController extends Controller
{
    public function edit()
    {
        return view('update');
    }
    
    public function update(Request $request)
    {
        User::findOrFail(auth()->user()->id)->update([
            'name'=>$request->name, 
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        return redirect(route('home'));
    }}
