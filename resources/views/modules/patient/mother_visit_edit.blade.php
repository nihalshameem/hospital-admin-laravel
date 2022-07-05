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
                            <form class="mother-visit-form"
                                action="{{ url('patient/mother-visit/edit/' . $mother_visit->id) }}" method="POST">
                                @csrf
                                {{-- all inputs --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="visit_type">First Choose
                                    </label>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-0">
                                            <label class="radio-inline mr-3"><input type="radio" name="visit_type"
                                                    value="resident" {{ @$mother_visit->visit_type === 'resident' ? 'checked' : '' }}>
                                                Resident Mother</label>
                                            <label class="radio-inline mr-3"><input type="radio" name="visit_type"
                                                    value="visitor" {{ @$mother_visit->visit_type === 'visitor' ? 'checked' : '' }}>
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
                                                        <input type="text" class="datepicker-default form-control" id="lmp_date"
                                                            name="lmp_date" value="{{ @$mother_visit->lmp_date }}">
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
                                                        <input type="text" class="datepicker-default form-control" id="edd_date"
                                                            placeholder="YYYY-MM-DD" name="edd_date"
                                                            value="{{ @$mother_visit->edd_date }}">
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
                                                                <option value="{{ $item->id }}"
                                                                    {{ $mother_visit->checkup_place === $item->id ? 'selected' : '' }}>
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
                                                            name="place_name" value="{{ @$mother_visit->place_name }}">
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
                                                            <option value="A+ve"
                                                                {{ @$mother_visit->blood_grp === 'A+ve' ? 'selected' : '' }}>
                                                                A+ve</option>
                                                            <option value="B+ve"
                                                                {{ @$mother_visit->blood_grp === 'B+ve' ? 'selected' : '' }}>
                                                                B+ve</option>
                                                            <option value="AB+ve"
                                                                {{ @$mother_visit->blood_grp === 'AB+ve' ? 'selected' : '' }}>
                                                                AB+ve</option>
                                                            <option value="O+ve"
                                                                {{ @$mother_visit->blood_grp === 'O+ve' ? 'selected' : '' }}>
                                                                O+ve</option>
                                                            <option value="A-ve"
                                                                {{ @$mother_visit->blood_grp === 'A-ve' ? 'selected' : '' }}>
                                                                A-ve</option>
                                                            <option value="B-ve"
                                                                {{ @$mother_visit->blood_grp === 'B-ve' ? 'selected' : '' }}>
                                                                B-ve</option>
                                                            <option value="AB-ve"
                                                                {{ @$mother_visit->blood_grp === 'AB-ve' ? 'selected' : '' }}>
                                                                AB-ve</option>
                                                            <option value="O-ve"
                                                                {{ @$mother_visit->blood_grp === 'O-ve' ? 'selected' : '' }}>
                                                                O-ve</option>
                                                            <option value="A1+ve"
                                                                {{ @$mother_visit->blood_grp === 'A1+ve' ? 'selected' : '' }}>
                                                                A1+ve</option>
                                                            <option value="A1-ve"
                                                                {{ @$mother_visit->blood_grp === 'A1-ve' ? 'selected' : '' }}>
                                                                A1-ve</option>
                                                            <option value="Not Known"
                                                                {{ @$mother_visit->blood_grp === 'Not Known' ? 'selected' : '' }}>
                                                                Not Known</option>
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
                                                            <option value="yes"
                                                                {{ @$mother_visit->wife_hiv_screening === 'yes' ? 'selected' : '' }}>
                                                                Yes</option>
                                                            <option value="no"
                                                                {{ @$mother_visit->wife_hiv_screening === 'no' ? 'selected' : '' }}>
                                                                No
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="wife_hiv_screeing_date"style="font-size: 16px;font-weight: 600;color: black;">Date
                                                        Of Tested
                                                        <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6">
                                                        <input type="date" class="form-control"
                                                            id="wife_hiv_screeing_date" name="wife_hiv_screeing_date"
                                                            value="{{ @$mother_visit->wife_hiv_screening_date }}">
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
                                                            <option value="yes"
                                                                {{ @$mother_visit->husband_hiv_screening === 'yes' ? 'selected' : '' }}>
                                                                Yes</option>
                                                            <option value="no"
                                                                {{ @$mother_visit->husband_hiv_screening === 'no' ? 'selected' : '' }}>
                                                                No
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="husband_hiv_screeing_date"style="font-size: 16px;font-weight: 600;color: black;">Date
                                                        Of Tested
                                                        <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6">
                                                        <input type="date" class="form-control"
                                                            id="husband_hiv_screeing_date"
                                                            name="husband_hiv_screeing_date"
                                                            value="{{ @$mother_visit->husband_hiv_screening_date }}">
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
                                                        <select class="form-control" id="is_vdrl_rpp" name="is_vdrl_rpp">
                                                            <option value="yes"
                                                                {{ @$mother_visit->is_vdrl_rpp === 'yes' ? 'selected' : '' }}>
                                                                Yes</option>
                                                            <option value="no"
                                                                {{ @$mother_visit->is_vdrl_rpp === 'no' ? 'selected' : '' }}>
                                                                No
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="vdrl_date"style="font-size: 16px;font-weight: 600;color: black;">Date
                                                        Of Tested
                                                        <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6">
                                                        <input type="date" class="form-control" id="vdrl_date"
                                                            name="vdrl_date" value="{{ @$mother_visit->vdrl_date }}">
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
                                                            <option value="yes"
                                                                {{ @$mother_visit->husband_vdrl_status === 'yes' ? 'selected' : '' }}>
                                                                Yes</option>
                                                            <option value="no"
                                                                {{ @$mother_visit->husband_vdrl_status === 'no' ? 'selected' : '' }}>
                                                                No
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="husband_vdrl_date"style="font-size: 16px;font-weight: 600;color: black;">Date
                                                        Of Tested
                                                        <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6">
                                                        <input type="date" class="form-control" id="husband_vdrl_date"
                                                            name="husband_vdrl_date"
                                                            value="{{ @$mother_visit->husband_vdrl_date }}">
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
                                                                    name="hbsag_status" value="positive"
                                                                    {{ @$mother_visit->hbsag_status === 'positive' ? 'checked' : '' }}>
                                                                Positive</label>
                                                            <label class="radio-inline mr-3"><input type="radio"
                                                                    name="hbsag_status" value="negative"
                                                                    {{ @$mother_visit->hbsag_status === 'negative' ? 'checked' : '' }}>
                                                                Negative</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="hbsag_date"style="font-size: 16px;font-weight: 600;color: black;">Date
                                                        Of Tested
                                                        <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6">
                                                        <input type="date" class="form-control" id="hbsag_date"
                                                            name="hbsag_date" value="{{ @$mother_visit->hbsag_date }}">
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
                                                            name="an_visit_date"
                                                            value="{{ @$mother_visit->an_visit_date }}">
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
                                                            name="today" value="{{ @$mother_visit->today }}">
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="pregnancy_week"style="font-size: 16px;font-weight: 600;color: black;">Completed
                                                        Weeks
                                                        of Pregancy <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6">
                                                        <input type="number" placeholder="" class="form-control"
                                                            min="1" max="23" id="pregnancy_week"
                                                            name="pregnancy_week"
                                                            value="{{ @$mother_visit->pregnancy_week }}">
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
                                                            <option value="Nill"
                                                                {{ @$mother_visit->urine_albumin === 'Nill' ? 'selected' : '' }}>
                                                                Nill</option>
                                                            <option value="+"
                                                                {{ @$mother_visit->urine_albumin === '+' ? 'selected' : '' }}>
                                                                +
                                                            </option>
                                                            <option value="++"
                                                                {{ @$mother_visit->urine_albumin === '++' ? 'selected' : '' }}>
                                                                ++</option>
                                                            <option value="+++"
                                                                {{ @$mother_visit->urine_albumin === '+++' ? 'selected' : '' }}>
                                                                +++</option>
                                                            <option value="++++"
                                                                {{ @$mother_visit->urine_albumin === '++++' ? 'selected' : '' }}>
                                                                ++++</option>

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
                                                            id="an_mother_weight" name="an_mother_weight"
                                                            value="{{ @$mother_visit->an_mother_weight }}">
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
                                                            <option value="Nill"
                                                                {{ @$mother_visit->urine_sugar === 'Nill' ? 'selected' : '' }}>
                                                                Nill
                                                            </option>
                                                            <option value="+"
                                                                {{ @$mother_visit->urine_sugar === '+' ? 'selected' : '' }}>
                                                                +
                                                            </option>
                                                            <option value="++"
                                                                {{ @$mother_visit->urine_sugar === '++' ? 'selected' : '' }}>
                                                                ++
                                                            </option>
                                                            <option value="+++"
                                                                {{ @$mother_visit->urine_sugar === '+++' ? 'selected' : '' }}>
                                                                +++
                                                            </option>
                                                            <option value="++++"
                                                                {{ @$mother_visit->urine_sugar === '++++' ? 'selected' : '' }}>
                                                                ++++
                                                            </option>

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
                                                            placeholder="eg: 120/150" id="bp" name="bp"
                                                            value="{{ @$mother_visit->bp }}">
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
                                                            id="rbs" name="rbs"
                                                            value="{{ @$mother_visit->rbs }}">
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
                                                        <input type="number" class="form-control" placeholder=""
                                                            id="hb" name="hb"
                                                            value="{{ @$mother_visit->hb }}">
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
                                                        <input type="number" class="form-control" placeholder=""
                                                            id="fasting" name="fasting"
                                                            value="{{ @$mother_visit->fasting }}">
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
                                            <!--                id="severe" name="severe" value="{{ @$mother_visit->severe }}">-->
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
                                                        <input type="number" class="form-control" placeholder=""
                                                            id="post_prandial" name="post_prandial"
                                                            value="{{ @$mother_visit->post_prandial }}">
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
                                                            id="gct_value" name="gct_value"
                                                            value="{{ @$mother_visit->gct_value }}">
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
                                                            <option value="Thyroid-Function-test"
                                                                {{ @$mother_visit->other === 'Thyroid-Function-test' ? 'selected' : '' }}>
                                                                Thyroid Function test
                                                            </option>
                                                            <option value="OGTT"
                                                                {{ @$mother_visit->other === 'OGTT' ? 'selected' : '' }}>
                                                                OGTT
                                                            </option>
                                                            <option value="ECG"
                                                                {{ @$mother_visit->other === 'ECG' ? 'selected' : '' }}>
                                                                ECG
                                                            </option>
                                                            <option value="ECHO"
                                                                {{ @$mother_visit->other === 'ECHO' ? 'selected' : '' }}>
                                                                ECHO
                                                            </option>


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
                                                            <option value="T3"
                                                                {{ @$mother_visit->thyroid === 'T3' ? 'selected' : '' }}>
                                                                T3
                                                            </option>
                                                            <option value="T4"
                                                                {{ @$mother_visit->thyroid === 'T4' ? 'selected' : '' }}>
                                                                T4
                                                            </option>
                                                            <option value="TSH"
                                                                {{ @$mother_visit->thyroid === 'TSH' ? 'selected' : '' }}>
                                                                TSH
                                                            </option>
                                                            <option value="free-TSH"
                                                                {{ @$mother_visit->thyroid === 'free-TSH' ? 'selected' : '' }}>
                                                                Free TSH</option>
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
                                                            id="ogtt" name="ogtt"
                                                            value="{{ @$mother_visit->ogtt }}">
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
                                                            id="ecg" name="ecg"
                                                            value="{{ @$mother_visit->ecg }}">
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
                                                            id="echo" name="echo"
                                                            value="{{ @$mother_visit->echo }}">
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
                                                            <option value="Single"
                                                                {{ @$mother_visit->fetus === 'Single' ? 'selected' : '' }}>
                                                                Single </option>
                                                            <option value="Twins"
                                                                {{ @$mother_visit->fetus === 'Twins' ? 'selected' : '' }}>
                                                                Twins
                                                            </option>
                                                            <option value="Multiple"
                                                                {{ @$mother_visit->fetus === 'Multiple' ? 'selected' : '' }}>
                                                                Multiple</option>

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
                                                            <option value="Normal"
                                                                {{ @$mother_visit->afi === 'Normal' ? 'selected' : '' }}>
                                                                Normal
                                                            </option>
                                                            <option value="Adequate"
                                                                {{ @$mother_visit->afi === 'Adequate' ? 'selected' : '' }}>
                                                                Adequate</option>
                                                            <option value="Just-Adequate"
                                                                {{ @$mother_visit->afi === 'Just-Adequate' ? 'selected' : '' }}>
                                                                Just Adequate </option>
                                                            <option value="oligohydraminos"
                                                                {{ @$mother_visit->afi === 'oligohydraminos' ? 'selected' : '' }}>
                                                                oligohydraminos </option>
                                                            <option value="Polyhydraminos"
                                                                {{ @$mother_visit->afi === 'Polyhydraminos' ? 'selected' : '' }}>
                                                                Polyhydraminos </option>

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
                                                            <option value="Viable"
                                                                {{ @$mother_visit->viability === 'Viable' ? 'selected' : '' }}>
                                                                Viable</option>
                                                            <option value="non-Viable"
                                                                {{ @$mother_visit->viability === 'non-Viable' ? 'selected' : '' }}>
                                                                Non Viable</option>
                                                            <option value="IUD"
                                                                {{ @$mother_visit->viability === 'IUD' ? 'selected' : '' }}>
                                                                IUD
                                                            </option>


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
                                                            <option value="Intra-uterine"
                                                                {{ @$mother_visit->fetus === 'Intra-uterine' ? 'selected' : '' }}>
                                                                Intra uterine </option>
                                                            <option value="Extra-uterine"
                                                                {{ @$mother_visit->fetus === 'Extra-uterine' ? 'selected' : '' }}>
                                                                Extra uterine</option>

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
                                                            <option value="Cephalic"
                                                                {{ @$mother_visit->fetal_presentation === 'Cephalic' ? 'selected' : '' }}>
                                                                Cephalic </option>
                                                            <option value="Breech"
                                                                {{ @$mother_visit->fetal_presentation === 'Breech' ? 'selected' : '' }}>
                                                                Breech</option>
                                                            <option value="Oblique"
                                                                {{ @$mother_visit->fetal_presentation === 'Oblique' ? 'selected' : '' }}>
                                                                Oblique </option>
                                                            <option value="Transverse"
                                                                {{ @$mother_visit->fetal_presentation === 'Transverse' ? 'selected' : '' }}>
                                                                Transverse</option>
                                                            <option value="unstable"
                                                                {{ @$mother_visit->fetal_presentation === 'unstable' ? 'selected' : '' }}>
                                                                unstable</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="crl"
                                                        style="font-size: 16px;font-weight: 600;color: black;">CRL (Crown
                                                        Rump Length) in mm
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder=" "
                                                            id="crl" name="crl"
                                                            value="{{ @$mother_visit->crl }}">
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
                                                            id="bpd" name="bpd"
                                                            value="{{ @$mother_visit->bpd }}">
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
                                                            <option value="Anterior"
                                                                {{ @$mother_visit->placement_position === 'Anterior' ? 'selected' : '' }}>
                                                                Anterior </option>
                                                            <option value="Posterior"
                                                                {{ @$mother_visit->placement_position === 'Posterior' ? 'selected' : '' }}>
                                                                Posterior</option>
                                                            <option value="Anterio-posterior"
                                                                {{ @$mother_visit->placement_position === 'Anterio-posterior' ? 'selected' : '' }}>
                                                                Anterio-posterior </option>
                                                            <option value="fundo-posterior"
                                                                {{ @$mother_visit->placement_position === 'fundo-posterior' ? 'selected' : '' }}>
                                                                fundo-posterior</option>
                                                            <option value="Lowlying"
                                                                {{ @$mother_visit->placement_position === 'Lowlying' ? 'selected' : '' }}>
                                                                Lowlying</option>
                                                            <option value="others"
                                                                {{ @$mother_visit->placement_position === 'others' ? 'selected' : '' }}>
                                                                others</option>
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
                                                            id="an_mother_weight" name="an_mother_weight"
                                                            value={{ @$mother_visit->an_mother_weight }}>
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
                                                            id="fetal_heart_rate_bpm" name="fetal_heart_rate_bpm"
                                                            value={{ @$mother_visit->fetal_heart_rate_bpm }}>
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
                                                            id="ac" name="ac"
                                                            value={{ @$mother_visit->ac }}>
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
                                                            id="efw" name="efw"
                                                            value={{ @$mother_visit->efw }}>
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
                                                            id="femur" name="femur"
                                                            value={{ @$mother_visit->femur }}>
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
                                                            name="gestational_age"
                                                            value={{ @$mother_visit->gestational_age }}>
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
                                                            id="fundal_size" name="fundal_size"
                                                            value={{ @$mother_visit->fundal_size }}>
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
                                                            id="foetal_heart_rate" name="foetal_heart_rate"
                                                            value={{ @$mother_visit->foetal_heart_rate }}>
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
                                                            <option value="Present"
                                                                {{ @$mother_visit->surgical_scar === 'Present' ? 'selected' : '' }}>
                                                                Present</option>
                                                            <option value="Absent"
                                                                {{ @$mother_visit->surgical_scar === 'Absent' ? 'selected' : '' }}>
                                                                Absent</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="head"style="font-size: 16px;font-weight: 600;color: black;">Head
                                                        Engagement
                                                        <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="head" name="head">
                                                            <option value="">Please Select</option>
                                                            <option value="Engaged"
                                                                {{ @$mother_visit->head === 'Engaged' ? 'selected' : '' }}>
                                                                Engaged </option>
                                                            <option value="Unengaged"
                                                                {{ @$mother_visit->head === 'Unengaged' ? 'selected' : '' }}>
                                                                Unengaged</option>

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
                                                            id="abdomen_other" name="abdomen_other"
                                                            value="{{ @$mother_visit->abdomen_other }}">
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
                                                            <option value="Cephalic"
                                                                {{ @$mother_visit->abdominal_fetal_presentation === 'Cephalic' ? 'selected' : '' }}>
                                                                Cephalic </option>
                                                            <option value="Breech"
                                                                {{ @$mother_visit->abdominal_fetal_presentation === 'Breech' ? 'selected' : '' }}>
                                                                Breech </option>
                                                            <option value="longitudinal"
                                                                {{ @$mother_visit->abdominal_fetal_presentation === 'longitudinal' ? 'selected' : '' }}>
                                                                longitudinal</option>
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
                                                            id="tt_dose" name="tt_dose"
                                                            value="{{ @$mother_visit->tt_dose }}">
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
                                                            id="tt_date" name="tt_date"
                                                            value="{{ @$mother_visit->tt_date }}">
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
                                                            id="fa_tablet" name="fa_tablet"
                                                            value="{{ @$mother_visit->fa_tablet }}">
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
                                                            id="fa_date" name="fa_date"
                                                            value="{{ @$mother_visit->fa_date }}">
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
                                                            id="ifa_tablet" name="ifa_tablet"
                                                            value="{{ @$mother_visit->ifa_tablet }}">
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
                                                            id="ifa_date" name="ifa_date"
                                                            value="{{ @$mother_visit->ifa_date }}">
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
                                                            id="calcium_tablet" name="calcium_tablet"
                                                            value="{{ @$mother_visit->calcium_tablet }}">
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
                                                            id="calcium_date" name="calcium_date"
                                                            value="{{ @$mother_visit->calcium_date }}">
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
                                                            id="albendazole_date" name="albendazole_date"
                                                            value="{{ @$mother_visit->albendazole_date }}">
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
                                                            <option value="Lobetolol"
                                                                {{ @$mother_visit->other_drug === 'Lobetolol' ? 'selected' : '' }}>
                                                                Lobetolol </option>
                                                            <option value="Aspirin-75"
                                                                {{ @$mother_visit->other_drug === 'Aspirin-75' ? 'selected' : '' }}>
                                                                Aspirin 75</option>
                                                            <option value="Deriphylline"
                                                                {{ @$mother_visit->other_drug === 'Deriphylline' ? 'selected' : '' }}>
                                                                Deriphylline </option>
                                                            <option value="Anti-epileptic"
                                                                {{ @$mother_visit->other_drug === 'Anti-epileptic' ? 'selected' : '' }}>
                                                                Anti epileptic </option>
                                                            <option value="Anti-diabetic"
                                                                {{ @$mother_visit->other_drug === 'Anti-diabetic' ? 'selected' : '' }}>
                                                                Anti diabetic </option>
                                                            <option value="Anti-Hypertensive"
                                                                {{ @$mother_visit->other_drug === 'Anti-Hypertensive' ? 'selected' : '' }}>
                                                                Anti- Hypertensive </option>
                                                            <option value="Thyroid"
                                                                {{ @$mother_visit->other_drug === 'Thyroid' ? 'selected' : '' }}>
                                                                Thyroid </option>
                                                            <option value="others"
                                                                {{ @$mother_visit->other_drug === 'others' ? 'selected' : '' }}>
                                                                others </option>

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
                                                            id="parentral_iron" name="parentral_iron"
                                                            value="{{ @$mother_visit->parentral_iron }}">
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
                                                            <option value="4 doses"
                                                                {{ @$mother_visit->iron_dose === '4 doses' ? 'selected' : '' }}>
                                                                4 doses</option>
                                                            <option value="6 doses"
                                                                {{ @$mother_visit->iron_dose === '6 doses' ? 'selected' : '' }}>
                                                                6 doses</option>
                                                            <option value="10 doses"
                                                                {{ @$mother_visit->iron_dose === '10 doses' ? 'selected' : '' }}>
                                                                10 doses</option>

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
                                                            id="blood_transfusion" name="blood_transfusion"
                                                            value="{{ @$mother->blood_transfusion }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="pregnancy_week"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Blood
                                                        Transfusion (Wks of
                                                        Pregnancy)
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder=" "
                                                            id="pregnancy_week" name="pregnancy_week"
                                                            value="{{ @$mother->pregnancy_week }}">
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
                                                            id="pregnancy_date" name="pregnancy_date"
                                                            value="{{ @$mother->pregnancy_date }}">
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
                                                        style="font-size: 16px;font-weight: 600;color: black;"> High Risk
                                                        Category
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="high_risk" name="high_risk">
                                                            <option value="">Select</option>
                                                            @foreach ($high_risks as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ @$mother_visit->high_risk === $item->id ? 'selected' : '' }}>
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
                                                            name="referral_date"
                                                            value="{{ @$mother_visit->referral_date }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="referral_reason"style="font-size: 16px;font-weight: 600;color: black;">Reason
                                                        For Referral
                                                        <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="referral_reason"
                                                            name="referral_reason">
                                                            <option value="">Please Select</option>
                                                            <option value="Expert Opinion"
                                                                {{ @$mother_visit->referral_reason === 'Expert Opinion' ? 'selected' : '' }}>
                                                                Expert Opinion</option>
                                                            <option value="Admission and Management at Higher Centre"
                                                                {{ @$mother_visit->referral_reason === 'Admission and Management at Higher Centre' ? 'selected' : '' }}>
                                                                Admission and Management at Higher Centre</option>
                                                            <option value="Delivery at Higher Centre"
                                                                {{ @$mother_visit->referral_reason === 'Delivery at Higher Centre' ? 'selected' : '' }}>
                                                                Delivery at Higher Centre</option>
                                                            <option value="Others"
                                                                {{ @$mother_visit->referral_reason === 'Others' ? 'selected' : '' }}>
                                                                Others</option>
                                                            <option value="No Referral"
                                                                {{ @$mother_visit->referral_reason === 'No Referral' ? 'selected' : '' }}>
                                                                No Referral</option>
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
                                                        <input type="text" class="form-control"
                                                            id="suggested_place" name="suggested_place"
                                                            value="{{ @$mother_visit->suggested_place }}">
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
    </div>
@endsection
