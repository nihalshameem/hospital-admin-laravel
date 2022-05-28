{{-- Extends layout --}}
@extends('layouts.app')



{{-- Content --}}
@section('content')
    <div class="container-fluid">
        @include('layouts.breadcrumb')


        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Mother Registration</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="patient-form" action="{{ url('patient/add') }}" method="POST">
                                @csrf
                                {{-- all inputs --}}
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="hsc_id">HSC Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control readonly" id="hsc_id" name="hsc_id">
                                                    @foreach ($hsc as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="rch_id">RCH ID
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control readonly" id="rch_id" name="rch_id">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6" style="display: none !important;">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="anc_number">SL.No of ANC in RCH
                                                Register
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="anc_number" name="anc_number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6" style="display: none !important;">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="ec_reg_date">Date of EC Registration
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class=" form-control" id="ec_reg_date"
                                                    name="ec_reg_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="an_reg_date">Date of AN
                                                Registeration <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="an_reg_date"
                                                    name="an_reg_date">
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
                                                    name="financial_year" placeholder="YYYY - YYYY">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="an_mother">AN Mother
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="an_mother" name="an_mother">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="husband_name">Name of Husband
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="husband_name"
                                                    name="husband_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="address">Address
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea class="form-control" id="address" name="address" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="mobile">Mobile No
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="mobile" name="mobile">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="living_children">Living Children
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="living_children"
                                                    name="living_children" value="0" min="0" step="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="cast">Cast
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="cast" name="cast">
                                                    <option value="Others">Others</option>
                                                    <option value="ST">ST</option>
                                                    <option value="SC">SC</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="religion">Religion
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="religion" name="religion">
                                                    <option value="">Please select</option>
                                                    <option value="Christian">Christian</option>
                                                    <option value="Muslim">Muslim</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="dob">Date of Birth
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="dob"
                                                    name="dob">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="para">Para <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="para" name="para">
                                                    @for ($i = 0; $i <= 10; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="gravida">Gravida <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="gravida" name="gravida">
                                                    @for ($i = 0; $i <= 10; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="mother_weight">Weight of Mother(in
                                                Kg) <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="mother_weight"
                                                    name="mother_weight">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="pw_height">Height of PW(in cm)
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="pw_height" name="pw_height">
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
                                                    name="bp_diastolic" min="40" max="100" placeholder="Range 40 to 100">
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
                                                    name="bp_systolic" min="70" max="190" placeholder="Range 70 to 190">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="age">Age
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="age" name="age" value="0"
                                                    min="0" step="1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6" style="display: none !important">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="last_visit_date_ec_tracking">Last
                                                Visit Date of EC Tracking
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control"
                                                    id="last_visit_date_ec_tracking" name="last_visit_date_ec_tracking">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6" style="display: none !important">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="bpl_apl">BPL/APL
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="bpl_apl" name="bpl_apl">
                                                    <option value="BPL">BPL</option>
                                                    <option value="APL">APL</option>
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
@endsection
