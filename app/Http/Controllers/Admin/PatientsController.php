<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

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
        $page_title = 'Form Element';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('modules.patient.patient_add', compact('page_title', 'page_description','action'));
    }
}
