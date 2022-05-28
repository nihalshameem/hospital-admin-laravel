<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
use DataTables;
use DB;
use Excel;
use Illuminate\Http\Request;

class PatientsController extends Controller
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
     * Show the application Patients.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function patient_list(Request $request)
    {
        $page_title = 'Mother Registration';
        $page_description = 'Mother Registration List';

        $action = __FUNCTION__;
//  echo $request->search_rch;
//             echo die();
        if ($request->ajax()) {
            // echo $request->search_rch;
            // echo die();
            $start = date('Y-m-d');
            $end = date('Y-m-d', strtotime($start . '+ 7 days'));

            if ($request->q == 'high_risk') {
                $data = DB::table('patients as p')->join('mother_visits as v', 'p.id', '=', 'v.patient_id')->join('h_s_c_s as hsc', 'hsc.id', '=', 'p.hsc_id')->whereIn('v.high_risk', [1, 2, 3, 4, 5, 6, 7, 8])->select('p.id', 'p.hsc_id', 'p.rch_id', 'p.an_mother', 'p.husband_name', 'p.an_reg_date', 'hsc.name as hsc_name')->groupBy('p.id')->get();
            } elseif ($request->q == 'edd') {
                $data = DB::table('patients as p')->join('mother_medicals as m', 'p.id', '=', 'm.patient_id')->join('h_s_c_s as hsc', 'hsc.id', '=', 'p.hsc_id')->whereBetween('m.edd_date', [$start, $end])->select('p.id', 'p.hsc_id', 'p.rch_id', 'p.an_mother', 'p.husband_name', 'p.an_reg_date', 'hsc.name as hsc_name')->groupBy('p.id')->get();
            } elseif ($request->q == 'high_risk_edd') {
                $data = DB::table('patients as p')->join('mother_visits as v', 'p.id', '=', 'v.patient_id')->join('mother_medicals as m', 'p.id', '=', 'm.patient_id')->join('h_s_c_s as hsc', 'hsc.id', '=', 'p.hsc_id')->whereBetween('m.edd_date', [$start, $end])->whereIn('v.high_risk', [1, 2, 3, 4, 5, 6, 7, 8])->groupBy('p.id')->select('p.id', 'p.hsc_id', 'p.rch_id', 'p.an_mother', 'p.husband_name', 'p.an_reg_date', 'hsc.name as hsc_name')->get();
            } 
            else if(!empty($request->search_rch)) {
                 $data = DB::table('patients')
                    ->select('patients.id', 'patients.hsc_id', 'patients.rch_id', 'patients.an_mother', 'patients.husband_name', 'patients.an_reg_date', 'hsc.name as hsc_name')
                    ->join('h_s_c_s as hsc', 'hsc.id', '=', 'patients.hsc_id')
                    ->where('patients.rch_id', $request->search_rch)
                    ->orWhere('patients.rch_id', 'like', '%' . $request->search_rch . '%')
                    ->get();
            } 
            else {
                $data = DB::table('patients')
                    ->select('patients.id', 'patients.hsc_id', 'patients.rch_id', 'patients.an_mother', 'patients.husband_name', 'patients.an_reg_date', 'hsc.name as hsc_name')
                    ->join('h_s_c_s as hsc', 'hsc.id', '=', 'patients.hsc_id')
                    ->get();
            }

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
                ->addColumn('edit', function ($row) {
                    $edit = '
                    <button type="button" class="btn btn-link mb-2 editModalBtn" data-id="' . $row->id . '"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg></button>';
                    return $edit;
                })
                ->addColumn('delete', function ($row) {
                    $delete = '<a href="' . url('patient/delete/' . $row->id) . '">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M3 6H5H21" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>';
                    return $delete;
                })
                ->rawColumns(['checkbox', 'edit', 'delete'])
                ->make(true);
        }

        return view('modules.patient.patient_list', compact('page_title', 'page_description', 'action'));
    }

    public function patient_add()
    {
        $page_title = 'Mother Registration';
        $page_description = 'Mother Registration Form';

        $action = __FUNCTION__;
        $hsc = HSC::all();

        return view('modules.patient.patient_add', compact('page_title', 'page_description', 'action', 'hsc'));
    }

    public function patient_add_submit(Request $request)
    {
        try {
            $patient = Patient::create([
                'hsc_id' => $request->hsc_id,
                'rch_id' => $request->rch_id,
                'anc_number' => $request->anc_number,
                'ec_reg_date' => $request->ec_reg_date,
                'financial_year' => $request->financial_year,
                'an_mother' => $request->an_mother,
                'husband_name' => $request->husband_name,
                'address' => $request->address,
                'whom_mobile' => $request->whom_mobile,
                'mobile' => $request->mobile,
                'husband_mobile' => $request->husband_mobile,
                'living_children' => $request->living_children,
                'cast' => $request->cast,
                'religion' => $request->religion,
                'dob' => $request->dob,
                'gravida' => $request->gravida,
                'para' => $request->para,
                'pw_height' => (int) $request->pw_height,
                'mother_weight' => (int) $request->mother_weight,
                'bp_systolic' => (int) $request->bp_systolic,
                'bp_diastolic' => (int) $request->bp_diastolic,
                'bpl_apl' => $request->bpl_apl,
                'last_visit_date_ec_tracking' => $request->last_visit_date_ec_tracking,
                'an_reg_date' => $request->an_reg_date,
                'age' => $request->age,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('message', $e->getMessage())->with('type', 'error')->with('heading', 'Something Went Wrong!');
        }

        if ($request->submit_btn == 'save') {
            return redirect('patient');
        } else {
            return redirect('patient/mother-medical/' . $patient->id);
        }

    }

    public function patient_edit($id)
    {
        try {
            $patient = Patient::find($id);
        } catch (\Exception $e) {
            return redirect()->back()->with('message', $e->getMessage())->with('type', 'error')->with('heading', 'Something Went Wrong!');
        }
        $page_title = 'Mother Registration';
        $page_description = 'Mother Registration Edit';
        $hsc = HSC::all();

        $action = 'patient_add';
        return view('modules.patient.patient_edit', compact('page_title', 'page_description', 'action', 'patient', 'hsc'));

    }

    public function patient_update(Request $request, $id)
    {
        try {
            $patient = Patient::find($id);
            
            $patient->hsc_id = $request->hsc_id;
            $patient->rch_id = $request->rch_id;
            $patient->anc_number = $request->anc_number;
            $patient->ec_reg_date = $request->ec_reg_date;
            $patient->financial_year = $request->financial_year;
            $patient->an_mother = $request->an_mother;
            $patient->husband_name = $request->husband_name;
            $patient->address = $request->address;
            $patient->whom_mobile = $request->whom_mobile;
            $patient->mobile = $request->mobile;
            $patient->husband_mobile = $request->husband_mobile;
            $patient->living_children = $request->living_children;
            $patient->cast = $request->cast;
            $patient->religion = $request->religion;
            $patient->dob = $request->dob;
            $patient->gravida = $request->gravida;
            $patient->para = $request->para;
            $patient->pw_height = (int) $request->pw_height;
            $patient->mother_weight = (int) $request->mother_weight;
            $patient->bp_systolic = (int) $request->bp_systolic;
            $patient->bp_diastolic = (int) $request->bp_diastolic;
            $patient->bpl_apl = $request->bpl_apl;
            $patient->last_visit_date_ec_tracking = $request->last_visit_date_ec_tracking;
            $patient->an_reg_date = $request->an_reg_date;
            $patient->age = $request->age;
            $patient->save();
            if ($request->submit_btn == 'save') {
            return redirect('patient')->with('message', 'Patient details updated')->with('type', 'success')->with('heading', 'Updated Successfully');
        } else {
            return redirect('patient/mother-medical/' . $patient->id)->with('message', 'Patient Registration updated')->with('type', 'success')->with('heading', 'Updated Successfully');
        }
        } catch (\Exception $e) {
            return redirect()->back()->with('message', $e->getMessage())->with('type', 'error')->with('heading', 'Something Went Wrong!');
        }

        

    }
    
     public function patient_delete(Request $request, $id)
    {
        try {
            $patient = Patient::where('id',$id)->delete();
            $patient = DeliveryPlace::where('patient_id',$id)->delete();
            $patient = MotherMedical::where('patient_id',$id)->delete();
            $patient = MotherVisit::where('patient_id',$id)->delete();
            $patient = PastObstetricHistory::where('patient_id',$id)->delete();
            
            
            
            return redirect('patient')->with('message', 'Patient details deleted')->with('type', 'success')->with('heading', 'Deleted Successfully');
       
        } catch (\Exception $e) {
            return redirect()->back()->with('message', $e->getMessage())->with('type', 'error')->with('heading', 'Something Went Wrong!');
        }

        

    }
    
     public function patient_mother_medical_delete(Request $request, $id)
    {
        try {
            $patient = MotherMedical::where('id',$id)->delete();
            
            
            
            return redirect('patient')->with('message', 'Patient details deleted')->with('type', 'success')->with('heading', 'Deleted Successfully');
       
        } catch (\Exception $e) {
            return redirect()->back()->with('message', $e->getMessage())->with('type', 'error')->with('heading', 'Something Went Wrong!');
        }

        

    }
    
     public function patient_mother_visit_delete(Request $request, $id)
    {
        try {
            $patient = MotherVisit::where('id',$id)->delete();
            
            
            
            return redirect('patient')->with('message', 'Patient details deleted')->with('type', 'success')->with('heading', 'Deleted Successfully');
       
        } catch (\Exception $e) {
            return redirect()->back()->with('message', $e->getMessage())->with('type', 'error')->with('heading', 'Something Went Wrong!');
        }

        

    }

    public function mother_medical($id)
    {
        $page_title = 'Mother Medical';
        $page_description = 'Mother Medical Form';
        try {
            $patient = Patient::find($id);
        } catch (\Exception $e) {
            return redirect()->back()->with('message', $e->getMessage())->with('type', 'error')->with('heading', 'Something Went Wrong!');
        }
        $mother_medical = MotherMedical::where('patient_id', $id)->first();
        $obstetric = PastObstetricHistory::where('patient_id', $id)->first();
        $delivery_place = DeliveryPlace::where('patient_id', $id)->first();
        $past_illnesses = PastIllness::all();
        $complications = PregnancyComplication::all();
        $outcomes = PregnancyOutcome::all();
        $hospital_types = HospitalType::all();
        $hospitals = Hospital::all();
        $hsc = HSC::all();
        $districts = District::all();

        $action = 'patient_add';
        return view('modules.patient.mother_medical', compact('page_title', 'page_description', 'action', 'patient', 'mother_medical', 'past_illnesses', 'obstetric', 'complications', 'outcomes', 'delivery_place', 'hospital_types', 'hsc', 'districts', 'hospitals'));

    }

    public function mother_medical_update($id, Request $request)
    {
        $patient_id = $id;
        $pw_rch_reg_number = $request->pw_rch_reg_number;
        $an_reg_date = $request->an_reg_date;
        $financial_year = $request->financial_year;
        $mother_name = $request->mother_name;
        $lmp_date = $request->lmp_date;
        $within_pregnancy_week = $request->within_pregnancy_week;
        $edd_date = $request->edd_date;
        $mother_blood_grp_status = $request->mother_blood_grp_status;
        $blood_grp = $request->blood_grp;
        $past_illness_id = $request->past_illness_id;
        $other_past_illness = $request->other_past_illness;
        $is_vdrl_rpp = $request->is_vdrl_rpp;
        $vdrl_date = $request->vdrl_date;
        $vdrl_result = $request->vdrl_result;
        $eligible_for_mrmbs = $request->eligible_for_mrmbs;
        $hbsag_done = $request->hbsag_done;
        $hbsag_status = $request->hbsag_status;
        $wife_hiv_screening = $request->wife_hiv_screening;
        $wife_hiv_screeing_date = $request->wife_hiv_screeing_date;
        $wife_hiv_screeing_result = $request->wife_hiv_screeing_result;
        $husband_hiv_screening = $request->husband_hiv_screening;
        $husband_hiv_screeing_date = $request->husband_hiv_screeing_date;
        $husband_hiv_screeing_result = $request->husband_hiv_screeing_result;

        $total_pregnancy = $request->total_pregnancy;
        $last_complication_id = $request->last_complication_id;
        $last_other_complication = $request->last_other_complication;
        $present_complication_id = $request->present_complication_id;
        $present_other_complication = $request->present_other_complication;
        $outcome_id = $request->outcome_id;

        $district = $request->district;
        $hospital_type_id = $request->hospital_type_id;
        $hospital_name = $request->hospital_name;

        $mother_medical = MotherMedical::where('patient_id', $id)->first();
        $obstetric = PastObstetricHistory::where('patient_id', $id)->first();
        $delivery_place = DeliveryPlace::where('patient_id', $id)->first();

        try {
            if ($mother_medical) {
                $mother_medical->patient_id = $patient_id;
                $mother_medical->pw_rch_reg_number = $pw_rch_reg_number;
                $mother_medical->an_reg_date = $an_reg_date;
                $mother_medical->financial_year = $financial_year;
                $mother_medical->mother_name = $mother_name;
                $mother_medical->lmp_date = $lmp_date;
                $mother_medical->within_pregnancy_week = $within_pregnancy_week;
                $mother_medical->edd_date = $edd_date;
                $mother_medical->mother_blood_grp_status = $mother_blood_grp_status;
                $mother_medical->blood_grp = $blood_grp;
                $mother_medical->past_illness_id = $past_illness_id;
                $mother_medical->other_past_illness = $other_past_illness;
                $mother_medical->is_vdrl_rpp = $is_vdrl_rpp;
                $mother_medical->vdrl_date = $vdrl_date;
                $mother_medical->vdrl_result = $vdrl_result;
                $mother_medical->eligible_for_mrmbs = $eligible_for_mrmbs;
                $mother_medical->hbsag_done = $hbsag_done;
                $mother_medical->hbsag_status = $hbsag_status;
                $mother_medical->wife_hiv_screening = $wife_hiv_screening;
                $mother_medical->wife_hiv_screeing_date = $wife_hiv_screeing_date;
                $mother_medical->wife_hiv_screeing_result = $wife_hiv_screeing_result;
                $mother_medical->husband_hiv_screening = $husband_hiv_screening;
                $mother_medical->husband_hiv_screeing_date = $husband_hiv_screeing_date;
                $mother_medical->husband_hiv_screeing_result = $husband_hiv_screeing_result;
                $mother_medical->save();

            } else {
                $mother_medical = MotherMedical::create([
                    'patient_id' => $patient_id,
                    'pw_rch_reg_number' => $pw_rch_reg_number,
                    'an_reg_date' => $an_reg_date,
                    'financial_year' => $financial_year,
                    'mother_name' => $mother_name,
                    'lmp_date' => $lmp_date,
                    'within_pregnancy_week' => $within_pregnancy_week,
                    'edd_date' => $edd_date,
                    'mother_blood_grp_status' => $mother_blood_grp_status,
                    'blood_grp' => $blood_grp,
                    'past_illness_id' => $past_illness_id,
                    'other_past_illness' => $other_past_illness,
                    'is_vdrl_rpp' => $is_vdrl_rpp,
                    'vdrl_date' => $vdrl_date,
                    'vdrl_result' => $vdrl_result,
                    'eligible_for_mrmbs' => $eligible_for_mrmbs,
                    'hbsag_done' => $hbsag_done,
                    'hbsag_status' => $hbsag_status,
                    'wife_hiv_screening' => $wife_hiv_screening,
                    'wife_hiv_screeing_date' => $wife_hiv_screeing_date,
                    'wife_hiv_screeing_result' => $wife_hiv_screeing_result,
                    'husband_hiv_screening' => $husband_hiv_screening,
                    'husband_hiv_screeing_date' => $husband_hiv_screeing_date,
                    'husband_hiv_screeing_result' => $husband_hiv_screeing_result,
                ]);
            }

            if ($obstetric) {
                $obstetric->total_pregnancy = $total_pregnancy;
                $obstetric->last_complication_id = $last_complication_id;
                $obstetric->last_other_complication = $last_other_complication;
                $obstetric->present_complication_id = $present_complication_id;
                $obstetric->present_other_complication = $present_other_complication;
                $obstetric->outcome_id = $outcome_id;
                $obstetric->save();
            } else {
                $obstetric = PastObstetricHistory::create([
                    'patient_id' => $id,
                    'total_pregnancy' => $total_pregnancy,
                    'last_complication_id' => $last_complication_id,
                    'last_other_complication' => $last_other_complication,
                    'present_complication_id' => $present_complication_id,
                    'present_other_complication' => $present_other_complication,
                    'outcome_id' => $outcome_id,
                ]);
            }
            if ($delivery_place) {
                $delivery_place->district = $district;
                $delivery_place->hospital_type_id = $hospital_type_id;
                $delivery_place->hospital_name = $hospital_name;
                $delivery_place->save();
            } else {
                $delivery_place = DeliveryPlace::create([
                    'patient_id' => $id,
                    'district' => $district,
                    'hospital_type_id' => $hospital_type_id,
                    'hospital_name' => $hospital_name,
                ]);
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('message', $e->getMessage())->with('type', 'error')->with('heading', 'Something Went Wrong!');
        }

        $message = 'Mother medical details updated';
        $title = 'Updated Successfully';
        if ($request->submit_btn == 'save') {
            return redirect('patient')->with('message', $message)->with('type', 'success')->with('heading', $title);
        } else {
            return redirect('patient/an-mother-visit/' . $id)->with('message', $message)->with('type', 'success')->with('heading', $title);
        }

    }

    // an mother visit add form and datatable
    public function mother_visit($id, Request $request)
    {
        $page_title = 'AN Mother Visit\'s';
        $page_description = 'AN Mother Visit\'s Form';
        try {
            $patient = Patient::find($id);
        } catch (\Exception $e) {
            return redirect()->back()->with('message', $e->getMessage())->with('type', 'error')->with('heading', 'Something Went Wrong!');
        }

        $mother_checkups = MotherCheckup::all();
        $high_risks = HighRisk::all();
        $post_partums = PostPartum::all();
        $districts = District::all();
        $hospital_types = HospitalType::all();
        $hospitals = Hospital::all();
        $mother_medical = MotherMedical::where('patient_id',$id)->first();
        $delivery_place = DeliveryPlace::where('patient_id', $patient->id)->first();

        if ($request->ajax()) {
            $data = MotherVisit::select('id', 'patient_id', 'visit_type', 'an_visit_mother_name', 'financial_year', 'remark', 'result')->where('patient_id', $patient->id)->orderBy('updated_at', 'desc')->get();
            foreach ($data as $key => $item) {
                $item->result = 'Select ' . $item->result;
            }

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
                ->addColumn('edit', function ($row) {
                    $edit = '
                    <a href="' . url('patient/mother-visit/edit/' . $row->id) . '" ><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg></a>';
                    return $edit;
                })
                ->addColumn('delete', function ($row) {
                    $delete = '<a href="' . url('patient/mother-visit/delete/' . $row->id) . '">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M3 6H5H21" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>';
                    return $delete;
                })
                ->rawColumns(['checkbox', 'edit', 'delete'])
                ->make(true);
        }

        $action = 'patient_add';
        return view('modules.patient.mother_visit', compact('page_title', 'page_description', 'action', 'patient', 'mother_checkups', 'high_risks', 'post_partums', 'districts', 'hospital_types', 'hospitals', 'delivery_place','mother_medical'));
    }

    // an mother visit add
    public function mother_visit_add(Request $request, $id)
    {
        // return $request;
        try {
            MotherVisit::create([
                'patient_id' => $id,
                'visit_type' => $request->visit_type,
                'rch_number' => $request->rch_number,
                'an_reg_date' => $request->an_reg_date,
                'financial_year' => $request->financial_year,
                'an_visit_mother_name' => $request->an_visit_mother_name,
                'lmp_date' => $request->lmp_date,
                'edd_date' => $request->edd_date,
                'within_pregnancy_week' => $request->within_pregnancy_week,
                'district' => $request->district,
                'checkup_place' => $request->checkup_place,
                'place_name' => $request->place_name,
                'abortion_if_any' => $request->abortion_if_any,
                'abortion_date' => $request->abortion_date,
                'abortion_type' => $request->abortion_type,
                'abortion_district' => $request->abortion_district,
                'abortion_facility' => $request->abortion_facility,
                'abortion_pregnancy_week' => $request->abortion_pregnancy_week,
                'an_visit_date' => $request->an_visit_date,
                'anc_period' => $request->anc_period,
                'pregnancy_week' => $request->pregnancy_week,
                'an_mother_weight' => $request->an_mother_weight,
                'bp_systolic' => $request->bp_systolic,
                'bp_diastolic' => $request->bp_diastolic,
                'hb' => $request->hb,
                'urine_test' => $request->urine_test,
                'urine_sugar' => $request->urine_sugar,
                'urine_albumin' => $request->urine_albumin,
                'blood_sugar_test' => $request->blood_sugar_test,
                'fasting' => $request->fasting,
                'post_prandial' => $request->post_prandial,
                'gct' => $request->gct,
                'gct_value' => $request->gct_value,
                'tt_dose' => $request->tt_dose,
                'tt_date' => $request->tt_date,
                'albendazole_date' => $request->albendazole_date,
                'ifa_date' => $request->ifa_date,
                'ifa_tablet' => $request->ifa_tablet,
                'fa_date' => $request->fa_date,
                'fa_tablet' => $request->fa_tablet,
                'fundal_size' => $request->fundal_size,
                'calcium_tablet' => $request->calcium_tablet,
                'calcium_date' => $request->calcium_date,
                'foetal_heart_rate' => $request->foetal_heart_rate,
                'foetal_position' => $request->foetal_position,
                'foetal_movement' => $request->foetal_movement,
                'post_partum' => $request->post_partum,
                'partum_other' => $request->partum_other,
                'high_risk' => $request->high_risk,
                'high_risk_other' => $request->high_risk_other,
                'referral_date' => $request->referral_date,
                'referral_district' => $request->referral_district,
                'referral_facility' => $request->referral_facility,
                'referral_place' => $request->referral_place,
                'ultrasonogram' => $request->ultrasonogram,
                'ultrasonogram_date' => $request->ultrasonogram_date,
                'scan_edd' => $request->scan_edd,
                'trimester' => $request->trimester,
                'ultrasonogram_fundal_size' => $request->ultrasonogram_fundal_size,
                'ultrasonogram__heart_rate' => $request->ultrasonogram__heart_rate,
                'ultrasonogram_position' => $request->ultrasonogram_position,
                'ultrasonogram_movement' => $request->ultrasonogram_movement,
                'remark' => $request->remark,
                'result' => $request->result,
                'wife_hiv_screening' => $request->wife_hiv_screening,
                'wife_hiv_screeing_date' => $request->wife_hiv_screeing_date,
                'wife_hiv_screeing_result' => $request->wife_hiv_screeing_result,
                'husband_hiv_screening' => $request->husband_hiv_screening,
                'husband_hiv_screeing_date' => $request->husband_hiv_screeing_date,
                'husband_hiv_screeing_result' => $request->husband_hiv_screeing_result,
                'is_vdrl_rpp' => $request->is_vdrl_rpp,
                'vdrl_date' => $request->vdrl_date,
                'vdrl_result' => $request->vdrl_result,
                'mother_blood_grp_status' => $request->mother_blood_grp_status,
                'blood_grp' => $request->blood_grp,
                'hbsag_status' => $request->hbsag_status,

            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('message', $e->getMessage())->with('type', 'error')->with('heading', 'Something Went Wrong!');
        }
        $message = 'Mother Visit Added';
        $title = 'Added Successfully';

        if ($request->submit_btn == 'save') {
            return redirect('patient/an-mother-visit/' . $id)->with('message', $message)->with('type', 'success')->with('heading', $title);
        } else {
            return redirect('patient/mother-medical/' . $id)->with('message', $message)->with('type', 'success')->with('heading', $title);
        }

    }

    // an mother visit update
    public function mother_visit_update(Request $request, $id)
    {
        try {
            $visit = MotherVisit::find($id);
            $visit->visit_type = $request->visit_type;
            $visit->rch_number = $request->rch_number;
            $visit->an_reg_date = $request->an_reg_date;
            $visit->financial_year = $request->financial_year;
            $visit->an_visit_mother_name = $request->an_visit_mother_name;
            $visit->lmp_date = $request->lmp_date;
            $visit->edd_date = $request->edd_date;
            $visit->within_pregnancy_week = $request->within_pregnancy_week;
            $visit->district = $request->district;
            $visit->checkup_place = $request->checkup_place;
            $visit->place_name = $request->place_name;
            $visit->abortion_if_any = $request->abortion_if_any;
            $visit->abortion_date = $request->abortion_date;
            $visit->abortion_type = $request->abortion_type;
            $visit->abortion_district = $request->abortion_district;
            $visit->abortion_facility = $request->abortion_facility;
            $visit->abortion_pregnancy_week = $request->abortion_pregnancy_week;
            $visit->an_visit_date = $request->an_visit_date;
            $visit->anc_period = $request->anc_period;
            $visit->pregnancy_week = $request->pregnancy_week;
            $visit->an_mother_weight = $request->an_mother_weight;
            $visit->bp_systolic = $request->bp_systolic;
            $visit->bp_diastolic = $request->bp_diastolic;
            $visit->hb = $request->hb;
            $visit->urine_test = $request->urine_test;
            $visit->urine_sugar = $request->urine_sugar;
            $visit->urine_albumin = $request->urine_albumin;
            $visit->blood_sugar_test = $request->blood_sugar_test;
            $visit->fasting = $request->fasting;
            $visit->post_prandial = $request->post_prandial;
            $visit->gct = $request->gct;
            $visit->gct_value = $request->gct_value;
            $visit->tt_dose = $request->tt_dose;
            $visit->tt_date = $request->tt_date;
            $visit->albendazole_date = $request->albendazole_date;
            $visit->ifa_date = $request->ifa_date;
            $visit->ifa_tablet = $request->ifa_tablet;
            $visit->fa_date = $request->fa_date;
            $visit->fa_tablet = $request->fa_tablet;
            $visit->fundal_size = $request->fundal_size;
            $visit->calcium_tablet = $request->calcium_tablet;
            $visit->calcium_date = $request->calcium_date;
            $visit->foetal_heart_rate = $request->foetal_heart_rate;
            $visit->foetal_position = $request->foetal_position;
            $visit->foetal_movement = $request->foetal_movement;
            $visit->post_partum = $request->post_partum;
            $visit->partum_other = $request->partum_other;
            $visit->high_risk = $request->high_risk;
            $visit->high_risk_other = $request->high_risk_other;
            $visit->referral_date = $request->referral_date;
            $visit->referral_district = $request->referral_district;
            $visit->referral_facility = $request->referral_facility;
            $visit->referral_place = $request->referral_place;
            $visit->ultrasonogram = $request->ultrasonogram;
            $visit->ultrasonogram_date = $request->ultrasonogram_date;
            $visit->scan_edd = $request->scan_edd;
            $visit->trimester = $request->trimester;
            $visit->ultrasonogram_fundal_size = $request->ultrasonogram_fundal_size;
            $visit->ultrasonogram__heart_rate = $request->ultrasonogram__heart_rate;
            $visit->ultrasonogram_position = $request->ultrasonogram_position;
            $visit->ultrasonogram_movement = $request->ultrasonogram_movement;
            $visit->remark = $request->remark;
            $visit->result = $request->result;
            $visit->wife_hiv_screening = $request->wife_hiv_screening;
            $visit->wife_hiv_screeing_date = $request->wife_hiv_screeing_date;
            $visit->wife_hiv_screeing_result = $request->wife_hiv_screeing_result;
            $visit->husband_hiv_screening = $request->husband_hiv_screening;
            $visit->husband_hiv_screeing_date = $request->husband_hiv_screeing_date;
            $visit->husband_hiv_screeing_result = $request->husband_hiv_screeing_result;
            $visit->is_vdrl_rpp = $request->is_vdrl_rpp;
            $visit->vdrl_date = $request->vdrl_date;
            $visit->vdrl_result = $request->vdrl_result;
            $visit->mother_blood_grp_status = $request->mother_blood_grp_status;
            $visit->blood_grp = $request->blood_grp;
            $visit->hbsag_status = $request->hbsag_status;
            $visit->save();

        } catch (\Exception $e) {
            return redirect()->back()->with('message', $e->getMessage())->with('type', 'error')->with('heading', 'Something Went Wrong!');
        }
        $message = 'Mother Visit Updated';
        $title = 'Updated Successfully';

        if ($request->submit_btn == 'save') {
            return redirect('patient/an-mother-visit/' . $visit->patient_id)->with('message', $message)->with('type', 'success')->with('heading', $title);
        } else {
            return redirect('patient/mother-visit/edit/' . $id)->with('message', $message)->with('type', 'success')->with('heading', $title);
        }

    }

    // mother medical list
    public function mother_medical_list(Request $request)
    {
        $page_title = 'Mother Medical';
        $page_description = 'Mother Medical List';

        $action = 'patient_list';
        $districts = District::all();

        if ($request->ajax()) {
            $data = MotherMedical::select('id', 'patient_id', 'pw_rch_reg_number', 'financial_year', 'mother_name', 'eligible_for_mrmbs', 'an_reg_date')->get();
            // $data =DB::table('patients as p')->join('mother_visits as v', 'p.id', '=', 'v.patient_id')->join('h_s_c_s as hsc', 'hsc.id', '=', 'p.hsc_id')->select('p.rch_id', 'hsc.name as hsc_name', 'p.an_mother', 'p.id as patient_id', 'p.husband_name', 'p.mobile', 'p.an_reg_date')

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
                ->addColumn('edit', function ($row) {
                    $edit = '
                    <a href="' . url('patient/mother-medical/' . $row->patient_id) . '" ><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg></a>';
                    return $edit;
                })
                ->addColumn('delete', function ($row) {
                    $delete = '<a href="' . url('patient/mother-medical/delete/' . $row->id) . '">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M3 6H5H21" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>';
                    return $delete;
                })
                ->rawColumns(['checkbox', 'edit', 'delete'])
                ->make(true);
        }

        return view('modules.patient.mother_medical_list', compact('page_title', 'page_description', 'action', 'districts'));
    }

    // an mother visits list
    public function mother_visit_list(Request $request)
    {
        $page_title = 'Mother Visits';
        $page_description = 'Mother Visits List';

        $action = 'patient_list';

        $patients = Patient::select(['id', 'an_mother as name'])->get();

        if ($request->ajax()) {
            $data = DB::table('patients as p')->join('mother_visits as v', 'p.id', '=', 'v.patient_id')->join('h_s_c_s as hsc', 'hsc.id', '=', 'p.hsc_id')->select('p.rch_id', 'hsc.name as hsc_name', 'p.an_mother', 'p.id as patient_id', 'p.husband_name', 'p.mobile', 'p.an_reg_date')->groupBy('p.id')->get();
            if(!empty($request->search_rch)) {
                 $data =DB::table('patients as p')->join('mother_visits as v', 'p.id', '=', 'v.patient_id')->join('h_s_c_s as hsc', 'hsc.id', '=', 'p.hsc_id')->select('p.rch_id', 'hsc.name as hsc_name', 'p.an_mother', 'p.id as patient_id', 'p.husband_name', 'p.mobile', 'p.an_reg_date')
                    ->where('p.rch_id', $request->search_rch)
                    ->orWhere('p.rch_id', 'like', '%' . $request->search_rch . '%')
                    ->groupBy('p.id')
                    ->get();
            } 
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
                ->addColumn('edit', function ($row) {
                    $edit = '
                    <a href="' . url('patient/an-mother-visit/' . $row->patient_id) . '" ><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg></a>';
                    return $edit;
                })
                ->rawColumns(['checkbox', 'edit', 'visit_count'])
                ->make(true);
        }

        return view('modules.patient.mother_visit_list', compact('page_title', 'page_description', 'action', 'patients'));
    }

    public function mother_visit_edit($id)
    {
        $page_title = 'Mother Visit';
        $page_description = 'Mother Visit Form';

        $action = 'patient_add';

        $mother_visit = MotherVisit::find($id);
        $patient = Patient::find($mother_visit->patient_id);
        $mother_checkups = MotherCheckup::all();
        $post_partums = PostPartum::all();
        $high_risks = HighRisk::all();
        $districts = District::all();
        $hospital_types = HospitalType::all();
        $hospitals = Hospital::all();

        return view('modules.patient.mother_visit_edit', compact('page_title', 'page_description', 'action', 'mother_visit', 'patient', 'mother_checkups', 'post_partums', 'high_risks', 'districts', 'hospital_types', 'hospitals'));
    }

    public function mother_upload()
    {
        $page_title = 'Mother Upload';
        $page_description = 'Mother Upload Form';

        $action = 'patient_add';

        return view('modules.patient.mother_upload', compact('page_title', 'page_description', 'action'));
    }

    // excel upload new
    public function excel_upload(Request $request)
    {
        $this->validate($request, [
            'uploaded_file' => 'required|mimes:xls,xlsx,csv',
        ]);

        try {
            // $path = $request->file('uploaded_file')->getRealPath();
            $path1 = $request->file('uploaded_file')->store('temp');
            $path = storage_path('app') . '/' . $path1;
            ini_set('max_execution_time', 180);
 
            $data = Excel::toArray([], $path);
// echo $data;
//         echo die();
            if (count($data) > 0) {
                foreach ($data as $key => $value) {
                    foreach ($value as $k2 => $row) {
                        if ($k2 > 3) {
                            $district = District::where('name', $row[1])->first();
                            if (!$district) {
                                $district = District::create(['name' => $row[1]]);
                            }
                            $hsc = HSC::where('name', $row[3])->first();
                            if (!$hsc) {
                                $hsc = HSC::create(['name' => $row[3]]);
                            }

                            $patient_data = array(
                                'hsc_id' => $hsc->id,
                                'rch_id' => (string) $row[4],
                                'an_mother' => $row[5],
                                'husband_name' => $row[6],
                                'gravida' => $row[7],
                                'gravida' => $row[8],
                                'mobile' => $row[9],
                                'an_reg_date' => date('Y-m-d 00:00:00', strtotime($row[10])),
                            );

                            if (!empty($patient_data)) {
                                $patient = Patient::create($patient_data);
                                DeliveryPlace::create(['patient_id' => $patient->id, 'district' => $district->id]);
                                MotherMedical::create(['patient_id' => $patient->id, 'lmp_date' => date('Y-m-d 00:00:00', strtotime($row[11])), 'edd_date' => date('Y-m-d 00:00:00', strtotime($row[12]))]);
                            }

                        }
                    }
                }
            }

            ini_set('max_execution_time', 60);

        } catch (\Exception $e) {
            return redirect()->back()->with('message', $e->getMessage())->with('type', 'error')->with('heading', 'Something Went Wrong!');
        }
        return redirect()->back()->with('message', 'Records Added')->with('type', 'success')->with('heading', 'New Record');
    }

    public function hospital_upload()
    {
        $path = public_path() . '/uploads/hospital_names.xlsx';
        ini_set('max_execution_time', 180);

        $district = District::find(1);
        if (!$district) {
            District::create(['name' => 'Kallakurichi']);
        }

        $data = Excel::toArray([], $path);

        if (count($data) > 0) {
            $types = [];
            foreach ($data[0] as $key => $item) {
                if ($key == 0) {
                    foreach ($item as $type_key => $type_name) {
                        if ($type_key > 0 && $type_name) {
                            $type = HospitalType::where('name', $type_name)->first();
                            if (!$type) {
                                $type = HospitalType::create(['name' => $type_name]);
                            }
                            $types[] = $type->id;
                        }
                    }
                }
            }
            foreach ($data[0] as $key => $item) {
                if ($key > 1) {
                    foreach ($item as $h_key => $h_name) {
                        if ($h_name) {
                            $hospital_data = array(
                                'district_id' => 1,
                                'hospital_type_id' => $types[$h_key - 1],
                                'name' => (string) $h_name,
                            );
                            if (!empty($hospital_data)) {
                                $hospital = Hospital::create($hospital_data);
                            }

                        }
                    }
                }
            }
        }

        ini_set('max_execution_time', 60);

        return 'done';
    }
}
