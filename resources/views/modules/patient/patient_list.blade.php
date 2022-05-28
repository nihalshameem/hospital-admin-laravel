{{-- Extends layout --}}
@extends('layouts.app')



{{-- Content --}}
@section('content')
    <!-- row -->
    <div class="container-fluid" style="background-color: #ffb800;">
        <div class="form-head d-flex mb-3 mb-md-4 align-items-start">
            <div class="mr-auto d-none d-lg-block">
                <a href="{!! url('/patient/add') !!}" class="btn btn-primary btn-rounded" style="background: black;">+ Add New</a>
            </div>

            <div class="input-group search-area ml-auto d-inline-flex mr-3">
                <input type="text" name="search_rch" onchange="search_btn()" id="search_rch" class="form-control" placeholder="Search here">
                <div class="input-group-append">
                    <button type="button" onclick="search_btn()" class="input-group-text"><i class="flaticon-381-search-2"></i></button>
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
                                <th>Mother ID</th>
                                <th>HSC Name</th>
                                <th>RCH ID</th>
                                <th>AN Mother</th>
                                <th>Husband</th>
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
                            <select class="form-control" id="form_select" name="form_select" data-id="">
                                <option value="/">Registration</option>
                                <option value="/mother-medical/">Mother Medical</option>
                                <!-- <option value="/an-mother-visit/">AN Mother Visit's</option> -->
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
<script>

        function search_btn(){
             var search_rch = $('#search_rch').val();

        
            $('#patient-table').DataTable().destroy();
            patient_datatable(search_rch);
        };
        
        function patient_datatable(search_rch = ''){
            console.log(search_rch);
        if (jQuery("#patient-table").length > 0) {
            var table = $("#patient-table").DataTable({
                searching: false,
                paging: true,
                select: false,
                //info: false,
                lengthChange: false,
                processing: true,
                serverSide: true,
                // ajax: window.location.href,
                ajax:{
                    url: window.location.href,
                    data:{search_rch:search_rch}
                },
                columns: [
                    {
                        data: "checkbox",
                        name: "checkbox",
                    },
                    {
                        data: "id",
                        name: "id",
                    },
                    {
                        data: "hsc_name",
                        name: "hsc_name",
                    },
                    {
                        data: "rch_id",
                        name: "rch_id",
                    },
                    {
                        data: "an_mother",
                        name: "an_mother",
                    },
                    {
                        data: "husband_name",
                        name: "husband_name",
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

