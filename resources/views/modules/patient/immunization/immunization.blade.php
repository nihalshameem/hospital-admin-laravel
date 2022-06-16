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
                        <h4 class="card-title">Child Immunisation</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="infant-form" action="{{ url('patient/infant/' . $patient->id) }}"
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
                                                    <label class="col-lg-4 col-form-label" for="rch_reg"
                                                        style="font-size: 16px;font-weight: 600;color: black;">SL.NO. of PW
                                                        in RCH Register
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" id="rch_reg"
                                                            name="rch_reg" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="reg_date"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Date of
                                                        Registration
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="reg_date"
                                                            name="reg_date" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="financial_year"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Financial
                                                        Year<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="financial_year"
                                                            name="financial_year" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="vhn_name"
                                                        style="font-size: 16px;font-weight: 600;color: black;">VHN Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control readonly" id="vhn_name"
                                                            name="vhn_name" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="delivery_date"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Delivery Date
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="delivery_date"
                                                            name="delivery_date" placeholder="DD/MM/YYYY" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="pnc_period"
                                                        style="font-size: 16px;font-weight: 600;color: black;">PNC Period
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="pnc_period" name="pnc_period">
                                                            <option value="">Select</option>
                                                            <option value="1st day">1st day</option>
                                                            <option value="3rd day">3rd day</option>
                                                            <option value="7th day">7th day</option>
                                                            <option value="14th day">14th day</option>
                                                            <option value="21st day">21st day</option>
                                                            <option value="28st day">28st day</option>
                                                            <option value="42nd day">42nd day</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="pnc_date"
                                                        style="font-size: 16px;font-weight: 600;color: black;">PNC Date
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control readonly" id="pnc_date"
                                                            placeholder="DD/MM/YYYY" name="pnc_date" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-0 col-xl-6 offset-xl-4">
                                                <label class="radio-inline mr-3"><input type="radio" name="optradio"
                                                        checked> Mother
                                                    PNC</label>
                                                <label class="radio-inline mr-3"><input type="radio" name="optradio"> Child
                                                    PNC</label>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <br>

                                <div class="row" style="border: solid 3px #ffb800;padding: 20px;">
                                    <div class="col-md-12">
                                        <center>
                                            <h3><b>PNC Details</b></h3>
                                        </center>
                                        <hr>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="ifa_tablets"
                                                        style="font-size: 16px;font-weight: 600;color: black;">IFA Tablets
                                                        Given to Mother
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="ifa_tablets"
                                                            name="ifa_tablets" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="feedy_started"
                                                        style="font-size: 16px;font-weight: 600;color: black;">When was
                                                        complementary feedy Started
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="feedy_started"
                                                            name="feedy_started">
                                                            <option value="">Select</option>
                                                            <option value="8 Minutes">8 Minutes</option>
                                                            <option value="9 Minutes">9 Minutes</option>
                                                            <option value="Not Yet">Not Yet</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="calcium_tablets"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Calcium
                                                        Tablets
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="calcium_tablets"
                                                            name="calcium_tablets" placeholder="14 to 40 Weeks" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="calcium_date"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Calcium Date
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="calcium_date"
                                                            name="calcium_date" placeholder="DD/MM/YYYY" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="ppc_method"
                                                        style="font-size: 16px;font-weight: 600;color: black;">PPC Method
                                                        Followed
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="ppc_method" name="ppc_method">
                                                            <option value="">Select</option>
                                                            <option value="None">None</option>
                                                            <option value="Condom">Condom</option>
                                                            <option value="Male sterilization">Male sterilization</option>
                                                            <option
                                                                value="Post-partum iucd (ppiucd-within 48hr of delivery)">
                                                                Post-partum iucd (ppiucd-within 48hr of delivery)</option>
                                                            <option
                                                                value="Post-partum sterilization (pps-within 7 days of delivery)">
                                                                Post-partum sterilization (pps-within 7 days of delivery)
                                                            </option>
                                                            <option value="Any other specify">Any other specify</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="mother_danger_sign"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Mother Danger
                                                        Sign
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="mother_danger_sign"
                                                            name="mother_danger_sign" placeholder="Some Options" value="">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="vita_solution"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Vita-A
                                                        Solution given to Mother
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="vita_solution"
                                                            name="vita_solution">
                                                            <option value="">Select</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="sugar_value"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Sugar value
                                                        at 42nd day(for GDM mother)
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="sugar_value"
                                                            name="sugar_value" value="">
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
                                            <h3><b>INFANT Details</b></h3>
                                        </center>
                                        <hr>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="infant_weight"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Weight of
                                                        Infant(in gms)
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="infant_weight"
                                                            name="infant_weight" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="infant_danger_sign"
                                                        style="font-size: 16px;font-weight: 600;color: black;">Infant Danger
                                                        Sign
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="infant_danger_sign"
                                                            name="infant_danger_sign" value="">
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
    <hr>
    <center>
        <h3><b>Visit Details</b></h3>
    </center>
    <div class="row">
        <div class="col-xl-12">
            <div class="table-responsive">
                <table id="pnc-table" class="table table-striped patient-list mb-4 dataTablesCard fs-14">
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
                            <th>Visit No</th>
                            <th>PNC Period</th>
                            <th>PNC Date</th>
                            <th>Weight of Infant</th>
                            <th>Infant No</th>
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
@endsection
