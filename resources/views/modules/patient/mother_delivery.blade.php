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
                        <h4 class="card-title">Delivery Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="mother-medical-form" action="{{ url('patient/mother-delivery/' . $patient->id) }}"
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
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="rch_id"
                                                            name="vhn_name" value="{{ @$mother_delivery->vhn_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="mother_number"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Sl.NO Of
                                                        Delivery Mother
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="mother_number"
                                                            name="mother_number"
                                                            value="{{ @$mother_delivery->mother_number }}">
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
                                                            name="reg_date" value="{{ @$mother_delivery->reg_date }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="financial_year"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Financial
                                                        Year
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control readonly" id="financial_year"
                                                            name="financial_year" placeholder="YYYY - YYYY"
                                                            value="{{ @$patient->financial_year }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="last_anc_date"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Last ANC Date
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="last_anc_date"
                                                            name="last_anc_date" placeholder="DD/MM/YYYY"
                                                            value="{{ @$mother_delivery->last_anc_date }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="edd_date"
                                                        style="font-size: 16px;font-weight: 600;color: black;">EDD Date
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="edd_date"
                                                            placeholder="YYYY-MM-DD" name="edd_date"
                                                            value="{{ @$mother_delivery->edd_date }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="mother_name"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Mother Name
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="mother_name"
                                                            name="mother_name" value="{{ $patient->an_mother }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="delivery_date"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Date Of
                                                        Delivery
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="delivery_date"
                                                            name="delivery_date" placeholder="DD/MM/YYYY"
                                                            value="{{ @$mother_delivery->delivery_date }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="delivery_time_h"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Delivery Time
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-3">
                                                        <select id="delivery_time_h" name="delivery_time_h"
                                                            class="single-select form-control"
                                                            data-link="{{ url('patient/an-mother-visit') }}" required>
                                                            @for ($i = 0; $i <= 24; $i++)
                                                                <option value="{{ $i }}"
                                                                    {{ @$mother_delivery->delivery_time_h === $i ? 'selected' : '' }}>
                                                                    {{ $i }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <select id="delivery_time_m" name="delivery_time_m"
                                                            class="single-select form-control"
                                                            data-link="{{ url('patient/an-mother-visit') }}" required>
                                                            @for ($i = 0; $i <= 59; $i++)
                                                                <option value="{{ $i }}"
                                                                    {{ @$mother_delivery->delivery_time_m === $i ? 'selected' : '' }}>
                                                                    {{ $i }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="district_id"
                                                        style="font-size: 16px;font-weight: 600;color: black;">District Or
                                                        Other State
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="district_id" name="district_id">
                                                            <option value="">Select </option>
                                                            @foreach ($districts as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ @$mother_delivery->district_id === $item->id ? 'selected' : '' }}>
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="hospital_type_id"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Type Of
                                                        Hospital
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="hospital_type_id"
                                                            name="hospital_type_id">
                                                            <option value="">Select </option>
                                                            @foreach ($hospital_types as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ @$mother_delivery->hospital_type_id == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="hospital_name"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Hospital Name
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="hospital_name"
                                                            name="hospital_name"
                                                            value="{{ @$mother_delivery->hospital_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="who_conducted_delivery_id"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Who Conducted
                                                        Delivery
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="who_conducted_delivery_id"
                                                            name="who_conducted_delivery_id">
                                                            <option value="">Select </option>
                                                            @foreach ($who_conducted_deliveries as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ @$mother_delivery->who_conducted_delivery_id == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="delivery_type"
                                                        style="font-size: 16px;font-weight: 600;color: black;">type Of
                                                        Delivery
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="delivery_type"
                                                            name="delivery_type">
                                                            <option value="">Select Type Of Delivery </option>
                                                            <option value="Normal"
                                                                {{ @$mother_delivery->delivery_type == 'Normal' ? 'selected' : '' }}>
                                                                Normal</option>
                                                            <option value="Cesarian"
                                                                {{ @$mother_delivery->delivery_type == 'Cesarian' ? 'selected' : '' }}>
                                                                Cesarian</option>
                                                            <option value="Assissted"
                                                                {{ @$mother_delivery->delivery_type == 'Assissted' ? 'selected' : '' }}>
                                                                Assissted</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="complication"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Delivery
                                                        Complication
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="complication"
                                                            name="complication"
                                                            value="{{ @$mother_delivery->complication }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="delivery_outcome_id"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Outcome Of
                                                        Deilvery
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="delivery_outcome_id"
                                                            name="delivery_outcome_id">
                                                            <option value="">Select </option>
                                                            @foreach ($delivery_outcomes as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ @$mother_delivery->delivery_outcome_id === $item->id ? 'selected' : '' }}>
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="born_count"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Number Born
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select id="born_count" name="born_count"
                                                            class="single-select form-control"
                                                            data-link="{{ url('patient/an-mother-visit') }}" required>
                                                            <option value="">Select No. Baby born in this Delivery</option>
                                                            @for ($i = 1; $i <= 6; $i++)
                                                                <option value="{{ $i }}"
                                                                    {{ @$mother_delivery->born_count == $i ? 'selected' : '' }}>
                                                                    {{ $i }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="live_birth"
                                                        style="font-size: 16px;font-weight: 600;color: black;">No. Of Live
                                                        Birth
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select id="live_birth" name="live_birth"
                                                            class="single-select form-control"
                                                            data-link="{{ url('patient/an-mother-visit') }}" required>
                                                            <option value="">Select Live Birth</option>
                                                            @for ($i = 0; $i <= 3; $i++)
                                                                <option value="{{ $i }}"
                                                                    {{ @$mother_delivery->live_birth == $i ? 'selected' : '' }}>
                                                                    {{ $i }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="still_birth"
                                                        style="font-size: 16px;font-weight: 600;color: black;">No. Of Still
                                                        Birth
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select id="still_birth" name="still_birth"
                                                            class="single-select form-control"
                                                            data-link="{{ url('patient/an-mother-visit') }}" required>
                                                            <option value="">Select Still Birth</option>
                                                            @for ($i = 0; $i <= 3; $i++)
                                                                <option value="{{ $i }}"
                                                                    {{ @$mother_delivery->still_birth == $i ? 'selected' : '' }}>
                                                                    {{ $i }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="method_id"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Method
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="method_id" name="method_id">
                                                            <option value="">Select </option>
                                                            @foreach ($methods as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ @$mother_delivery->method_id == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="method_date"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Date of
                                                        Method
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="method_date"
                                                            name="method_date" placeholder="DD/MM/YYYY"
                                                            value="{{ @$mother_delivery->method_date }}">
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
                                            <h3><b>Discharge Details</b></h3>
                                        </center>
                                        <hr>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="discharge_date"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Date Of
                                                        Discharge
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="discharge_date"
                                                            name="discharge_date" placeholder="DD/MM/YYYY"
                                                            value="{{ @$mother_delivery->discharge_date }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="discharge_time_h"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Discharge
                                                        Time
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-3">
                                                        <select id="discharge_time_h" name="discharge_time_h"
                                                            class="single-select form-control"
                                                            data-link="{{ url('patient/an-mother-visit') }}" required>
                                                            @for ($i = 0; $i <= 24; $i++)
                                                                <option value="{{ $i }}"
                                                                    {{ @$mother_delivery->discharge_time_h === $i ? 'selected' : '' }}>
                                                                    {{ $i }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <select id="discharge_time_m" name="discharge_time_m"
                                                            class="single-select form-control"
                                                            data-link="{{ url('patient/an-mother-visit') }}" required>
                                                            @for ($i = 0; $i <= 59; $i++)
                                                                <option value="{{ $i }}"
                                                                    {{ @$mother_delivery->discharge_time_m === $i ? 'selected' : '' }}>
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
                                            <h3><b>JSY payment Details</b></h3>
                                        </center>
                                        <hr>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="jsy_payment_status"
                                                        style="font-size: 16px;font-weight: 600;color: black;">JSY Payment
                                                        Received
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="jsy_payment_status"
                                                            name="jsy_payment_status">
                                                            <option value="Yes"
                                                                {{ @$mother_delivery->jsy_payment_status == 'Yes' ? 'selected' : '' }}>
                                                                Yes</option>
                                                            <option value="No"
                                                                {{ @$mother_delivery->jsy_payment_status == 'No' ? 'selected' : '' }}>
                                                                No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="jsy_payment_date"
                                                        style="font-size: 16px;font-weight: 600;color: black;">JSY Payment
                                                        Date
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="jsy_payment_date"
                                                            name="jsy_payment_date" placeholder="DD/MM/YYYY"
                                                            value="{{ @$mother_delivery->jsy_payment_date }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="jsy_payment_amount"
                                                        style="font-size: 16px;font-weight: 600;color: black;">JSY Amount
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="jsy_payment_amount"
                                                            name="jsy_payment_amount" 
                                                            value="{{ @$mother_delivery->jsy_payment_amount }}">
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
