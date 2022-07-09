<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DataTables;
use DB;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    // List of AN Mothers registered in PHC
    public function mother_phc(Request $request)
    {
        $page_title = 'Mother in PHC';
        $page_description = 'List of AN Mothers registered in PHC';

        $action = 'patient_list';

        if ($request->ajax()) {
            $data = DB::table('patients as p')->join('delivery_places as d', 'p.id', '=', 'd.patient_id')->join('hospital_types as ht', 'ht.id', '=', 'd.hospital_type_id')->join('h_s_c_s as hsc', 'hsc.id', '=', 'p.hsc_id')->select('p.id as id', 'hsc.name as hsc_name', 'p.rch_id', 'p.an_mother', 'p.husband_name', 'p.mobile', 'p.gravida', 'p.para', 'p.living_children', 'p.abortion', 'p.neonatal')->where('ht.name', 'phc')->groupBy('p.id')->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('view', function ($row) {
                    $view = '<a href="' . url('patient/mother-medical/' . $row->id) . '" ><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg></a>';
                    return $view;
                })
                ->editColumn('last_col', function ($row) {
                    if (!$row->gravida) {
                        $row->gravida = '0';
                    }
                    if (!$row->para) {
                        $row->para = '0';
                    }
                    if (!$row->living_children) {
                        $row->living_children = '0';
                    }
                    if (!$row->abortion) {
                        $row->abortion = '0';
                    }
                    if (!$row->neonatal) {
                        $row->neonatal = '0';
                    }
                    return $row->gravida . '/' . $row->para . '/' . $row->living_children . '/' . $row->abortion . '/' . $row->neonatal . '/';
                })
                ->rawColumns(['last_col', 'view'])
                ->make(true);
        }

        return view('modules.reports.mother_phc', compact('page_title', 'page_description', 'action'));
    }
    // List of High risk Mothers registered in PHC
    public function high_risk_phc(Request $request)
    {
        $page_title = 'High risk in PHC';
        $page_description = 'List of High risk Mothers registered in PHC
';

        $action = 'patient_list';

        if ($request->ajax()) {
            $data = DB::table('patients as p')->join('delivery_places as d', 'p.id', '=', 'd.patient_id')->join('hospital_types as ht', 'ht.id', '=', 'd.hospital_type_id')->join('h_s_c_s as hsc', 'hsc.id', '=', 'p.hsc_id')->join('mother_visits as v', 'p.id', '=', 'v.patient_id')->whereIn('v.high_risk', [1, 2, 3, 4, 5, 6, 7, 8])->join('high_risks as hr', 'hr.id', '=', 'v.high_risk')->select('p.id as id', 'hsc.name as hsc_name', 'p.rch_id', 'p.an_mother', 'p.husband_name', 'p.mobile', 'p.gravida', 'p.para', 'hr.name as high_risk', 'p.lmp_date', 'p.edd_date', 'p.an_reg_date as reg_date')->where('ht.name', 'phc')->groupBy('p.id')->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('view', function ($row) {
                    $view = '<a href="' . url('patient/an-mother-visit/' . $row->id) . '" ><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg></a>';
                    return $view;
                })
                ->editColumn('gravida_para', function ($row) {
                    if (!$row->gravida) {
                        $row->gravida = '0';
                    }
                    if (!$row->para) {
                        $row->para = '0';
                    }
                    return $row->gravida . '/' . $row->para;
                })
                ->rawColumns(['gravida_para', 'view'])
                ->make(true);
        }

        return view('modules.reports.high_risk_phc', compact('page_title', 'page_description', 'action'));

    }
}
