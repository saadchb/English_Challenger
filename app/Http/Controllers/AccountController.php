<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(){
        return view('Auth.Account');
    }
    public function logined(){
        return redirect()->route('EnglishChallenger.index');
    }
}
