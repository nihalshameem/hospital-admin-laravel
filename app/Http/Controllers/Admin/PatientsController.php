<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;

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
    public function patient_list()
    {
        $page_title = 'Patient List';
        $page_description = 'Registered Patients List';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";

        $action = __FUNCTION__;

        return view('modules.patient.patient_list', compact('page_title', 'page_description', 'action', 'logo', 'logoText'));
    }

    public function patient_add()
    {
        $page_title = 'Patient Registration';
        $page_description = 'Patient Registration Form';

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
            return redirect('patient/mother_medical/'.$patient->id);
        }

    }
}
