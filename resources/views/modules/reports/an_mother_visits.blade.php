{{-- Extends layout --}}
@extends('layouts.app')



{{-- Content --}}
@section('content')
    <!-- row -->
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Search</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="patient-form" id="mother_visit_search_form" method="POST">
                                {{-- all inputs --}}
                                <div class="row">
                                    <div class="col-xl-4 mb-3">
                                        <input type="text" class="form-control" id="hsc_name" name="hsc_name"
                                            placeholder="HSC Name">
                                    </div>
                                    <div class="col-xl-4 mb-3">
                                        <input type="text" class="form-control" id="rch_id" name="rch_id"
                                            placeholder="RCH ID">
                                    </div>
                                    <div class="col-xl-4 mb-3">
                                        <select class="form-control" id="symptoms" name="symptoms" placeholder="Symptoms">
                                            <option value="" disabled selected>Symptoms</option>
                                            @foreach ($high_risks as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-4 mb-3">
                                        <input type="date" class="datepicker-default form-control" id="from_date" name="from_date"
                                            placeholder="From Date">
                                    </div>
                                    <div class="col-xl-4 mb-3">
                                        <input type="date" class="datepicker-default form-control" id="to_date" name="to_date"
                                            placeholder="To Date">
                                    </div>
                                    <div class="col-xl-4 mb-3">
                                        <button type="submit" value="search" name="submit_btn"
                                            class="btn btn-primary w-100">Search</button>
                                    </div>
                                </div>
                                {{-- all inputs --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="table-responsive">
                    <table id="mother_visit_search_table" class="table table-striped patient-list mb-4 dataTablesCard fs-14 searchTable">
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
                                <th>Visit</th>
                                <th>Weeks</th>
                                <th>Weight</th>
                                <th>BP</th>
                                <th>HB</th>
                                <th>Any High Risk</th>
                                <th>Date Scan Done</th>
                                <th>EFW</th>
                                <th>BPD</th>
                                <th>AFI</th>
                                <th>CRL</th>
                                <th>Placental Position</th>
                                <th>Gestational Age (in Weeks)</th>
                                <th>Action</th>
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
