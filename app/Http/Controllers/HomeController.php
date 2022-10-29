<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $month = date('m');
        $day = date('d');
        $tbta = date('Y-m-d');

        $visitor_thisMonth = DB::select("SELECT *  FROM visitors WHERE MONTH(created_at) =$month");
        $visitor_today = DB::select("SELECT *  FROM visitors WHERE DAY(created_at) =$day");
        $visitor_countMonth = count($visitor_thisMonth);
        $visitor_countToday = count($visitor_today);

        $tanggalPerminggu = $this->rangeWeek($tbta);
        // var_dump($tbta);
        // dd($tanggalPerminggu);

        return view('home', compact('visitor_countMonth', 'visitor_countToday'));
    }

    function rangeWeek($datestr)
    {
        date_default_timezone_set(date_default_timezone_get());
        $dt = strtotime($datestr);
        return array(
            "start" => date('N', $dt) == 1 ? date('Y-m-d', $dt) : date('Y-m-d', strtotime('last monday', $dt)),
            "end" => date('N', $dt) == 7 ? date('Y-m-d', $dt) : date('Y-m-d', strtotime('next sunday', $dt))
        );
    }
}