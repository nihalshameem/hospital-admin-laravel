<?php

namespace App\Http\Controllers;

use App\Models\MotherMedical;
use App\Models\Patient;
use App\Models\HighRisk;
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
        $an_high_risk = count(DB::table('patients as p')->join('mother_visits as v', 'p.id', '=', 'v.patient_id')->join('h_s_c_s as hsc', 'hsc.id', '=', 'p.hsc_id')->whereIn('v.high_risk', [1, 2, 3, 4, 5, 6, 7, 8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29])->select('p.id')->groupBy('p.id')->get());

        $an_risk_and_edd = count(DB::table('patients as p')->join('mother_visits as v', 'p.id', '=', 'v.patient_id')->join('mother_medicals as m', 'p.id', '=', 'm.patient_id')->whereBetween('m.edd_date', [$start, $end])->whereIn('v.high_risk', [1, 2, 3, 4, 5, 6, 7, 8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29])->groupBy('p.id')->select('p.id')->get());

        $edd = MotherMedical::whereBetween('edd_date', [$start, $end])->count();

        return view('home', compact('page_title', 'page_description', 'action', 'active_an_mother', 'an_high_risk', 'edd', 'an_risk_and_edd'));
    }
}
