<?php

namespace App\Http\Controllers;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use App\Models\Content;

class AuthController extends Controller
{
    public function index() {
        return view('auth.register');
    }
    public function register() {
        return view('auth.login'); 
    }
    public function login(){
        $contents=Content::all();
        return view('auth.admin',compact('contents'));
    }
    public function admin(){
        //   
    }
}
