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
                        <h4 class="card-title">Infant Summary Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="infant-form" action="{{ url('patient/infant/edit/' . @$infant->id) }}"
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
                                                    <label class="col-lg-4 col-form-label" for="vhn_name"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Name Of VHN

                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="vhn_number"
                                                            name="vhn_name" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="rch_number"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Sl.NO Of
                                                        RCH Register <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="rch_number"
                                                            name="rch_number" value="{{ @$infant->rch_id }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="reg_date"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Date of
                                                        Registration
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="reg_date"
                                                            name="reg_date" value="{{ @$infant->reg_date }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="infant_number"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Infant No.
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control readonly" id="infant_number"
                                                            name="infant_number" value="{{ @$infant->infant_number }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="delivery_date"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Delivery Date

                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="delivery_date"
                                                            name="delivery_date" placeholder="DD/MM/YYYY" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="mother_name"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Mother Name
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control readonly" id="mother_name"
                                                            name="mother_name" value="{{ $patient->an_mother }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="birth_term"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Birth Term
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="birth_term"
                                                            name="birth_term" value="{{ @$infant->birth_term }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="infant_sex"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Sex of Infant

                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="infant_sex" name="infant_sex">
                                                            <option value="">Select Infant Sex</option>
                                                            <option value="Male"
                                                                {{ @$infant->infant_sex == 'Male' ? 'selected' : '' }}>
                                                                Male
                                                            </option>
                                                            <option value="Female"
                                                                {{ @$infant->infant_sex == 'Female' ? 'selected' : '' }}>
                                                                Female
                                                            </option>
                                                            <option value="Transgender"
                                                                {{ @$infant->infant_sex == 'Transgender' ? 'selected' : '' }}>
                                                                Transgender</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="baby_cry"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Baby cried
                                                        immediately at birth <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="baby_cry" name="baby_cry">
                                                            <option value="Yes"
                                                                {{ @$infant->baby_cry == 'Yes' ? 'selected' : '' }}>Yes
                                                            </option>
                                                            <option value="No"
                                                                {{ @$infant->baby_cry == 'No' ? 'selected' : '' }}>No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="birth_defect_id"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Any defect
                                                        seen at birth

                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="birth_defect_id"
                                                            name="birth_defect_id">
                                                            <option value="">Select defect seen at birth</option>
                                                            @foreach ($defects as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ @$infant->birth_defect_id == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="birth_weight"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Weight at
                                                        borth(kg) <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="birth_weight"
                                                            name="birth_weight" value="{{ @$infant->birth_weight }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="feeding_status"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Breast
                                                        Feeding Started within One Hour After Delivery <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="feeding_status"
                                                            name="feeding_status">
                                                            <option value="Yes"
                                                                {{ @$infant->feeding_status == 'Yes' ? 'selected' : '' }}>Yes
                                                            </option>
                                                            <option value="No"
                                                                {{ @$infant->feeding_status == 'No' ? 'selected' : '' }}>No
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="live_birth_order"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Order of Live
                                                        Birth <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select id="live_birth_order" name="live_birth_order"
                                                            class="single-select form-control"
                                                            data-link="{{ url('patient/infant') }}" required>
                                                            <option value="">Select order of live birth</option>
                                                            @for ($i = 1; $i <= 10; $i++)
                                                                <option value="{{ $i }}"
                                                                    {{ @$infant->live_birth_order == $i ? 'selected' : '' }}>
                                                                    {{ $i }}
                                                                </option>
                                                            @endfor
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
                                            <h3><b>Immunisation Date</b></h3>
                                        </center>
                                        <hr>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="opv_o_dose"
                                                        style="font-size: 16px;font-weight: 600;color: black;">OPV-O Dose

                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="opv_o_dose"
                                                            name="opv_o_dose" placeholder="DD/MM/YYYY"
                                                            value="{{ @$infant->opv_o_dose }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="bcg_dose"
                                                        style="font-size: 16px;font-weight: 600;color: black;">BCG Dose

                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="bcg_dose"
                                                            name="bcg_dose" placeholder="DD/MM/YYYY"
                                                            value="{{ @$infant->bcg_dose }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="hep_o_dose"
                                                        style="font-size: 16px;font-weight: 600;color: black;">HEP B-O Dose

                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="hep_o_dose"
                                                            name="hep_o_dose" placeholder="DD/MM/YYYY"
                                                            value="{{ @$infant->hep_o_dose }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="vitk_dose"
                                                        style="font-size: 16px;font-weight: 600;color: black;">VITK Dose

                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="vitk_dose"
                                                            name="vitk_dose" placeholder="DD/MM/YYYY"
                                                            value="{{ @$infant->vitk_dose }}">
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
                                            <h3><b>CRS Birth Registered</b></h3>
                                        </center>
                                        <hr>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="crs_status"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Birth
                                                        Registered CRS

                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="crs_status" name="crs_status">
                                                            <option value="Yes"
                                                                {{ @$infant->crs_status == 'Yes' ? 'selected' : '' }}>
                                                                Yes</option>
                                                            {{ @$infant->crs_status == 'option' ? 'selected' : '' }}
                                                            <option value="No">
                                                                No</option>
                                                        </select>
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
