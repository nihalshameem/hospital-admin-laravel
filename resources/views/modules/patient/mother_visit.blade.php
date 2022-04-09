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


        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">General Details</h4>
                    </div>
                    <div class="card-body">
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
                                <div class="row">

                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="rch_id">RCH ID
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="rch_id" name="rch_id"
                                                    value="{{ $patient->rch_id }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="rch_number">SL. No of RCH Register
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="rch_number" name="rch_number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="an_reg_date">Date of AN
                                                Registration
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="datepicker-default form-control" id="an_reg_date"
                                                    name="an_reg_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="financial_year">Financial Year
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="financial_year"
                                                    name="financial_year" placeholder="YYYY - YYYY">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="an_visit_mother_name">AN Visit
                                                Mother Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="an_visit_mother_name"
                                                    name="an_visit_mother_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="lmp_date">LMP Date
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="datepicker-default form-control" id="lmp_date">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="edd_date">EDD Date<span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="datepicker-default form-control" id="edd_date"
                                                    name="edd_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="within_pregnancy_week">Physically
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
                                            <label class="col-lg-4 col-form-label" for="district">District
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
                                            <label class="col-lg-4 col-form-label" for="checkup_place">Facility/Place/Site
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
                                            <label class="col-lg-4 col-form-label" for="place_name">Place Name
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="place_name" name="place_name">
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
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="abortion_if_any">Abortion id Any
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="abortion_if_any" name="abortion_if_any">
                                                    <option value="">Select</option>
                                                    <option value="yes">
                                                        Yes
                                                    </option>
                                                    <option value="no">
                                                        No</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6" id="week_preg_div">
                                        <div class="form-group row">
                                            <label class="col-lg-12 col-form-label text-danger" for="">Note: Week of
                                                pregnancy should be less than 28
                                            </label>
                                        </div>
                                    </div>

                                </div>


                                <div class="row" id="ab_date_div">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="abortion_date">Abortion Date
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="datepicker-default form-control"
                                                    id="abortion_date" name="abortion_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="abortion_type">Abortion Type
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
                                            <label class="col-lg-4 col-form-label" for="abortion_district">Distric
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
                                            <label class="col-lg-4 col-form-label" for="abortion_facility">Facility
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
                                            <label class="col-lg-4 col-form-label" for="abortion_pregnancy_week">Week of
                                                Pregnancy
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="abortion_pregnancy_week"
                                                    name="abortion_pregnancy_week">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="an_visit_date">Date of AN Visit
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="datepicker-default form-control"
                                                    id="an_visit_date" name="an_visit_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="anc_period">ANC Period
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
                                            <label class="col-lg-4 col-form-label" for="pregnancy_week">Week of Pregnancy
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
                                            <label class="col-lg-4 col-form-label" for="an_mother_weight">Weight of AN
                                                Mother(in Kg)
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" placeholder="Range 25 to 150"
                                                    id="an_mother_weight" name="an_mother_weight">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="bp_systolic">BP Systolic(MM of Hg)
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
                                            <label class="col-lg-4 col-form-label" for="bp_diastolic">BP Diastolic(MM of
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
                                            <label class="col-lg-4 col-form-label" for="hb">Hb(gm%)
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="hb" name="hb"
                                                    placeholder="Range 3 to 18">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="urine_test">Urine Test
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
                                            <label class="col-lg-4 col-form-label" for="urine_sugar">Urine Sugar<span
                                                    class="text-danger">*</span>
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
                                            <label class="col-lg-4 col-form-label" for="urine_albumin">Urine Albumin
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="urine_albumin" name="urine_albumin">
                                                    <option value="">Select </option>
                                                    <option value="1">
                                                        select 1
                                                    </option>
                                                    <option value="2">
                                                        select 2
                                                    </option>
                                                    <option value="3">
                                                        select 3
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="blood_sugar_test">Blood Sugar Test
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
                                            <label class="col-lg-4 col-form-label" for="fasting">Fasting
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" placeholder="Range 30 to 600"
                                                    id="fasting" name="fasting">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="post_prandial_div">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="post_prandial">Post
                                                Prandial/RBS<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" placeholder="Range 30 to 600"
                                                    id="post_prandial" name="post_prandial">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="gct">GCT Done
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
                                            <label class="col-lg-4 col-form-label" for="gct_value">GCT value
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
                                            <label class="col-lg-4 col-form-label" for="tt_dose">TT Dose
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
                                            <label class="col-lg-4 col-form-label" for="tt_date">TT Date
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="datepicker-default form-control" id="tt_date"
                                                    name="tt_date">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="albendazole_date">Albendazole Date
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="datepicker-default form-control"
                                                    id="albendazole_date" name="albendazole_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="ifa_date">IFA Date
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="datepicker-default form-control" id="ifa_date"
                                                    name="ifa_date">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="fundal_size">Fundal Height/Size of
                                                the uterus(in week)
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" placeholder="with 42 weeks"
                                                    id="fundal_size" name="fundal_size">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="calcium_tablet">Calcium Tablet
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" placeholder="14 to 40 weeks"
                                                    id="calcium_tablet" name="calcium_tablet">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="offset-xl-6 col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="calcium_date">Calcium Date
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="datepicker-default form-control"
                                                    id="calcium_date" name="calcium_date">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="foetal_heart_rate">Foetal Heart
                                                rate(per min)
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" placeholder="Range 70 to 200"
                                                    id="foetal_heart_rate" name="foetal_heart_rate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="foetal_position">Foetal
                                                Presentation/Position
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="foetal_position" name="foetal_position">
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
                                            <label class="col-lg-4 col-form-label" for="foetal_movement">Foetal
                                                Movement
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="foetal_movement" name="foetal_movement">
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
                                            <label class="col-lg-4 col-form-label text-danger"
                                                for="post_partum">Post-Partum
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
                                            <label class="col-lg-4 col-form-label" for="partum_other">Any Other
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
                                            <label class="col-lg-4 col-form-label text-danger" for="high_risk">Symptoms of
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
                                            <label class="col-lg-4 col-form-label" for="high_risk_other">Any Other Specify
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
                                            <label class="col-lg-4 col-form-label" for="referral_date">Referral Date
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="datepicker-default form-control"
                                                    id="referral_date" name="referral_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="referral_district">District
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="referral_district"
                                                    name="referral_district">
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
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="referral_facility">Referral
                                                Facility
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="referral_facility"
                                                    name="referral_facility">
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
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="referral_place">Referral Place
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="referral_place"
                                                    name="referral_place">
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
                                            <label class="col-lg-4 col-form-label" for="ultrasonogram">Ultrasonogram
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="ultrasonogram" name="ultrasonogram">
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
                                            <label class="col-lg-4 col-form-label" for="ultrasonogram_date">Ultrasonogram
                                                Date
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="datepicker-default form-control"
                                                    id="ultrasonogram_date" name="ultrasonogram_date">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="ultrasonogram_div">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="scan_edd">Scan EDD
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
                                                    for="ultrasonogram_fundal_size">Fundal
                                                    Height/Size of
                                                    the uterus(in week)
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="number" class="form-control" placeholder="with 42 weeks"
                                                        id="ultrasonogram_fundal_size" name="ultrasonogram_fundal_size">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label"
                                                    for="ultrasonogram__heart_rate">Foetal
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
                                                <label class="col-lg-4 col-form-label" for="ultrasonogram_position">Foetal
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
                                                <label class="col-lg-4 col-form-label" for="ultrasonogram_movement">Foetal
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
                                                <label class="col-lg-4 col-form-label" for="remark">Finding/Remarks
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="remark" name="remark">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="result">Result
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="result" name="result">
                                                        <option value="">Select </option>
                                                        <option value="1">
                                                            select 1
                                                        </option>
                                                        <option value="2">
                                                            select 2
                                                        </option>
                                                        <option value="3">
                                                            select 3
                                                        </option>
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
                                            <input type="checkbox" class="custom-control-input" id="checkAll" required="">
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
