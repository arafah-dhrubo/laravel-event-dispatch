<?php

namespace App\Http\Controllers;

use App\Events\newUserEvent;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('index');
    }

    public function subscriber(Request $request){
        $request->validate([
            'email'=>'required|unique:newsletter'
        ]);
        event(new newUserEvent($request->email));
        return back();
    }
}
