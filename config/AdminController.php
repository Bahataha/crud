<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function home()
    {
        if (Auth::user()->type == 'user') { return view('welcome'); }
        if (Auth::user()->type == 'admin') { return redirect('admin/dashboard'); }
    }

    public function index(){
        return view('admin/dashboard');
    }
}
