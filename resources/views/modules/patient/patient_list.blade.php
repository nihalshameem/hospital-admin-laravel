{{-- Extends layout --}}
@extends('layouts.app')



{{-- Content --}}
@section('content')
    <!-- row -->
    <div class="container-fluid">
        <div class="form-head d-flex mb-3 mb-md-4 align-items-start">
            <div class="mr-auto d-none d-lg-block">
                <a href="{!! url('/patient/add') !!}" class="btn btn-primary btn-rounded">+ Add New</a>
            </div>

            <div class="input-group search-area ml-auto d-inline-flex mr-3">
                <input type="text" class="form-control" placeholder="Search here">
                <div class="input-group-append">
                    <button type="button" class="input-group-text"><i class="flaticon-381-search-2"></i></button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="table-responsive">
                    <table id="patient-table" class="table table-striped patient-list mb-4 dataTablesCard fs-14">
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
                                <th>Patient ID</th>
                                <th>HSC Name</th>
                                <th>RCH ID</th>
                                <th>PW Height</th>
                                <th>Mother Weight</th>
                                <th>AN Reg</th>
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

    {{-- Edit Modal --}}
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Selection</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="form_select">Select Form
                        </label>
                        <div class="col-lg-6">
                            <select class="form-control" id="form_select" name="form_select">
                                <option value="/patient/">Registration</option>
                                <option value="/patient/mother-medical/" disabled>Mother Medical</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="selected-edit">Continue</button>
                </div>
            </div>
        </div>
    </div>
@endsection
