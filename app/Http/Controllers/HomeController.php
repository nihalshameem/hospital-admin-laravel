<?php

namespace App\Http\Controllers;

use App\Models\MotherMedical;
use App\Models\Patient;
use Carbon\Carbon;
use DB;

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
    public function dashboard_1()
    {
        $page_title = 'Dashboard';
        $page_description = 'Welcome to Thai Care Kallai - District Dashboard';
        $action = __FUNCTION__;
        $start = Carbon::now();
        $end = $start->addDays(7);

        $active_an_mother = Patient::count();
        $an_high_risk = DB::table('patients as p')->join('mother_visits as v', 'p.id', '=', 'v.patient_id')->groupBy('p.id')->count();
        // $edd = DB::table('patients as p')->join('mother_medicals as m', 'p.id', '=', 'm.patient_id')->whereBetween('DATE_FORMAT(m.edd_date, "%Y-%m-%d")', [$start->format('Y-m-d'), $end->format('Y-m-d')])->groupBy('p.id')->count();
        $edd = MotherMedical::whereBetween('edd_date', [$start->format('Y-m-d'), $end->format('Y-m-d')])->where('edd_date', '<=', $end->format('Y-m-d'))->count();

        return view('home', compact('page_title', 'page_description', 'action', 'active_an_mother', 'an_high_risk', 'edd'));
    }
}
