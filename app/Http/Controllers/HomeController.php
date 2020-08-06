<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    public function Logout(){
        Auth::logout();
        return redirect('http://localhost:8000/login');
    }
}
