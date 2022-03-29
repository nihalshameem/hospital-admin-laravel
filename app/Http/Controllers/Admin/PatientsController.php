<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeliveryPlace;
use App\Models\HospitalType;
use App\Models\MotherMedical;
use App\Models\PastIllness;
use App\Models\PastObstetricHistory;
use App\Models\Patient;
use App\Models\PregnancyComplication;
use App\Models\PregnancyOutcome;
use DataTables;
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

        if ($request->ajax()) {
            $data = Patient::select('id', 'hsc_id', 'rch_id', 'pw_height', 'mother_weight', 'an_reg_date')->get();
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

        return view('modules.patient.patient_add', compact('page_title', 'page_description', 'action'));
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
                'pw_height' => $request->pw_height,
                'mother_weight' => $request->mother_weight,
                'bp_systolic' => $request->bp_systolic,
                'bp_diastolic' => $request->bp_diastolic,
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

        $action = 'patient_add';
        return view('modules.patient.patient_edit', compact('page_title', 'page_description', 'action', 'patient'));

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
            $patient->pw_height = $request->pw_height;
            $patient->mother_weight = $request->mother_weight;
            $patient->bp_systolic = $request->bp_systolic;
            $patient->bp_diastolic = $request->bp_diastolic;
            $patient->bpl_apl = $request->bpl_apl;
            $patient->last_visit_date_ec_tracking = $request->last_visit_date_ec_tracking;
            $patient->an_reg_date = $request->an_reg_date;
            $patient->age = $request->age;
            $patient->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('message', $e->getMessage())->with('type', 'error')->with('heading', 'Something Went Wrong!');
        }

        if ($request->submit_btn == 'save') {
            return redirect('patient')->with('message', 'Patient details updated')->with('type', 'success')->with('heading', 'Updated Successfully');
        } else {
            return redirect('patient/mother-medical/' . $patient->id)->with('message', 'Patient Registration updated')->with('type', 'success')->with('heading', 'Updated Successfully');
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

        $action = 'patient_add';
        return view('modules.patient.mother_medical', compact('page_title', 'page_description', 'action', 'patient', 'mother_medical', 'past_illnesses', 'obstetric', 'complications', 'outcomes', 'delivery_place', 'hospital_types'));

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
            return redirect('patient/mother-medical/' . $id)->with('message', $message)->with('type', 'success')->with('heading', $title);
        }

    }
}
