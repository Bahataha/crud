<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function home()
    {
        if (Auth::user()->type == 'user') { return redirect('/'); }

        if (Auth::user()->type == 'admin') {
            return redirect('admin/dashboard');
        }
    }

    public function index(){
        return view('admin/dashboard');
    }
    public function settings(){
        return view('admin/settings');
    }
    public function timezone(Request $request){
        $requestData = $request->all();

        $file = file_get_contents(app_path('Providers/AppServiceProvider.php'));
        $length = strpos($file, ' //datetime') - 474;
        $dd = substr_replace($file, 'date_default_timezone_set("'. $requestData['time'] .'");', 474, $length);
        file_put_contents(app_path('Providers/AppServiceProvider.php'), $dd);
        return redirect()->back()->with('flash_message', 'Время обновлено');
    }
}
