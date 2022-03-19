<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

        return view('modules.patient.patient_add', compact('page_title', 'page_description','action'));
    }
    
    public function patient_add_submit(Request $request)
    {
        return $request;
    }
}
