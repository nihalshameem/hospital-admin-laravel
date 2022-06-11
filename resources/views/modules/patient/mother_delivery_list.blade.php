{{-- Extends layout --}}
@extends('layouts.app')



{{-- Content --}}
@section('content')
    <!-- row -->
    <div class="container-fluid">
        <div class="form-head d-flex mb-3 mb-md-4 align-items-start">
            <div class="mr-auto d-none d-lg-block">
                <button type="button" class="btn btn-primary btn-rounded" data-toggle="modal"
                    data-target="#motherMedicalAdd">+ Add New</button>
            </div>

            <div class="input-group search-area ml-auto d-inline-flex mr-3">
                <input type="text" name="search_rch" onchange="search_btn()" id="search_rch" class="form-control"
                    placeholder="Search here">
                <div class="input-group-append">
                    <button type="button" onclick="search_btn()" class="input-group-text"><i
                            class="flaticon-381-search-2"></i></button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="table-responsive">
                    <table id="mother-medical-table" class="table table-striped patient-list mb-4 dataTablesCard fs-14">
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
                                <th>Mother ID</th>
                                <th>Sl.No of RCH Reg</th>
                                <th>Financial Year</th>
                                <th>Mother Name</th>
                                <th>MRMBS Eligibility</th>
                                <th>Date of Reg</th>
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
    <div class="modal fade" id="motherMedicalAdd">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Select Mother Register</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="patient_id_select">Select Mother ID
                        </label>
                        <div class="col-lg-6">
                            <select id="patient_id_select" class="single-select"
                                data-link="{{ url('patient/mother-delivery') }}" required>
                                <option value="">Select</option>
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="patient-selecter">Continue</button>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function search_btn() {
        var search_rch = $('#search_rch').val();


        $('#mother-medical-table').DataTable().destroy();
        patient_datatable(search_rch);
    };

    function patient_datatable(search_rch = '') {
        console.log(search_rch);
        if (jQuery("#mother-medical-table").length > 0) {
            var table = $("#mother-medical-table").DataTable({
                searching: false,
                paging: true,
                select: false,
                //info: false,
                lengthChange: false,
                processing: true,
                serverSide: true,
                ajax: {
                    url: window.location.href,
                    data: {
                        search_rch: search_rch
                    }
                },
                columns: [{
                        data: "checkbox",
                        name: "checkbox",
                    },
                    {
                        data: "patient_id",
                        name: "patient_id",
                    },
                    {
                        data: "pw_rch_reg_number",
                        name: "pw_rch_reg_number",
                    },
                    {
                        data: "financial_year",
                        name: "financial_year",
                    },
                    {
                        data: "mother_name",
                        name: "mother_name",
                    },
                    {
                        data: "eligible_for_mrmbs",
                        name: "eligible_for_mrmbs",
                    },
                    {
                        data: "an_reg_date",
                        name: "an_reg_date",
                    },
                    {
                        data: "edit",
                        name: "edit",
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: "delete",
                        name: "delete",
                        orderable: false,
                        searchable: false,
                    },
                ],
            });
        }
    }
</script>
