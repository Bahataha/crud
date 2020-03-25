<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use DateInterval;
use DatePeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Check;

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
        $first = Check::oldest()->first()->created_at;
        $last = Check::latest()->first()->created_at;
        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($first, $interval ,$last);
        $counts = '[';
        $dates = '[';
        $counts1 = '[0, ';
        $dates1 = '[0, ';
        $count = 0;
        foreach ($daterange as $date) {
            $counts .= Check::whereBetween('created_at', [$date->format('Y-m-d').' 00:00:00', $date->format('Y-m-d').' 23:59:59'])->count();
            $dates .= "'" . $date->format('d.m') . "'";
            $count += Check::whereBetween('created_at', [$date->format('Y-m-d').' 00:00:00', $date->format('Y-m-d').' 23:59:59'])->count();
            $counts1 .= $count;
            $dates1 .= "'" . $date->format('d.m') . "'";
            if(!($date->format('Y-m-d') == $last->format('Y-m-d'))){
                $counts .= ', ';
                $dates .= ', ';
                $counts1 .= ', ';
                $dates1 .= ', ';
            }
        }
        $counts .= ']';
        $dates .= ']';
        $counts1 .= ']';
        $dates1 .= ']';
        // users

        $counts_user = '[';
        $dates_user = '[';
        $counts1_user = '[0,';
        $dates1_user = '[0, ';
        $count = 0;
        $first_user = User::oldest()->first()->created_at;
        $last_user = User::latest()->first()->created_at;
        $daterange_user = new DatePeriod($first_user, $interval ,$last_user);
        foreach ($daterange_user as $date) {
            $counts_user .= User::whereBetween('created_at', [$date->format('Y-m-d').' 00:00:00', $date->format('Y-m-d').' 23:59:59'])->count();
            $dates_user .= "'" . $date->format('d.m') . "'";
            $count += User::whereBetween('created_at', [$date->format('Y-m-d').' 00:00:00', $date->format('Y-m-d').' 23:59:59'])->count();
            $counts1_user .= $count;
            $dates1_user .= "'" . $date->format('d.m') . "'";
            if(!($date->format('Y-m-d') == $last_user->format('Y-m-d'))){
                $counts_user .= ', ';
                $dates_user .= ', ';
                $counts1_user .= ', ';
                $dates1_user .= ', ';
            }
        }
        $counts_user .= ']';
        $dates_user .= ']';
        $counts1_user .= ']';
        $dates1_user .= ']';
        return view('admin/dashboard', compact('counts', 'dates', 'counts1', 'dates1', 'counts_user', 'dates_user', 'counts1_user', 'dates1_user'));
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
    public function date(Request $request){

        $file = file_get_contents(app_path('Http/Middleware/Date.php'));
        $length = strpos($file, ' // datetime') - 344;
        $dd = substr_replace($file, 'if($myTime > "'. $request->time .' 00:00:00") { ', 344, $length);
        file_put_contents(app_path('Http/Middleware/Date.php    '), $dd);
        return redirect()->back()->with('flash_message', 'Время обновлено');
    }
}
