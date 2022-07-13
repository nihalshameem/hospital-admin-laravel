<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BirthDefect;
use App\Models\DeliveryDetail;
use App\Models\DeliveryMethod;
use App\Models\DeliveryOutcome;
use App\Models\DeliveryPlace;
use App\Models\District;
use App\Models\HighRisk;
use App\Models\Hospital;
use App\Models\HospitalType;
use App\Models\HSC;
use App\Models\MotherCheckup;
use App\Models\MotherMedical;
use App\Models\MotherVisit;
use App\Models\PastIllness;
use App\Models\PastObstetricHistory;
use App\Models\Patient;
use App\Models\PostPartum;
use App\Models\PregnancyComplication;
use App\Models\PregnancyOutcome;
use App\Models\WhoConductedDelivery;
use DataTables;
use DB;
use Excel;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    // List of AN Mothers registered in PHC
    public function mother_phc(Request $request)
    {
        $page_title = 'Mother in PHC Report';
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
        $page_title = 'High Risk in PHC Report';
        $page_description = 'List of High risk Mothers registered in PHC
';

        $action = 'patient_list';

        if ($request->ajax()) {
            $data = DB::table('patients as p')->join('delivery_places as d', 'p.id', '=', 'd.patient_id')->join('hospital_types as ht', 'ht.id', '=', 'd.hospital_type_id')->join('h_s_c_s as hsc', 'hsc.id', '=', 'p.hsc_id')->join('mother_visits as v', 'p.id', '=', 'v.patient_id')->whereIn('v.high_risk', [1, 2, 3, 4, 5, 6, 7, 8])->join('high_risks as hr','hr.id','=','v.high_risk')->select('p.id as id', 'hsc.name as hsc_name', 'p.rch_id', 'p.an_mother', 'p.husband_name', 'p.mobile', 'p.gravida', 'p.para','hr.name as high_risk','p.lmp_date','p.edd_date','p.an_reg_date as reg_date')->where('ht.name', 'phc')->groupBy('p.id')->get();
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
    
    public function an_clinic_visits(Request $request)
    {
        $page_title = 'An clinic visits Report';
        $page_description = 'High risk Search List';

        $action = 'patient_list';
        $high_risks = HighRisk::all();

        return view('modules.reports.an_clinic_visits', compact('page_title', 'page_description', 'action', 'high_risks'));
    }
    
    public function an_mother_visits(Request $request)
    {
        
        $page_title = 'An mother visits Report';
        $page_description = 'An mother visits search list';

        $action = 'patient_list';
        $high_risks = HighRisk::all();

        return view('modules.reports.an_mother_visits', compact('page_title', 'page_description', 'action', 'high_risks'));
    }
    
    public function search_result(Request $request)
    {
        $from_date = date($request->from_date);
        $to_date = date($request->to_date);

        $data = DB::table('patients as p')->join('mother_visits as v', 'p.id', '=', 'v.patient_id')->join('h_s_c_s as hsc', 'hsc.id', '=', 'p.hsc_id')->whereIn('v.high_risk', [1, 2, 3, 4, 5, 6, 7, 8])->where('v.high_risk', 'like', '%' . $request->symptoms . '%')->where('hsc.name', 'like', '%' . $request->hsc_name . '%')->where('p.rch_id', 'like', '%' . $request->rch_id . '%')->select('hsc.name as hsc_name', 'v.high_risk as symptoms', 'p.rch_id as rch_id', 'v.an_mother_weight as an_mother_weight', 'v.crl as crl','v.afi as afi','v.bp as bp','v.hb as hb', 'v.remark as remark','v.high_risk_other as high_risk_other', 'v.efw as efw', 'v.bpd as bpd', 'v.scan_edd as scan_edd','v.gestational_age as gestational_age','v.placemental_position as placemental_position','v.created_at as from_date', 'v.created_at as to_date', 'p.id as id', 'p.an_mother as an_mother')->groupBy('p.id');
        
        if ($request->from_date != '' && $request->to_date) {
            $data = $data->whereBetween(DB::raw('DATE(v.created_at)'), array($from_date, $to_date));
        }
        $data = $data->get();
        
        return Datatables::of($data)->addIndexColumn()
            ->addColumn('checkbox', function ($row) {
                $checkbox = '<div class="checkbox text-right align-self-center">
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckBox11" required="">
                                                    <label class="custom-control-label" for="customCheckBox11"></label>
                                                </div>
                                            </div>';
                return $checkbox;
            })
            ->addColumn('action', function ($row) {
                $edit = '
                    <a type="button" class="btn btn-link mb-2" href="' . url('patient/an-mother-visit/' . $row->id) . '"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg></a>';
                return $edit;
            })
            ->addColumn('visit_count', function ($row) {
                $count = MotherVisit::where('patient_id', $row->id)->count();
                return $count;
            })
            ->rawColumns(['checkbox', 'action', 'visit_count'])
            ->make(true);

    }

}
