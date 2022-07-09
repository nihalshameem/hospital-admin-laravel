{{-- Extends layout --}}
@extends('layouts.app')



{{-- Content --}}
@section('content')
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="table-responsive">
                    <table id="report-high-risk-phc-table" class="table table-striped patient-list mb-4 dataTablesCard fs-14">
                        <thead>
                            <tr>
                                <th>Sl. No</th>
                                <th>Name of the HSC</th>
                                <th>RCH ID</th>
                                <th>Name Of the Mother</th>
                                <th>Name Of the Husband</th>
                                <th>Contact No</th>
                                <th>Gravida/ Para</th>
                                <th>LMP</th>
                                <th>EDD</th>
                                <th>Date of Registration</th>
                                <th>High risk category</th>
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
@endsection
<script>
    function search_btn() {
        var search_rch = $('#search_rch').val();


        $('#mother-visit-all-table').DataTable().destroy();
        patient_datatable(search_rch);
    };
</script>
