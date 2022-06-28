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
                    <div class="card-header" style="background-color: #ffb800;">
                        <h4 class="card-title">General Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="mother-medical-form" action="{{ url('patient/mother-medical/' . $patient->id) }}"
                                method="POST">
                                @csrf
                                {{-- all inputs --}}

                                <div class="row" style="border: solid 3px #ffb800;padding: 20px;">
                                    <div class="col-md-12">
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
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="hsc_id"
                                                        style="font-size: 16px;font-weight: 600;color: black;">HSC Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control readonly" id="hsc_id" name="hsc_id">
                                                            @foreach ($hsc as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ $patient->hsc_id == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<div class="col-xl-6">-->
                                            <!--    <div class="form-group row">-->
                                            <!--        <label class="col-lg-4 col-form-label" for="mother_name"-->
                                            <!--            style="font-size: 16px;font-weight: 600;color: black;">Mother Name-->
                                            <!--        </label>-->
                                            <!--        <div class="col-lg-6">-->
                                            <!--            <input type="text" class="form-control" id="mother_name"-->
                                            <!--                name="mother_name" value="{{ $patient->an_mother }}">-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <!--<div class="col-xl-6">-->
                                            <!--    <div class="form-group row">-->
                                            <!--        <label class="col-lg-4 col-form-label" for="an_reg_date"-->
                                            <!--            style="font-size: 16px;font-weight: 600;color: black;">Date of AN-->
                                            <!--            Mother-->
                                            <!--            Registration-->
                                            <!--        </label>-->
                                            <!--        <div class="col-lg-6">-->
                                            <!--            <input type="text" class="datepicker-default form-control"-->
                                            <!--                id="an_reg_date" name="an_reg_date"-->
                                            <!--                value="{{ $patient->an_reg_date }}">-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <!--<div class="col-xl-6">-->
                                            <!--    <div class="form-group row">-->
                                            <!--        <label class="col-lg-4 col-form-label" for="financial_year"-->
                                            <!--            style="font-size: 16px;font-weight: 600;color: black;">Financial-->
                                            <!--            Year-->
                                            <!--        </label>-->
                                            <!--        <div class="col-lg-6">-->
                                            <!--            <input type="text" class="form-control readonly" id="financial_year"-->
                                            <!--                name="financial_year" placeholder="YYYY - YYYY"-->
                                            <!--                value="{{ @$patient->financial_year }}">-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="within_pregnancy_week"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Registerd
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
                                            <!--<div class="col-xl-6">-->
                                            <!--    <div class="form-group row">-->
                                            <!--        <label class="col-lg-4 col-form-label" for="lmp_date"-->
                                            <!--            style="font-size: 16px;font-weight: 600;color: black;">LMP Date<span-->
                                            <!--                class="text-danger">*</span>-->
                                            <!--        </label>-->
                                            <!--        <div class="col-lg-6">-->
                                            <!--            <input type="text" class="datepicker-default form-control"-->
                                            <!--                id="lmp_date" name="lmp_date"-->
                                            <!--                value="{{ @$mother_medical->lmp_date }}">-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <!--<div class="col-xl-6">-->
                                            <!--    <div class="form-group row">-->
                                            <!--        <label class="col-lg-4 col-form-label" for="edd_date"-->
                                            <!--            style="font-size: 16px;font-weight: 600;color: black;">EDD Date-->
                                            <!--        </label>-->
                                            <!--        <div class="col-lg-6">-->
                                            <!--            <input type="text" class="datepicker-default form-control" id="edd_date"-->
                                            <!--                placeholder="YYYY-MM-DD" name="edd_date"-->
                                            <!--                value="{{ @$mother_medical->edd_date }}">-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->

                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="past_illness_id"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Previous Medical Illness
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="past_illness_id"
                                                            name="past_illness_id">
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
                                                    <label class="col-lg-4 col-form-label" for="surgery_history" style="font-size: 16px;font-weight: 600;color: black;">Previous History Of Surgery
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="surgery_history"
                                                            name="surgery_history"
                                                            value="{{ @$mother_medical->surgery_history }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="blood_transfusion" style="font-size: 16px;font-weight: 600;color: black;">History Of Blood Transfusion
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="blood_transfusion"
                                                            name="blood_transfusion"
                                                            value="{{ @$mother_medical->blood_transfusion }}">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xl-6" style="display: none !important">
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

                                </div>







                                <br>

                                <!--<div class="row" style="border: solid 3px #ffb800;padding: 20px;">-->
                                <!--    <div class="col-md-12">-->



                                <!--        <center>-->
                                <!--            <h3><b>Past Obstetric History</b></h3>-->

                                <!--        </center>-->
                                <!--        <hr>-->

                                <!--        <div class="row">-->
                                <!--            <div class="offest-xl-2 col-xl-10">-->
                                <!--                <div class="form-group row">-->
                                <!--                    <label class="col-lg-4 col-form-label" for="total_pregnancy"-->
                                <!--                        style="font-size: 16px;font-weight: 600;color: black;">Total No Of-->
                                <!--                        Pregnancy-->
                                <!--                        (Provious)-->
                                <!--                    </label>-->
                                <!--                    <div class="col-lg-6">-->
                                <!--                        <input type="number" class="form-control" name="total_pregnancy"-->
                                <!--                            value="{{ $obstetric && $obstetric->total_pregnancy != null ? $obstetric->total_pregnancy : 0 }}">-->
                                <!--                    </div>-->
                                <!--                </div>-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->

                                <br>

                                <div class="row" style="border: solid 3px #ffb800;padding: 20px;">
                                    <div class="col-md-12">

                                        <center>
                                            <h3><b>Details Of Previous Two Pregnancies</b></h3>
                                        </center>
                                        <hr>


                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="last_complication_id"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Any Complication in Previous Pregnancies 
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
                                                        <input type="text" class="form-control mt-2"
                                                            name="last_other_complication"
                                                            value="{{ @$obstetric->last_other_complication }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="present_complication_id"
                                                        style="font-size: 16px;font-weight: 600;color: black;"> Complication in Current Pregnancy 
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
                                                    <label class="col-lg-4 col-form-label" for="outcome_id"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Outcome of Current
                                                        pregnancy
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
                                    </div>
                                </div>

                                <br>

                                <div class="row" style="border: solid 3px #ffb800;padding: 20px;">
                                    <div class="col-md-12">




                                        <center>
                                            <h3><b> Preferred / Suggested Place Of Delivery</b></h3>
                                        </center>

                                        <hr>

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="district"
                                                        style="font-size: 16px;font-weight: 600;color: black;">District
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
                                                            <option value="">Others </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="hospital_type_id"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Type of
                                                        Hospital
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
                                                    <label class="col-lg-4 col-form-label" for="hospital_name"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Name of
                                                        Hospital
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <select class="form-control" id="hospital_name"
                                                            name="hospital_name">
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
                                             <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="hospital_name"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Place of
                                                        Hospital
                                                    </label>
                                                    <div class="col-lg-8">
                                                          <input type="text" class="form-control" id="pw_rch_reg_number"
                                                    name="pw_rch_reg_number"
                                                    value="{{ @$mother_medical->pw_rch_reg_number }}">
                                                    </div>
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
