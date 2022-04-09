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
                            <form class="mother-medical-form" action="{{ url('patient/mother-medical/' . $patient->id) }}"
                                method="POST">
                                @csrf
                                {{-- all inputs --}}
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
                                            <label class="col-lg-4 col-form-label" for="hsc_id">HSC Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="hsc_id" name="hsc_id" disabled>
                                                    @foreach ($hsc as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $patient->hsc_id == $item->id ? 'selected' : '' }}>
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
                                            <label class="col-lg-4 col-form-label" for="pw_rch_reg_number">SL.No of PW in
                                                RCH
                                                Register
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="pw_rch_reg_number"
                                                    name="pw_rch_reg_number"
                                                    value="{{ @$mother_medical->pw_rch_reg_number }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="an_reg_date">Date of AN Mother
                                                Registration
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="datepicker-default form-control" id="an_reg_date"
                                                    name="an_reg_date" value="{{ @$mother_medical->an_reg_date }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="financial_year">Financial Year
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="financial_year"
                                                    name="financial_year" placeholder="YYYY - YYYY"
                                                    value="{{ @$mother_medical->financial_year }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="mother_name">Mother Name
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="mother_name"
                                                    name="mother_name" value="{{ @$mother_medical->mother_name }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="lmp_date">LMP Date<span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="datepicker-default form-control" id="lmp_date"
                                                    name="lmp_date" value="{{ @$mother_medical->lmp_date }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="within_pregnancy_week">Registerd
                                                within 12 Weeks Of Pregnancy
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="within_pregnancy_week"
                                                    name="within_pregnancy_week">
                                                    <option value="">Please Select</option>
                                                    <option value="yes"
                                                        {{ @$mother_medical->within_pregnancy_week == 'yes' ? 'selected' : '' }}>
                                                        Yes</option>
                                                    <option value="no"
                                                        {{ @$mother_medical->within_pregnancy_week == 'no' ? 'selected' : '' }}>
                                                        No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="edd_date">EDD Date
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="datepicker-default form-control" id="edd_date"
                                                    name="edd_date" value="{{ @$mother_medical->edd_date }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="mother_blood">Blood Group Of Mother
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-3">
                                                <select class="form-control" id="mother_blood"
                                                    name="mother_blood_grp_status">
                                                    <option value="Done"
                                                        {{ @$mother_medical->mother_blood == 'Done' ? 'selected' : '' }}>
                                                        Done
                                                    </option>
                                                    <option value="Not Done"
                                                        {{ @$mother_medical->mother_blood == 'Not Done' ? 'selected' : '' }}>
                                                        Not Done</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-3" id="blood_grp">
                                                <select class="form-control" id="blood_grp" name="blood_grp">
                                                    <option value="">Please Select</option>
                                                    <option value="A+ve"
                                                        {{ @$mother_medical->blood_grp == 'A+ve' ? 'selected' : '' }}>
                                                        A+ve
                                                    </option>
                                                    <option value="B+ve"
                                                        {{ @$mother_medical->blood_grp == 'B+ve' ? 'selected' : '' }}>
                                                        B+ve
                                                    </option>
                                                    <option value="AB+ve"
                                                        {{ @$mother_medical->blood_grp == 'AB+ve' ? 'selected' : '' }}>
                                                        AB+ve
                                                    </option>
                                                    <option value="O+ve"
                                                        {{ @$mother_medical->blood_grp == 'O+ve' ? 'selected' : '' }}>
                                                        O+ve
                                                    </option>
                                                    <option value="A-ve"
                                                        {{ @$mother_medical->blood_grp == 'A-ve' ? 'selected' : '' }}>
                                                        A-ve
                                                    </option>
                                                    <option value="B-ve"
                                                        {{ @$mother_medical->blood_grp == 'B-ve' ? 'selected' : '' }}>
                                                        B-ve
                                                    </option>
                                                    <option value="AB-ve"
                                                        {{ @$mother_medical->blood_grp == 'AB-ve' ? 'selected' : '' }}>
                                                        AB-ve
                                                    </option>
                                                    <option value="O-ve"
                                                        {{ @$mother_medical->blood_grp == 'O-ve' ? 'selected' : '' }}>
                                                        O-ve
                                                    </option>
                                                    <option value="A1+ve"
                                                        {{ @$mother_medical->blood_grp == 'A1+ve' ? 'selected' : '' }}>
                                                        A1+ve
                                                    </option>
                                                    <option value="A1-ve"
                                                        {{ @$mother_medical->blood_grp == 'A1-ve' ? 'selected' : '' }}>
                                                        A1-ve
                                                    </option>
                                                    <option value="Not Known"
                                                        {{ @$mother_medical->blood_grp == 'Not Known' ? 'selected' : '' }}>
                                                        Not
                                                        Known</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="past_illness_id">Past Liness
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="past_illness_id" name="past_illness_id">
                                                    <option value="">None</option>
                                                    @foreach ($past_illnesses as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ @$mother_medical->pass_illness_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="other_past_illness">Other Past
                                                Illness
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="other_past_illness"
                                                    name="other_past_illness"
                                                    value="{{ @$mother_medical->other_past_illness }}">
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="living_children">Living Children
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="living_children"
                                                    name="living_children" value="{{ $patient->living_children }}"
                                                    disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="is_vdrl_rpp">VDRL/RPP
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="is_vdrl_rpp" name="is_vdrl_rpp">
                                                    <option value="yes"
                                                        {{ @$mother_medical->is_vdrl_rpp == 'yes' ? 'selected' : '' }}>
                                                        Done
                                                    </option>
                                                    <option value="no"
                                                        {{ @$mother_medical->is_vdrl_rpp == 'no' ? 'selected' : '' }}>
                                                        Not Done</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="vdrl_date">VDRL Date
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="datepicker-default form-control" id="vdrl_date"
                                                    name="vdrl_date" value="{{ @$mother_medical->vdrl_date }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="vdrl_result">VDRL Result
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="vdrl_result" name="vdrl_result">
                                                    <option value="Reactive"
                                                        {{ @$mother_medical->vdrl_date == 'Reactive' ? 'selected' : '' }}>
                                                        Reactive</option>
                                                    <option value="Non-reactive"
                                                        {{ @$mother_medical->vdrl_date == 'Non-reactive' ? 'selected' : '' }}>
                                                        Non-reactive</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>




                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="eligible_for_mrmbs">Whether the
                                                mother is
                                                eligible for MRMBS?
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="eligible_for_mrmbs"
                                                    name="eligible_for_mrmbs">
                                                    <option value="">Select Option</option>
                                                    <option value="yes"
                                                        {{ @$mother_medical->eligible_for_mrmbs == 'yes' ? 'selected' : '' }}>
                                                        Yes</option>
                                                    <option value="no"
                                                        {{ @$mother_medical->eligible_for_mrmbs == 'no' ? 'selected' : '' }}>
                                                        No
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="hbsag_done">HBsAg Done
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-0">
                                                    <label class="radio-inline mr-3"><input type="radio" name="hbsag_done"
                                                            value="yes"
                                                            {{ @$mother_medical->hbsag_done == 'yes' ? 'checked' : '' }}>
                                                        Yes</label>
                                                    <label class="radio-inline mr-3"><input type="radio" name="hbsag_done"
                                                            value="no"
                                                            {{ @$mother_medical->hbsag_done == 'no' ? 'checked' : '' }}>
                                                        No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="offset-xl-6 col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="hbsag_status">HBsAg Status
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-0">
                                                    <label class="radio-inline mr-3"><input type="radio"
                                                            name="hbsag_status" value="positive"
                                                            {{ @$mother_medical->hbsag_status == 'positive' ? 'checked' : '' }}>
                                                        Positive</label>
                                                    <label class="radio-inline mr-3"><input type="radio"
                                                            name="hbsag_status" value="negative"
                                                            {{ @$mother_medical->hbsag_status == 'negative' ? 'checked' : '' }}>
                                                        Negative</label>
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
                                            <label class="col-lg-4 col-form-label" for="wife_hiv_screening">Wife HIV Screen
                                                Test
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="wife_hiv_screening"
                                                    name="wife_hiv_screening">
                                                    <option value="">Select </option>
                                                    <option value="yes"
                                                        {{ @$mother_medical->wife_hiv_screening == 'yes' ? 'selected' : '' }}>
                                                        Yes</option>
                                                    <option value="no"
                                                        {{ @$mother_medical->wife_hiv_screening == 'no' ? 'selected' : '' }}>
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
                                            <label class="col-lg-4 col-form-label" for="wife_hiv_screeing_date">Date of HIV
                                                Screening Test Conducted
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="datepicker-default form-control"
                                                    id="wife_hiv_screeing_date" name="wife_hiv_screeing_date"
                                                    value="{{ @$mother_medical->wife_hiv_screeing_date }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="wife_hiv_screeing_result">HIV
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
                                            <label class="col-lg-4 col-form-label" for="husband_hiv_screening">Husband HIV
                                                Screen
                                                Test
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="husband_hiv_screening"
                                                    name="husband_hiv_screening">
                                                    <option value="">Select </option>
                                                    <option value="yes"
                                                        {{ @$mother_medical->husband_hiv_screening == 'yes' ? 'selected' : '' }}>
                                                        Yes</option>
                                                    <option value="no"
                                                        {{ @$mother_medical->husband_hiv_screening == 'no' ? 'selected' : '' }}>
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
                                            <label class="col-lg-4 col-form-label" for="husband_hiv_screeing_date">Date of
                                                HIV
                                                Screening Test Conducted
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="datepicker-default form-control"
                                                    id="husband_hiv_screeing_date" name="husband_hiv_screeing_date"
                                                    value="{{ @$mother_medical->husband_hiv_screeing_date }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="husband_hiv_screeing_result">HIV
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



                                <hr>
                                <center>
                                    <h3><b>Past Obstetric History</b></h3>
                                </center>

                                <div class="row">
                                    <div class="offest-xl-2 col-xl-10">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="total_pregnancy">Total No Of
                                                Pregnancy
                                                (Provious)
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" name="total_pregnancy"
                                                    value="{{ $obstetric && $obstetric->total_pregnancy != null ? $obstetric->total_pregnancy : 0 }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <center>
                                    <h3><b>Details Of Last Two Pregnancy</b></h3>
                                </center>



                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="last_complication_id">Last
                                                Pregnancy Complication
                                            </label>
                                            <div class="col-lg-8">
                                                <select class="form-control" id="last_complication_id"
                                                    name="last_complication_id">
                                                    <option value="">Select </option>
                                                    @foreach ($complications as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ @$obstetric->last_complication_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="text" class="form-control mt-2" name="last_other_complication"
                                                    value="{{ @$obstetric->last_other_complication }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="present_complication_id">Present
                                                Pregnancy Complication
                                            </label>
                                            <div class="col-lg-8">
                                                <select class="form-control" id="present_complication_id"
                                                    name="present_complication_id">
                                                    <option value="">Select </option>
                                                    @foreach ($complications as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ @$obstetric->present_complication_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="text" class="form-control mt-2"
                                                    name="present_other_complication"
                                                    value="{{ @$obstetric->present_other_complication }}">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="outcome_id">Outcome of pregnancy
                                            </label>
                                            <div class="col-lg-8">
                                                <select class="form-control" id="outcome_id" name="outcome_id">
                                                    <option value="">Select </option>
                                                    @foreach ($outcomes as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ @$obstetric->outcome_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>



                                <hr>


                                <center>
                                    <h3><b>Suggested Place Of Delivery</b></h3>
                                </center>



                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="district">Distric
                                            </label>
                                            <div class="col-lg-8">
                                                <select class="form-control" id="district" name="district">
                                                    <option value="">Select </option>
                                                    @foreach ($districts as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ @$delivery_place->district == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="hospital_type_id">Type of Hospital
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-8">
                                                <select class="form-control" id="hospital_type_id"
                                                    name="hospital_type_id">
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
                                            <label class="col-lg-4 col-form-label" for="hospital_name">Name of Hospital
                                            </label>
                                            <div class="col-lg-8">
                                                <select class="form-control" id="hospital_name" name="hospital_name">
                                                    <option value="">Select </option>
                                                    <option value="1"
                                                        {{ @$delivery_place->hospital_name == '1' ? 'selected' : '' }}>
                                                        select 1
                                                    </option>
                                                    <option value="2"
                                                        {{ @$delivery_place->hospital_name == '2' ? 'selected' : '' }}>
                                                        select 2
                                                    </option>
                                                    <option value="3"
                                                        {{ @$delivery_place->hospital_name == '3' ? 'selected' : '' }}>
                                                        select 3
                                                    </option>
                                                </select>
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
                                            <button type="submit" value="continue" name="submit_btn"
                                                class="btn btn-primary">Save & Continue</button>
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
