<?php

namespace App\Http\Controllers;

use App\Models\MotherMedical;
use App\Models\Patient;
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
        $start = date('Y-m-d');
        $end = date('Y-m-d', strtotime($start . '+ 7 days'));

        $active_an_mother = Patient::count();
        $an_high_risk = DB::table('patients as p')->join('mother_visits as v', 'p.id', '=', 'v.patient_id')->whereIn('v.high_risk', [1, 2, 3, 4, 5, 6, 7, 8])->groupBy('p.id')->count();

        $an_risk_and_edd = DB::table('patients as p')->join('mother_visits as v', 'p.id', '=', 'v.patient_id')->join('mother_medicals as m', 'p.id', '=', 'm.patient_id')->whereBetween('m.edd_date', [$start, $end])->whereIn('v.high_risk', [1, 2, 3, 4, 5, 6, 7, 8])->groupBy('p.id')->count();

        $edd = MotherMedical::whereBetween('edd_date', [$start, $end])->count();

        return view('home', compact('page_title', 'page_description', 'action', 'active_an_mother', 'an_high_risk', 'edd', 'an_risk_and_edd'));
    }
}
