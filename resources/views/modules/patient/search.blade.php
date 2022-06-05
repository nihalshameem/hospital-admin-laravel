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
                            <form class="patient-form" id="risk_search_form" method="POST">
                                {{-- all inputs --}}
                                <div class="row">
                                    <div class="col-xl-4 mb-3">
                                        <input type="text" class="form-control" id="hsc_name" name="hsc_name"
                                            placeholder="HSC Name">
                                    </div>
                                    <div class="col-xl-4 mb-3">
                                        <input type="text" class="form-control readonly" id="rch_id" name="rch_id"
                                            placeholder="RCH ID">
                                    </div>
                                    <div class="col-xl-4 mb-3">
                                        <select class="form-control" id="symptoms" name="symptoms" placeholder="Symptoms">
                                            <option value="" disabled selected>Symptoms</option>
                                            {{-- @foreach ($hsc as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-4 mb-3">
                                        <input type="text" class="form-control" id="from_date" name="from_date"
                                            placeholder="From Date">
                                    </div>
                                    <div class="col-xl-4 mb-3">
                                        <input type="text" class="form-control" id="to_date" name="to_date"
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
        {{-- <div class="row">
            <div class="col-xl-12">
                <div class="table-responsive">
                    <table id="search-table" class="table table-striped patient-list mb-4 dataTablesCard fs-14">
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
                                <th>Visit Count</th>
                                <th>HSC Name</th>
                                <th>RCH ID</th>
                                <th>AN Mother</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
<script>

    function search_btn() {
        var search_rch = $('#search_rch').val();


        $('#search-table').DataTable().destroy();
        patient_datatable(search_rch);
    };

    function patient_datatable(values = '') {
        return console.log(values);
        if (jQuery("#search-table").length > 0) {
            var table = $("#search-table").DataTable({
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
                        data: "visit_count",
                        name: "visit_count",
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
                        data: "Action",
                        name: "Action",
                        orderable: false,
                        searchable: false,
                    },
                ],
            });
        }
    }
</script>
