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
                        <h4 class="card-title">Mother Registration</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="patient-form" action="{{ url('patient/' . $patient->id) }}" method="POST">
                                @csrf
                                {{-- all inputs --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="visit_type">First Choose
                                    </label>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-0">
                                            <label class="radio-inline mr-3"><input type="radio" name="visit_type"
                                                    value="resident"
                                                    {{ @$patient->visit_type == 'resident' || @$patient ? 'checked' : '' }}>
                                                Resident Mother</label>
                                            <label class="radio-inline mr-3"><input type="radio" name="visit_type"
                                                    value="visitor"
                                                    {{ @$patient->visit_type == 'visitor' ? 'checked' : '' }}>
                                                Visitor Mother</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="border: solid 3px #ffb800;padding: 20px;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="hsc_id"
                                                        style="font-size: 16px;font-weight: 600;color: black;">HSC Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control readonly" id="hsc_id" name="hsc_id"
                                                            style="font-size: 16px;font-weight: 400;color: black;">
                                                            @foreach ($hsc as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ $patient->hsc_id == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="rch_id"
                                                        style="font-size: 16px;font-weight: 600;color: black;">RCH ID
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control readonly" id="rch_id"
                                                            name="rch_id" value="{{ $patient->rch_id }}"
                                                            style="font-size: 16px;font-weight: 400;color: black;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-xl-6" style="display: none !important;">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="anc_number">SL.No of ANC in
                                                        RCH
                                                        Register
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="anc_number"
                                                            name="anc_number" value="{{ $patient->anc_number }}"
                                                            style="font-size: 16px;font-weight: 400;color: black;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6" style="display: none !important;">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="ec_reg_date">Date of EC
                                                        Registration
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="default form-control" id="ec_reg_date"
                                                            name="ec_reg_date" value="{{ $patient->ec_reg_date }}"
                                                            style="font-size: 16px;font-weight: 400;color: black;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="an_reg_date"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Date of AN
                                                        Registeration <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="datepicker-default form-control"
                                                            placeholder="dd-mm-yyyy" id="an_reg_date" name="an_reg_date"
                                                            value="{{ $patient->an_reg_date }}"
                                                            style="font-size: 16px;font-weight: 400;color: black;">
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
                                                        <select class="form-control" id="financial_year"
                                                            name="financial_year">
                                                            <option value="April 2020 to March 2021">April 2020 to March
                                                                2021</option>
                                                            <option value="April 2021 to March 2022">April 2021 to March
                                                                2022</option>
                                                            <option value="April 2022 to March 2023">April 2022 to March
                                                                2023</option>
                                                            <option value="April 2023 to March 2024">April 2023 to March
                                                                2024</option>
                                                            <option value="April 2024 to March 2025">April 2024 to March
                                                                2025</option>
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
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="an_mother"
                                                        style="font-size: 16px;font-weight: 600;color: black;">AN Mother
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="an_mother"
                                                            name="an_mother" value="{{ $patient->an_mother }}"
                                                            style="font-size: 16px;font-weight: 400;color: black;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="husband_name"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Name of
                                                        Husband
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="husband_name"
                                                            name="husband_name" value="{{ $patient->husband_name }}"
                                                            style="font-size: 16px;font-weight: 400;color: black;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="address"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Address
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <textarea class="form-control" id="address" name="address" rows="5"
                                                            style="font-size: 16px;font-weight: 400;color: black;">{{ $patient->address }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="mobile"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Mobile No
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="mobile"
                                                            name="mobile" value="{{ $patient->mobile }}"
                                                            style="font-size: 16px;font-weight: 400;color: black;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="dob"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Date of
                                                        Birth
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="datepicker-default form-control"
                                                            placeholder="dd-mm-yyyy" id="dob" name="dob"
                                                            value="{{ $patient->dob }}"
                                                            style="font-size: 16px;font-weight: 400;color: black;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="age"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Age
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" id="age"
                                                            name="age" value="{{ $patient->age }}" min="0"
                                                            step="1"
                                                            style="font-size: 16px;font-weight: 400;color: black;">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="cast"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Cast
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="cast" name="cast"
                                                            style="font-size: 16px;font-weight: 400;color: black;">
                                                            <option style="font-size: 16px;font-weight: 400;color: black;"
                                                                value="Others"
                                                                {{ $patient->cast == 'Others' ? 'selected' : '' }}>Others
                                                            </option>
                                                            <option style="font-size: 16px;font-weight: 400;color: black;"
                                                                value="ST"
                                                                {{ $patient->cast == 'ST' ? 'selected' : '' }}>ST
                                                            </option>
                                                            <option style="font-size: 16px;font-weight: 400;color: black;"
                                                                value="SC"
                                                                {{ $patient->cast == 'SC' ? 'selected' : '' }}>SC
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="religion"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Religion
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="religion" name="religion"
                                                            style="font-size: 16px;font-weight: 400;color: black;">
                                                            <option value="">Please select</option>
                                                            <option style="font-size: 16px;font-weight: 400;color: black;"
                                                                value="Christian"
                                                                {{ $patient->religion == 'Christian' ? 'selected' : '' }}>
                                                                Christian
                                                            </option>
                                                            <option style="font-size: 16px;font-weight: 400;color: black;"
                                                                value="Muslim"
                                                                {{ $patient->religion == 'Muslim' ? 'selected' : '' }}>
                                                                Muslim
                                                            </option>
                                                            <option style="font-size: 16px;font-weight: 400;color: black;"
                                                                value="Hindu"
                                                                {{ $patient->religion == 'Hindu' ? 'selected' : '' }}>
                                                                Hindu
                                                            </option>
                                                            <option style="font-size: 16px;font-weight: 400;color: black;"
                                                                value="Others"
                                                                {{ $patient->religion == 'Others' ? 'selected' : '' }}>
                                                                Others
                                                            </option>
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
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="para"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Para <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="para" name="para"
                                                            style="font-size: 16px;font-weight: 400;color: black;">
                                                            @for ($i = 0; $i <= 10; $i++)
                                                                <option
                                                                    style="font-size: 16px;font-weight: 400;color: black;"
                                                                    value="{{ $i }}"
                                                                    {{ $patient->para == $i ? 'selected' : '' }}>
                                                                    {{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="gravida"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Gravida
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="gravida" name="gravida"
                                                            style="font-size: 16px;font-weight: 400;color: black;">
                                                            @for ($i = 0; $i <= 10; $i++)
                                                                <option
                                                                    style="font-size: 16px;font-weight: 400;color: black;"
                                                                    value="{{ $i }}"
                                                                    {{ $patient->gravida == $i ? 'selected' : '' }}>
                                                                    {{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="living_children"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Living
                                                        Children
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" id="living_children"
                                                            name="living_children"
                                                            value="{{ $patient->living_children }}" min="0"
                                                            step="1"
                                                            style="font-size: 16px;font-weight: 400;color: black;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row" style="border: solid 3px #ffb800;padding: 20px;">
                                    <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="mother_weight"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Weight of
                                                        Mother(in
                                                        Kg) <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" id="mother_weight"
                                                            name="mother_weight" min="0" step="1"
                                                            value="{{ $patient->mother_weight }}"
                                                            style="font-size: 16px;font-weight: 400;color: black;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="pw_height"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Height of
                                                        PW(in cm)
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" id="pw_height"
                                                            name="pw_height" min="0" step="1"
                                                            value="{{ $patient->pw_height }}"
                                                            style="font-size: 16px;font-weight: 400;color: black;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="bp_diastolic"
                                                        style="font-size: 16px;font-weight: 600;color: black;">BP
                                                        Diastolic(MM of
                                                        Hg)
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" id="bp_diastolic"
                                                            name="bp_diastolic" min="40" max="100"
                                                            placeholder="Range 40 to 100"
                                                            value="{{ $patient->bp_diastolic }}"
                                                            style="font-size: 16px;font-weight: 400;color: black;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="bp_systolic"
                                                        style="font-size: 16px;font-weight: 600;color: black;">BP
                                                        Systolic(MM of Hg)
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" id="bp_systolic"
                                                            name="bp_systolic" min="70" max="190"
                                                            placeholder="Range 70 to 190"
                                                            value="{{ $patient->bp_systolic }}"
                                                            style="font-size: 16px;font-weight: 400;color: black;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">



                                    <div class="col-xl-6" style="display: none !important;">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="last_visit_date_ec_tracking">Last
                                                Visit Date of EC Tracking
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control"
                                                    id="last_visit_date_ec_tracking" name="last_visit_date_ec_tracking"
                                                    value="{{ $patient->last_visit_date_ec_tracking }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6" style="display: none !important;">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="bpl_apl">BPL/APL
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="bpl_apl" name="bpl_apl">
                                                    <option value="BPL"
                                                        {{ $patient->bpl_apl == 'BPL' ? 'selected' : '' }}>
                                                        BPL</option>
                                                    <option value="APL"
                                                        {{ $patient->bpl_apl == 'APL' ? 'selected' : '' }}>
                                                        APL</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">


                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" value="save" name="submit_btn"
                                                    class="btn btn-primary">Save</button>
                                                <button type="submit" value="continue" name="submit_btn"
                                                    class="btn btn-primary">Save & Continue</button>
                                            </div>
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
    <script>
        $("#datepicker").datepicker({
            format: "dd-mm-yyyy",
            startView: "days",
            minViewMode: "days"
        });
    </script>
@endsection
