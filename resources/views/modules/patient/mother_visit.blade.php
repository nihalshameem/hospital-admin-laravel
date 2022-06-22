{{-- Extends layout --}}
@extends('layouts.app')



{{-- Content --}}
@section('content')
    <div class="container-fluid">
        @include('layouts.breadcrumb')
        @if (\Session::has('message'))
            <span id="taster-box" class="d-none">
                <input id="taoster-heading" value="{!! \Session::get('heading') !!}" />
                <input id="taoster-message" value="{!! \Session::get('message') !!}" />
                <input id="taoster-type" value="{!! \Session::get('type') !!}" />
            </span>
        @endif

        <!-- new-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header" style="background-color: #ffb800;">
                        <h4 class="card-title">General Details</h4>
                    </div>
                    <div class="card-body" style="border: solid 3px #ffb800;padding: 20px;">
                        <div class="form-validation">
                            <form class="mother-visit-form" action="{{ url('patient/an-mother-visit/' . $patient->id) }}"
                                method="POST">
                                @csrf
                                {{-- all inputs --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="visit_type">First Choose
                                    </label>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-0">
                                            <label class="radio-inline mr-3"><input type="radio" name="visit_type"
                                                    value="resident" checked>
                                                Resident Mother</label>
                                            <label class="radio-inline mr-3"><input type="radio" name="visit_type"
                                                    value="visitor">
                                                Visitor Mother</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="border: solid 3px #ffb800;padding: 20px;">
                                    <div class="col-xl-12">
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="rch_id"
                                                        style="font-size: 16px;font-weight: 600;color: black;">RCH ID
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control readonly" id="rch_id"
                                                            name="rch_id" value="{{ $patient->rch_id }}">
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="an_visit_mother_name"style="font-size: 16px;font-weight: 600;color: black;">
                                                        Mother Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="an_visit_mother_name"
                                                            name="an_visit_mother_name" value="{{ $patient->an_mother }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="an_visit_mother_name"style="font-size: 16px;font-weight: 600;color: black;">
                                                        Husband Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="husband_name"
                                                            name="husband_name" value="{{ $patient->husband_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="lmp_date"style="font-size: 16px;font-weight: 600;color: black;">LMP
                                                        Date
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="lmp_date"
                                                            name="lmp_date" value="{{ @$mother_medical->lmp_date }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="edd_date"style="font-size: 16px;font-weight: 600;color: black;">EDD
                                                        Date<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="edd_date"
                                                            placeholder="YYYY-MM-DD" name="edd_date"
                                                            value="{{ @$mother_medical->edd_date }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="checkup_place"style="font-size: 16px;font-weight: 600;color: black;">Facility/Place/Site
                                                        of ANC Checkup
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="checkup_place"
                                                            name="checkup_place">
                                                            <option value="">Select</option>
                                                            @foreach ($mother_checkups as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="place_name"style="font-size: 16px;font-weight: 600;color: black;">Name
                                                        of the Facility
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="place_name"
                                                            name="place_name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <center>
                                    <h3><b>Lab Investigations</b></h3>
                                </center>
                                <br>
                                <!-- Lab Investigations-->

                                <div class="row" style="border: solid 3px #ffb800;padding: 20px;">
                                    <div class="col-xl-12">
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="mother_blood"style="font-size: 16px;font-weight: 600;color: black;">Blood
                                                        Grouping and Typing <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6" id="blood_grp">
                                                        <select class="form-control" id="blood_grp" name="blood_grp">
                                                            <option value="">Please Select</option>
                                                            <option value="A+ve">A+ve</option>
                                                            <option value="B+ve">B+ve</option>
                                                            <option value="AB+ve">AB+ve</option>
                                                            <option value="O+ve">O+ve</option>
                                                            <option value="A-ve">A-ve</option>
                                                            <option value="B-ve">B-ve</option>
                                                            <option value="AB-ve">AB-ve</option>
                                                            <option value="O-ve">O-ve</option>
                                                            <option value="A1+ve">A1+ve</option>
                                                            <option value="A1-ve">A1-ve</option>
                                                            <option value="Not Known">Not Known</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="wife_hiv_screening"style="font-size: 16px;font-weight: 600;color: black;">HIV
                                                        Status of AN Mother <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="wife_hiv_screening"
                                                            name="wife_hiv_screening">
                                                            <option value="yes">
                                                                Yes</option>
                                                            <option value="no">
                                                                No
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="wife_hiv_screeing_date"style="font-size: 16px;font-weight: 600;color: black;">Date Of Tested
                                                        <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6">
                                                        <input type="date" class="form-control" id="wife_hiv_screeing_date"
                                                            name="wife_hiv_screeing_date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="husband_hiv_screening"style="font-size: 16px;font-weight: 600;color: black;">HIV
                                                        Status of Spouse <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="husband_hiv_screening"
                                                            name="husband_hiv_screening">
                                                            <option value="yes">
                                                                Yes</option>
                                                            <option value="no">
                                                                No
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="husband_hiv_screeing_date"style="font-size: 16px;font-weight: 600;color: black;">Date Of Tested
                                                        <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6">
                                                        <input type="date" class="form-control" id="husband_hiv_screeing_date"
                                                            name="husband_hiv_screeing_date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="is_vdrl_rpp"style="font-size: 16px;font-weight: 600;color: black;">VDRL
                                                        Status of AN Mother <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="is_vdrl_rpp"
                                                            name="is_vdrl_rpp">
                                                            <option value="yes">
                                                                Yes</option>
                                                            <option value="no">
                                                                No
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="vdrl_date"style="font-size: 16px;font-weight: 600;color: black;">Date Of Tested
                                                        <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6">
                                                        <input type="date" class="form-control" id="vdrl_date"
                                                            name="vdrl_date">
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="husband_vdrl_status"style="font-size: 16px;font-weight: 600;color: black;">VDRL
                                                        Status of Spouse <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="husband_vdrl_status"
                                                            name="husband_vdrl_status">
                                                            <option value="yes">
                                                                Yes</option>
                                                            <option value="no">
                                                                No
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="husband_vdrl_date"style="font-size: 16px;font-weight: 600;color: black;">Date Of Tested
                                                        <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6">
                                                        <input type="date" class="form-control" id="husband_vdrl_date"
                                                            name="husband_vdrl_date">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="hbsag_status"style="font-size: 16px;font-weight: 600;color: black;">HBsAg
                                                        Status
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <div class="form-group mb-0">
                                                            <label class="radio-inline mr-3"><input type="radio"
                                                                    name="hbsag_status" value="positive">
                                                                Positive</label>
                                                            <label class="radio-inline mr-3"><input type="radio"
                                                                    name="hbsag_status" value="negative">
                                                                Negative</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="hbsag_date"style="font-size: 16px;font-weight: 600;color: black;">Date Of Tested
                                                        <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6">
                                                        <input type="date" class="form-control" id="hbsag_date"
                                                            name="hbsag_date">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<div class="col-xl-6">-->
                                            <!--    <div class="form-group row">-->
                                            <!--        <label class="col-lg-4 col-form-label"-->
                                            <!--            for="lab_other"style="font-size: 16px;font-weight: 600;color: black;">Others-->
                                            <!--            <span class="text-danger">*</span>-->
                                            <!--        </label>-->

                                            <!--        <div class="col-lg-6">-->
                                            <!--            <input type="text" class="form-control" id="lab_other"-->
                                            <!--                name="lab_other">-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->


                                        </div>

                                    </div>
                                </div>
                                <br>
                                <center>
                                    <h3><b>Visit Details</b></h3>
                                </center>
                                <br>
                                <!-- Visit Details-->

                                <div class="row" style="border: solid 3px #ffb800;padding: 20px;">
                                    <div class="col-xl-12">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="an_visit_date"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Date of AN
                                                        Visit
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="date" class="form-control" id="an_visit_date"
                                                            name="an_visit_date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="today"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Today Date
                                                
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="date" class="form-control" id="today"
                                                            name="today">
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="pregnancy_week"style="font-size: 16px;font-weight: 600;color: black;">Completed Weeks
                                                        of Pregancy <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6">
                                                        <input type="number" placeholder=""
                                                            class="form-control" min="1" max="23"
                                                            id="pregnancy_week" name="pregnancy_week">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="urine_albumin"style="font-size: 16px;font-weight: 600;color: black;">Urine
                                                        Albumin <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6" id="blood_grp">
                                                        <select class="form-control" id="urine_albumin"
                                                            name="urine_albumin">
                                                            <option value="">Please Select</option>
                                                            <option value="Nill">Nill</option>
                                                            <option value="+">+</option>
                                                            <option value="++">++</option>
                                                            <option value="+++">+++</option>
                                                            <option value="++++">++++</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="an_mother_weight"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Weight of AN
                                                        Mother(in Kg)
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control"
                                                            placeholder="Range 25 to 150" min="25" max="150"
                                                            id="an_mother_weight" name="an_mother_weight">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="urine_sugar"style="font-size: 16px;font-weight: 600;color: black;">Urine
                                                        Sugar <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6" id="urine_sugar">
                                                        <select class="form-control" name="urine_sugar">
                                                            <option value="">Please Select</option>
                                                            <option value="Nill">Nill</option>
                                                            <option value="+">+</option>
                                                            <option value="++">++</option>
                                                            <option value="+++">+++</option>
                                                            <option value="++++">++++</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="bp"
                                                        style="font-size: 16px;font-weight: 600;color: black;">BP(mm of Hg)
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control slash-format"
                                                            placeholder="eg: 120/150" id="bp" name="bp">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="rbs"
                                                        style="font-size: 16px;font-weight: 600;color: black;">RBS (mg/Dl)
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder=" "
                                                            id="rbs" name="rbs">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="hb"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Hb(gm % )
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control"
                                                            placeholder="" id="hb" name="hb">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="fasting"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Fasting
                                                        (mg/dl)
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control"
                                                            placeholder="" id="fasting" name="fasting">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">

                                            <!--<div class="col-xl-6">-->
                                            <!--    <div class="form-group row">-->
                                            <!--        <label class="col-lg-4 col-form-label" for="severe"-->
                                            <!--            style="font-size: 16px;font-weight: 600;color: black;">Severe-->
                                            <!--            <span class="text-danger">*</span>-->
                                            <!--        </label>-->
                                            <!--        <div class="col-lg-6">-->
                                            <!--            <input type="number" class="form-control" placeholder=" "-->
                                            <!--                id="severe" name="severe">-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="post_prandial"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Post
                                                        Prandial (mg/dl)
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control"
                                                            placeholder="" id="post_prandial"
                                                            name="post_prandial">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="gct_value"
                                                        style="font-size: 16px;font-weight: 600;color: black;">GCT(mg/dl)
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder=" "
                                                            id="gct_value" name="gct_value">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="other"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Others
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6" id="other">
                                                        <select class="form-control" name="other">
                                                            <option value="">Please Select</option>
                                                            <option value="Thyroid-Function-test">Thyroid Function test
                                                            </option>
                                                            <option value="OGTT">OGTT</option>
                                                            <option value="ECG">ECG</option>
                                                            <option value="ECHO">ECHO</option>


                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="thyroid"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Thyroid
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6" id="thyroid">
                                                        <select class="form-control" name="thyroid">
                                                            <option value="">Please Select</option>
                                                            <option value="T3">T3</option>
                                                            <option value="T4">T4</option>
                                                            <option value="TSH">TSH</option>
                                                            <option value="free-TSH">Free TSH</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="ogtt"
                                                        style="font-size: 16px;font-weight: 600;color: black;">OGTT
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder=" "
                                                            id="ogtt" name="ogtt">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="ecg"
                                                        style="font-size: 16px;font-weight: 600;color: black;">ECG
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder=" "
                                                            id="ecg" name="ecg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="echo"
                                                        style="font-size: 16px;font-weight: 600;color: black;">ECHO
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder=" "
                                                            id="echo" name="echo">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <br>
                                <center>
                                    <h3><b>Ultrasound Findings</b></h3>
                                </center>
                                <br>

                                <!-- USG -->

                                <div class="row" style="border: solid 3px #ffb800;padding: 20px;">
                                    <div class="col-xl-12">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="fetus"
                                                        style="font-size: 16px;font-weight: 600;color: black;">No of Fetus
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6" id="fetus">
                                                        <select class="form-control" name="fetus">
                                                            <option value="">Please Select</option>
                                                            <option value="Single">Single </option>
                                                            <option value="Twins">Twins</option>
                                                            <option value="Multiple">Multiple</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="afi"
                                                        style="font-size: 16px;font-weight: 600;color: black;">AFI (
                                                        Amniotic Fluid Index)in cm
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6" id="afi">
                                                        <select class="form-control" name="afi">
                                                            <option value="">Please Select</option>
                                                            <option value="Normal">Normal </option>
                                                            <option value="Adequate">Adequate</option>
                                                            <option value="Just-Adequate">Just Adequate </option>
                                                            <option value="oligohydraminos">oligohydraminos </option>
                                                            <option value="Polyhydraminos">Polyhydraminos </option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">


                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="viability"style="font-size: 16px;font-weight: 600;color: black;">Viability
                                                        
                                                    </label>

                                                    <div class="col-lg-6" id="viability">
                                                        <select class="form-control" name="viability">
                                                            <option value="">Please Select</option>
                                                            <option value="Viable">Viable</option>
                                                            <option value="non-Viable">Non Viable</option>
                                                            <option value="IUD">IUD</option>


                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="fetus_place"style="font-size: 16px;font-weight: 600;color: black;">Place
                                                        of fetus 
                                                    </label>

                                                    <div class="col-lg-6" id="fetus_place">
                                                        <select class="form-control" name="fetus_place">
                                                            <option value="">Please Select</option>
                                                            <option value="Intra-uterine">Intra uterine </option>
                                                            <option value="Extra-uterine">Extra uterine</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="fetal_presentation"style="font-size: 16px;font-weight: 600;color: black;">Fetal
                                                        Presentation <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6" id="fetal_presentation">
                                                        <select class="form-control" name="fetal_presentation">
                                                            <option value="">Please Select</option>
                                                            <option value="Cephalic">Cephalic </option>
                                                            <option value="Breech">Breech</option>
                                                            <option value="Oblique">Oblique </option>
                                                            <option value="Transverse">Transverse</option>
                                                            <option value="unstable">unstable</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="crl"
                                                        style="font-size: 16px;font-weight: 600;color: black;">CRL (Crown Rump Length) in mm
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder=" "
                                                            id="crl" name="crl">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="bpd"
                                                        style="font-size: 16px;font-weight: 600;color: black;">BPD (Bi-
                                                        Parietal Diameter) in mm
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder=" "
                                                            id="bpd" name="bpd">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="placemental_position"style="font-size: 16px;font-weight: 600;color: black;">Placental
                                                        Position <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6" id="placemental_position">
                                                        <select class="form-control" name="placemental_position">
                                                            <option value="">Please Select</option>
                                                            <option value="Anterior">Anterior </option>
                                                            <option value="Posterior">Posterior</option>
                                                            <option value="Anterio-posterior">Anterio-posterior </option>
                                                            <option value="fundo-posterior">fundo-posterior</option>
                                                            <option value="Lowlying">Lowlying</option>
                                                            <option value="others">others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="an_mother_weight"
                                                        style="font-size: 16px;font-weight: 600;color: black;">HC (Head
                                                        circumference) in mm
                                                        
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder=" "
                                                            id="an_mother_weight" name="an_mother_weight">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="fetal_heart_rate_bpm"
                                                        style="font-size: 16px;font-weight: 600;color: black;">FHR (Fetal
                                                        Heart rate) bpm
                                                        
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder=" "
                                                            id="fetal_heart_rate_bpm" name="fetal_heart_rate_bpm">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="ac"
                                                        style="font-size: 16px;font-weight: 600;color: black;">AC
                                                        (Abdominal circumference) in mm
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder=" "
                                                            id="ac" name="ac">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="efw"
                                                        style="font-size: 16px;font-weight: 600;color: black;">EFW
                                                        (Estimated Fetal weight) in gms
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder=" "
                                                            id="efw" name="efw">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="femur"
                                                        style="font-size: 16px;font-weight: 600;color: black;">FL (Femur
                                                        Length) in mm
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder=" "
                                                            id="femur" name="femur">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="gestational_age"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Gestational
                                                        Age (in Weeks)
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control"
                                                            placeholder="eg: 32weeks 10days" id="gestational_age"
                                                            name="gestational_age">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <br>
                                <center>
                                    <h3><b> Per Abdomen Findings</b></h3>
                                </center>
                                <br>

                                <!-- Clinical Findings Per Abdomen  -->

                                <div class="row" style="border: solid 3px #ffb800;padding: 20px;">
                                    <div class="col-xl-12">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="fundal_size"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Height of
                                                        the uterus (in Weeks)
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder=" "
                                                            id="fundal_size" name="fundal_size">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="foetal_heart_rate"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Fetal Heart
                                                        Rate (FHR per min)
                                                        
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder=" "
                                                            id="foetal_heart_rate" name="foetal_heart_rate">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="surgical_scar"style="font-size: 16px;font-weight: 600;color: black;">Previous
                                                        Surgical Scar <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6" id="surgical_scar">
                                                        <select class="form-control" name="surgical_scar">
                                                            <option value="">Please Select</option>
                                                            <option value="Present">Present</option>
                                                            <option value="Absent">Absent</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="head"style="font-size: 16px;font-weight: 600;color: black;">Head Engagement
                                                        <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="head" name="head">
                                                            <option value="">Please Select</option>
                                                            <option value="Engaged">Engaged </option>
                                                            <option value="Unengaged">Unengaged</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="abdomen_other"style="font-size: 16px;font-weight: 600;color: black;">Others
                                                    </label>
                                                <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder=" "
                                                            id="abdomen_other" name="abdomen_other">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="abdominal_fetal_presentation"style="font-size: 16px;font-weight: 600;color: black;">Fetal
                                                        Presentation <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="abdominal_fetal_presentation"
                                                            name="abdominal_fetal_presentation">
                                                            <option value="">Please Select</option>
                                                            <option value="Cephalic">Cephalic </option>
                                                            <option value="Breech">Breech </option>
                                                            <option value="longitudinal">longitudinal</option>


                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                </div>
                                <br>
                                <center>
                                    <h3><b>Treatment</b></h3>
                                </center>
                                <br>
                                <!-- Treatment  -->

                                <div class="row" style="border: solid 3px #ffb800;padding: 20px;">
                                    <div class="col-xl-12">


                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="tt_dose"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Td Dose
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder=" "
                                                            id="tt_dose" name="tt_dose">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="tt_date"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Td Date

                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="date" class="form-control" placeholder=" "
                                                            id="tt_date" name="tt_date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="fa_tablet"
                                                        style="font-size: 16px;font-weight: 600;color: black;">FA Tablet
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder=" "
                                                            id="fa_tablet" name="fa_tablet">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="fa_date"
                                                        style="font-size: 16px;font-weight: 600;color: black;">FA Date

                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="date" class="form-control" placeholder=" "
                                                            id="fa_date" name="fa_date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="ifa_tablet"
                                                        style="font-size: 16px;font-weight: 600;color: black;">IFA Tablet
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder=" "
                                                            id="ifa_tablet" name="ifa_tablet">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="ifa_date"
                                                        style="font-size: 16px;font-weight: 600;color: black;">IFA Date

                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="date" class="form-control" placeholder=" "
                                                            id="ifa_date" name="ifa_date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="calcium_tablet"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Calcium+D3
                                                        Tablet
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder=" "
                                                            id="calcium_tablet" name="calcium_tablet">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="calcium_date"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Calcium+D3
                                                        Date

                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="date" class="form-control" placeholder=" "
                                                            id="calcium_date" name="calcium_date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="albendazole_date"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Albendazole
                                                        Date

                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="date" class="form-control" placeholder=" "
                                                            id="albendazole_date" name="albendazole_date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="other_drug"style="font-size: 16px;font-weight: 600;color: black;">Others
                                                        drugs <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="other_drug" name="other_drug">
                                                            <option value="">Please Select</option>
                                                            <option value="Lobetolol">Lobetolol </option>
                                                            <option value="Aspirin-75">Aspirin 75</option>
                                                            <option value="Deriphylline">Deriphylline </option>
                                                            <option value="Anti-epileptic">Anti epileptic </option>
                                                            <option value="Anti-diabetic">Anti diabetic </option>
                                                            <option value="Anti-Hypertensive">Anti- Hypertensive </option>
                                                            <option value="Thyroid">Thyroid </option>
                                                            <option value="others">others </option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="parentral_iron"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Parentral
                                                        Iron

                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="date" class="form-control" placeholder=" "
                                                            id="parentral_iron" name="parentral_iron">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="iron_dose"style="font-size: 16px;font-weight: 600;color: black;">Inj.Iron
                                                        sucrose in doses <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="iron_dose" name="iron_dose">
                                                            <option value="">Please Select</option>
                                                            <option value="4 doses">4 doses</option>
                                                            <option value="6 doses">6 doses</option>
                                                            <option value="10 doses">10 doses</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="blood_transfusion"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Blood
                                                        transfusion (no of Units)

                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder=" "
                                                            id="blood_transfusion" name="blood_transfusion">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="pregnancy_week"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Blood Transfusion (Wks of
                                                        Pregnancy)
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder=" "
                                                            id="pregnancy_week" name="pregnancy_week">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="pregnancy_date"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Date

                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="date" class="form-control" placeholder=" "
                                                            id="pregnancy_date" name="pregnancy_date">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                </div>
                                <br>
                                <center>
                                    <h3><b>Diagnosis</b></h3>
                                </center>
                                <br>
                                <!-- Diagnosis  -->

                                <div class="row" style="border: solid 3px #ffb800;padding: 20px;">
                                    <div class="col-xl-12">


                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label text-danger" for="high_risk"
                                                        style="font-size: 16px;font-weight: 600;color: black;"> High Risk Category
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="high_risk" name="high_risk">
                                                            <option value="">Select</option>
                                                            @foreach ($high_risks as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <!--<div class="col-xl-6">-->
                                            <!--    <div class="form-group row">-->
                                            <!--        <label class="col-lg-4 col-form-label"-->
                                            <!--            for="post_partum"style="font-size: 16px;font-weight: 600;color: black;">Post-Partum-->
                                            <!--            Method of Contraception <span class="text-danger">*</span>-->
                                            <!--        </label>-->

                                            <!--        <div class="col-lg-6">-->
                                            <!--            <select class="form-control" id="post_partum" name="post_partum">-->
                                            <!--                <option value="">Please Select</option>-->
                                            <!--                <option value="Permanent ">Permanent </option>-->
                                            <!--                <option value="temporary">temporary</option>-->
                                            <!--                <option value="Male-sterilization-NSV">Male sterilization-NSV-->
                                            <!--                </option>-->
                                            <!--                <option value="Female-sterilization">Female sterilization-->
                                            <!--                </option>-->
                                            <!--                <option value="PS">PS</option>-->
                                            <!--                <option value="LS">LS </option>-->
                                            <!--                <option value="TAT">TAT </option>-->
                                            <!--                <option value="PPIUCD">PPIUCD</option>-->
                                            <!--                <option value="IUCD">IUCD</option>-->
                                            <!--                <option value="Inj.Anthara ">Inj.Anthara </option>-->
                                            <!--                <option value="tab.chaya ">tab.chaya </option>-->
                                            <!--                <option value="Condem ">Condem </option>-->

                                            <!--            </select>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="referral_date"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Referral
                                                        Date
                                                        
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="date" class="form-control" id="referral_date"
                                                            name="referral_date">
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="referral_reason"style="font-size: 16px;font-weight: 600;color: black;">Reason For Referral
                                                         <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="referral_reason" name="referral_reason">
                                                            <option value="">Please Select</option>
                                                            <option value="Expert Opinion ">Expert Opinion </option>
                                                            <option value="">Admission and Management at Higher Centre </option>
                                                            <option value="">Delivery at Higher Centre
                                                            </option>
                                                            <option value="">Others
                                                            </option>
                                                            <option value="">No Referral
                                                            </option>
                                                             

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="referral_facility"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Type of
                                                        facility
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="referral_facility"
                                                            name="referral_facility">
                                                            <option value="">Select </option>
                                                            @foreach ($hospital_types as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ @$delivery_place->hospital_type_id == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="suggested_place"style="font-size: 16px;font-weight: 600;color: black;">Suggested
                                                        place of delivery/Referral facility
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="suggested_place"
                                                            name="suggested_place">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                </div>

                                <hr>
                                <div class="offset-xl-6 col-xl-6">
                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <button type="submit" value="save" name="submit_btn"
                                                class="btn btn-primary">Save</button>
                                            {{-- <button type="submit" value="continue" name="submit_btn"
                                                class="btn btn-primary">Save & Continue</button> --}}
                                        </div>
                                    </div>
                                </div>
                                {{-- all inputs --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
            <!--------
        
        <p class="text-danger">Old</p>
        <!-- row -->
        <!-- 
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header" style="background-color: #ffb800;">
                        <h4 class="card-title">General Details</h4>
                    </div>
                    <div class="card-body" style="border: solid 3px #ffb800;padding: 20px;">
                        <div class="form-validation">
                            <form class="mother-visit-form"
                                action="{{ url('patient/an-mother-visit/' . $patient->id) }}" method="POST">
                                @csrf
                                {{-- all inputs --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="visit_type">First Choose
                                    </label>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-0">
                                            <label class="radio-inline mr-3"><input type="radio" name="visit_type"
                                                    value="resident" checked>
                                                Resident Mother</label>
                                            <label class="radio-inline mr-3"><input type="radio" name="visit_type"
                                                    value="visitor">
                                                Visitor Mother</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="rch_id"
                                                style="font-size: 16px;font-weight: 600;color: black;">RCH ID
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control readonly" id="rch_id"
                                                    name="rch_id" value="{{ $patient->rch_id }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6" style="display: none !important;">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label"
                                                for="rch_number"style="font-size: 16px;font-weight: 600;color: black;">SL.
                                                No of RCH Register
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="rch_number"
                                                    name="rch_number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label"
                                                for="an_reg_date"style="font-size: 16px;font-weight: 600;color: black;">Date
                                                of AN
                                                Registration
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="an_reg_date"
                                                    name="an_reg_date" value="{{ $patient->an_reg_date }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label"
                                                for="financial_year"style="font-size: 16px;font-weight: 600;color: black;">Financial
                                                Year
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control readonly"
                                                    id="financial_year" name="financial_year"
                                                    placeholder="YYYY - YYYY" value="{{ $patient->financial_year }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label"
                                                for="an_visit_mother_name"style="font-size: 16px;font-weight: 600;color: black;">AN
                                                Visit
                                                Mother Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="an_visit_mother_name"
                                                    name="an_visit_mother_name" value="{{ $patient->an_mother }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label"
                                                for="lmp_date"style="font-size: 16px;font-weight: 600;color: black;">LMP
                                                Date
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="lmp_date"
                                                    name="lmp_date" value="{{ @$mother_medical->lmp_date }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label"
                                                for="edd_date"style="font-size: 16px;font-weight: 600;color: black;">EDD
                                                Date<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="edd_date"
                                                    placeholder="YYYY-MM-DD" name="edd_date"
                                                    value="{{ @$mother_medical->edd_date }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label"
                                                for="within_pregnancy_week"style="font-size: 16px;font-weight: 600;color: black;">Physically
                                                present during the Visit
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="within_pregnancy_week"
                                                    name="within_pregnancy_week">
                                                    <option value="">Please Select</option>
                                                    <option value="yes">
                                                        Yes</option>
                                                    <option value="no">
                                                        No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label"
                                                for="district"style="font-size: 16px;font-weight: 600;color: black;">District
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="district" name="district">
                                                    <option value="">Select </option>
                                                    @foreach ($districts as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label"
                                                for="checkup_place"style="font-size: 16px;font-weight: 600;color: black;">Facility/Place/Site
                                                of ANC Checkup
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="checkup_place" name="checkup_place">
                                                    <option value="">Select</option>
                                                    @foreach ($mother_checkups as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label"
                                                for="place_name"style="font-size: 16px;font-weight: 600;color: black;">Place
                                                Name
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="place_name"
                                                    name="place_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label"
                                                for="mother_blood"style="font-size: 16px;font-weight: 600;color: black;">Blood
                                                Group Of Mother
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-3">
                                                <select class="form-control" id="mother_blood"
                                                    name="mother_blood_grp_status">
                                                    <option value="Done">
                                                        Done
                                                    </option>
                                                    <option value="Not Done">
                                                        Not Done</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-3" id="blood_grp">
                                                <select class="form-control" id="blood_grp" name="blood_grp">
                                                    <option value="">Please Select</option>
                                                    <option value="A+ve">A+ve</option>
                                                    <option value="B+ve">B+ve</option>
                                                    <option value="AB+ve">AB+ve</option>
                                                    <option value="O+ve">O+ve</option>
                                                    <option value="A-ve">A-ve</option>
                                                    <option value="B-ve">B-ve</option>
                                                    <option value="AB-ve">AB-ve</option>
                                                    <option value="O-ve">O-ve</option>
                                                    <option value="A1+ve">A1+ve</option>
                                                    <option value="A1-ve">A1-ve</option>
                                                    <option value="Not Known">Not Known</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label"
                                                for="hbsag_status"style="font-size: 16px;font-weight: 600;color: black;">HBsAg
                                                Status
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-0">
                                                    <label class="radio-inline mr-3"><input type="radio"
                                                            name="hbsag_status" value="positive">
                                                        Positive</label>
                                                    <label class="radio-inline mr-3"><input type="radio"
                                                            name="hbsag_status" value="negative">
                                                        Negative</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <center>
                                    <h3><b>Visit Details</b></h3>
                                </center>


                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row d-none">
                                            <label class="col-lg-4 col-form-label"
                                                for="abortion_if_any"style="font-size: 16px;font-weight: 600;color: black;">Abortion
                                                id Any
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="abortion_if_any"
                                                    name="abortion_if_any">
                                                    <option value="">Select</option>
                                                    <option value="yes">
                                                        Yes
                                                    </option>
                                                    <option value="no" selected>
                                                        No</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6" id="week_preg_div">
                                        <div class="form-group row">
                                            <label class="col-lg-12 col-form-label text-danger"
                                                for=""style="font-size: 16px;font-weight: 600;color: black;">Note:
                                                Week of
                                                pregnancy should be less than 28
                                            </label>
                                        </div>
                                    </div>

                                </div>


                                <div class="row" id="ab_date_div">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label"
                                                for="abortion_date"style="font-size: 16px;font-weight: 600;color: black;">Abortion
                                                Date
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="abortion_date"
                                                    name="abortion_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="abortion_type"
                                                style="font-size: 16px;font-weight: 600;color: black;">Abortion Type
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="abortion_type" name="abortion_type">
                                                    <option value="Induced">
                                                        Induced</option>
                                                    <option value="Spontaneous">
                                                        Spontaneous</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>




                                <div class="row" id="dist_faci_div">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="abortion_district"
                                                style="font-size: 16px;font-weight: 600;color: black;">Distric
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="abortion_district"
                                                    name="abortion_district">
                                                    <option value="">Select </option>
                                                    @foreach ($districts as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="abortion_facility"
                                                style="font-size: 16px;font-weight: 600;color: black;">Facility
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-0">
                                                    <select class="form-control" id="abortion_facility"
                                                        name="abortion_facility">
                                                        <option value="">Select </option>
                                                        <option value="1">
                                                            select
                                                            1
                                                        </option>
                                                        <option value="2">
                                                            select
                                                            2
                                                        </option>
                                                        <option value="3">
                                                            select
                                                            3
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="week_preg_inp_div">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="abortion_pregnancy_week"
                                                style="font-size: 16px;font-weight: 600;color: black;">Week of
                                                Pregnancy
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control"
                                                    id="abortion_pregnancy_week" name="abortion_pregnancy_week">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="noAbortion">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="an_visit_date"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Date of AN
                                                    Visit
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="an_visit_date"
                                                        name="an_visit_date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="anc_period"
                                                    style="font-size: 16px;font-weight: 600;color: black;">ANC Period
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="anc_period"
                                                        name="anc_period">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="pregnancy_week"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Week of
                                                    Pregnancy
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="pregnancy_week"
                                                        name="pregnancy_week">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="an_mother_weight"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Weight of AN
                                                    Mother(in Kg)
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="number" class="form-control"
                                                        placeholder="Range 25 to 150" id="an_mother_weight"
                                                        name="an_mother_weight">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="bp_systolic"
                                                    style="font-size: 16px;font-weight: 600;color: black;">BP Systolic(MM
                                                    of
                                                    Hg)
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="number" class="form-control" id="bp_systolic"
                                                        name="bp_systolic" placeholder="Range 70 to 100">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="bp_diastolic"
                                                    style="font-size: 16px;font-weight: 600;color: black;">BP Diastolic(MM
                                                    of
                                                    Hg)
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="number" class="form-control" id="bp_diastolic"
                                                        name="bp_diastolic" placeholder="Range 40 to 100">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="hb"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Hb(gm%)
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="number" class="form-control" id="hb"
                                                        name="hb" placeholder="Range 3 to 18">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="urine_test"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Urine Test
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="urine_test" name="urine_test">
                                                        <option value="Done">
                                                            Done
                                                        </option>
                                                        <option value="Not Done">
                                                            Not Done</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6" id="urine_sugar_div">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="urine_sugar"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Urine
                                                    Sugar<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="urine_sugar" name="urine_sugar">
                                                        <option value="Absent">
                                                            Absent
                                                        </option>
                                                        <option value="Present">
                                                            Present</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="urine_albumin_div">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="urine_albumin"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Urine Albumin
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="urine_albumin"
                                                        name="urine_albumin">
                                                        <option value="">Select </option>
                                                        <option value="1">
                                                            Absent
                                                        </option>
                                                        <option value="2">
                                                            Present
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="blood_sugar_test"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Blood Sugar
                                                    Test
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="blood_sugar_test"
                                                        name="blood_sugar_test">
                                                        <option value="Done">
                                                            Done
                                                        </option>
                                                        <option value="Not Done">
                                                            Not Done</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6" id="fasting_div">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="fasting"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Fasting
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="number" class="form-control"
                                                        placeholder="Range 30 to 600" id="fasting" name="fasting">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="post_prandial_div">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="post_prandial"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Post
                                                    Prandial/RBS<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="number" class="form-control"
                                                        placeholder="Range 30 to 600" id="post_prandial"
                                                        name="post_prandial">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="gct"
                                                    style="font-size: 16px;font-weight: 600;color: black;">GCT Done
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="gct" name="gct">
                                                        <option value="Done">
                                                            Done
                                                        </option>
                                                        <option value="Not Done">
                                                            Not Done</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6" id="gct_value_div">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="gct_value"
                                                    style="font-size: 16px;font-weight: 600;color: black;">GCT value
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="number" class="form-control" id="gct_value"
                                                        name="gct_value">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="tt_dose"
                                                    style="font-size: 16px;font-weight: 600;color: black;">TT Dose
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="tt_dose" name="tt_dose">
                                                        <option value="TT1">
                                                            TT1
                                                        </option>
                                                        <option value="TT2">
                                                            TT2</option>
                                                        <option value="TT BOOSTER">
                                                            TT BOOSTER</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="tt_date"
                                                    style="font-size: 16px;font-weight: 600;color: black;">TT Date
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="tt_date"
                                                        name="tt_date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="albendazole_date"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Albendazole
                                                    Date
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="albendazole_date"
                                                        name="albendazole_date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="ifa_date"
                                                    style="font-size: 16px;font-weight: 600;color: black;">IFA Date
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="ifa_date"
                                                        name="ifa_date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="ifa_tablet"
                                                    style="font-size: 16px;font-weight: 600;color: black;">IFA Tablet
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="ifa_tablet"
                                                        name="ifa_tablet" placeholder="12-14 weeks">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="fa_date"
                                                    style="font-size: 16px;font-weight: 600;color: black;">FA Date
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="fa_date"
                                                        name="fa_date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="fa_tablet"
                                                    style="font-size: 16px;font-weight: 600;color: black;">FA Tablet
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="fa_tablet"
                                                        name="fa_tablet" placeholder="1-12 weeks">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="fundal_size"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Fundal
                                                    Height/Size
                                                    of
                                                    the uterus(in week)
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="number" class="form-control"
                                                        placeholder="with 42 weeks" id="fundal_size"
                                                        name="fundal_size">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="calcium_tablet"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Calcium Tablet
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="number" class="form-control"
                                                        placeholder="14 to 40 weeks" id="calcium_tablet"
                                                        name="calcium_tablet">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="offset-xl-6 col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="calcium_date"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Calcium Date
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="calcium_date"
                                                        name="calcium_date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="foetal_heart_rate"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Foetal Heart
                                                    rate(per min)
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="number" class="form-control"
                                                        placeholder="Range 70 to 200" id="foetal_heart_rate"
                                                        name="foetal_heart_rate">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="foetal_position"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Foetal
                                                    Presentation/Position
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="foetal_position"
                                                        name="foetal_position">
                                                        <option value="">Select</option>
                                                        <option value="Normal">
                                                            Normal
                                                        </option>
                                                        <option value="Abnormal">
                                                            Abnormal</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="foetal_movement"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Foetal
                                                    Movement
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="foetal_movement"
                                                        name="foetal_movement">
                                                        <option value="">Select</option>
                                                        <option value="Normal">
                                                            Normal
                                                        </option>
                                                        <option value="Increase">
                                                            Increase</option>
                                                        <option value="Decrease">
                                                            Decrease</option>
                                                        <option value="Absent">
                                                            Absent</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label text-danger" for="post_partum"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Post-Partum
                                                    Method of Contraception
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="post_partum" name="post_partum">
                                                        <option value="">Select</option>
                                                        @foreach ($post_partums as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-2">
                                                <label class="col-lg-4 col-form-label" for="partum_other"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Any Other
                                                    Specify
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="partum_other"
                                                        name="partum_other">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label text-danger" for="high_risk"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Symptoms
                                                    of
                                                    High Risk
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="high_risk" name="high_risk">
                                                        <option value="">Select</option>
                                                        @foreach ($high_risks as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="high_risk_other"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Any Other
                                                    Specify
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="high_risk_other"
                                                        name="high_risk_other">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="referral_date"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Referral Date
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="referral_date"
                                                        name="referral_date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="referral_district"
                                                    style="font-size: 16px;font-weight: 600;color: black;">District
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="referral_district"
                                                        name="referral_district">
                                                        <option value="">Select </option>
                                                        @foreach ($districts as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ @$delivery_place->district == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                        <option value="">Others </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="referral_facility"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Type of
                                                    Hospital
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="referral_facility"
                                                        name="referral_facility">
                                                        <option value="">Select </option>
                                                        @foreach ($hospital_types as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ @$delivery_place->hospital_type_id == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="referral_place"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Name of
                                                    Hospital
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="referral_place"
                                                        name="referral_place">
                                                        <option value="">Select </option>
                                                        @foreach ($hospitals as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ @$delivery_place->hospital_name == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <center>
                                        <h3><b>Ultrasonogram</b></h3>
                                    </center>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="ultrasonogram"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Ultrasonogram
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="ultrasonogram"
                                                        name="ultrasonogram">
                                                        <option value="">Select </option>
                                                        <option value="Yes">
                                                            Yes
                                                        </option>
                                                        <option value="No">
                                                            No
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6" id="ultrasonogram_date_div">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="ultrasonogram_date"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Ultrasonogram
                                                    Date
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="ultrasonogram_date"
                                                        name="ultrasonogram_date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="ultrasonogram_div">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="scan_edd"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Scan EDD
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="datepicker-default form-control"
                                                            id="scan_edd" name="scan_edd">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="trimester">Trimester
                                                        (1st/2nd/3rd)
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="trimester"
                                                            name="trimester">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="ultrasonogram_fundal_size"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Fundal
                                                        Height/Size of
                                                        the uterus(in week)
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control"
                                                            placeholder="with 42 weeks" id="ultrasonogram_fundal_size"
                                                            name="ultrasonogram_fundal_size">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="ultrasonogram__heart_rate"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Foetal
                                                        Heart
                                                        rate(per min)
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control"
                                                            placeholder="Range 70 to 200" id="ultrasonogram__heart_rate"
                                                            name="ultrasonogram__heart_rate">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="ultrasonogram_position"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Foetal
                                                        Presentation/Position
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="ultrasonogram_position"
                                                            name="ultrasonogram_position">
                                                            <option value="">Select</option>
                                                            <option value="Normal">
                                                                Normal
                                                            </option>
                                                            <option value="Abnormal">
                                                                Abnormal</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="ultrasonogram_movement"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Foetal
                                                        Movement
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="ultrasonogram_movement"
                                                            name="ultrasonogram_movement">
                                                            <option value="">Select</option>
                                                            <option value="Normal">
                                                                Normal
                                                            </option>
                                                            <option value="Increase">
                                                                Increase</option>
                                                            <option value="Decrease">
                                                                Decrease</option>
                                                            <option value="Absent">
                                                                Absent</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="remark"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Finding/Remarks
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="remark"
                                                            name="remark">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="result"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Result
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="result" name="result">
                                                            <option value="">Select </option>
                                                            <option value="1">
                                                                Normal
                                                            </option>
                                                            <option value="2">
                                                                UpNormal
                                                            </option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <center>
                                        <h3><b>HIV Test</b></h3>
                                    </center>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="wife_hiv_screening"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Wife
                                                    HIV Screen
                                                    Test
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="wife_hiv_screening"
                                                        name="wife_hiv_screening">
                                                        <option value="yes">
                                                            Yes</option>
                                                        <option value="no">
                                                            No
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="wife_hiv_screening_div">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="wife_hiv_screeing_date"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Date of HIV
                                                    Screening Test Conducted
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control"
                                                        id="wife_hiv_screeing_date" name="wife_hiv_screeing_date"
                                                        value="{{ @$mother_medical->wife_hiv_screeing_date }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="wife_hiv_screeing_result"
                                                    style="font-size: 16px;font-weight: 600;color: black;">HIV
                                                    Screeing Test Result
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="wife_hiv_screeing_result"
                                                        name="wife_hiv_screeing_result">
                                                        <option value="">Select </option>
                                                        <option value="positive"
                                                            {{ @$mother_medical->wife_hiv_screeing_result == 'positive' ? 'selected' : '' }}>
                                                            +ve</option>
                                                        <option value="negative"
                                                            {{ @$mother_medical->wife_hiv_screeing_result == 'negative' ? 'selected' : '' }}>
                                                            -ve</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="husband_hiv_screening"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Husband HIV
                                                    Screen
                                                    Test
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="husband_hiv_screening"
                                                        name="husband_hiv_screening">
                                                        <option value="yes">
                                                            Yes</option>
                                                        <option value="no">
                                                            No
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="husband_hiv_screening_div">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="husband_hiv_screeing_date"
                                                    style="font-size: 16px;font-weight: 600;color: black;">Date of
                                                    HIV
                                                    Screening Test Conducted
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control"
                                                        id="husband_hiv_screeing_date" name="husband_hiv_screeing_date"
                                                        value="{{ @$mother_medical->husband_hiv_screeing_date }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="husband_hiv_screeing_result"
                                                    style="font-size: 16px;font-weight: 600;color: black;">HIV
                                                    Screeing Test Result
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="husband_hiv_screeing_result"
                                                        name="husband_hiv_screeing_result">
                                                        <option value="">Select </option>
                                                        <option value="positive"
                                                            {{ @$mother_medical->husband_hiv_screeing_result == 'positive' ? 'selected' : '' }}>
                                                            +ve</option>
                                                        <option value="negative"
                                                            {{ @$mother_medical->husband_hiv_screeing_result == 'negative' ? 'selected' : '' }}>
                                                            -ve</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="is_vdrl_rpp"
                                                    style="font-size: 16px;font-weight: 600;color: black;">VDRL/RPP
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="is_vdrl_rpp" name="is_vdrl_rpp">
                                                        <option value="yes">
                                                            Done
                                                        </option>
                                                        <option value="no">
                                                            Not Done</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="vdrl_div">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="vdrl_date"
                                                    style="font-size: 16px;font-weight: 600;color: black;">VDRL Date
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="vdrl_date"
                                                        name="vdrl_date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="vdrl_result"
                                                    style="font-size: 16px;font-weight: 600;color: black;">VDRL Result
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="vdrl_result" name="vdrl_result">
                                                        <option value="Reactive">
                                                            Reactive</option>
                                                        <option value="Non-reactive">
                                                            Non-reactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="offset-xl-6 col-xl-6">
                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <button type="submit" value="save" name="submit_btn"
                                                class="btn btn-primary">Save</button>
                                            {{-- <button type="submit" value="continue" name="submit_btn"
                                                class="btn btn-primary">Save & Continue</button> --}}
                                        </div>
                                    </div>
                                </div>
                                {{-- all inputs --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        !----------------------------->
        <hr>
        <center>
            <h3><b>Visit Details</b></h3>
        </center>
        <div class="row">
            <div class="col-xl-12">
                <div class="table-responsive">
                    <table id="mother-visit-table" class="table table-striped patient-list mb-4 dataTablesCard fs-14">
                        <thead>
                            <tr>
                                <th>
                                    <div class="checkbox text-right align-self-center">
                                        <div class="custom-control custom-checkbox ">
                                            <input type="checkbox" class="custom-control-input" id="checkAll"
                                                required="">
                                            <label class="custom-control-label" for="checkAll"></label>
                                        </div>
                                    </div>
                                </th>
                                <th>Mother ID</th>
                                <th>Visit Type</th>
                                <th>Mother Name</th>
                                <th>Financial Year</th>
                                <th>Remark</th>
                                <th>Result</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
