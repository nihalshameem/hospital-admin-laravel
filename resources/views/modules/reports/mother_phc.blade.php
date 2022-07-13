{{-- Extends layout --}}
@extends('layouts.app')



{{-- Content --}}
@section('content')
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="table-responsive">
                    <table id="report-mother-phc-table-excel" class="table table-striped patient-list mb-4 dataTablesCard fs-14">
                        <thead>
                            <tr>
                                <th>Sl. No</th>
                                <th>Name of the HSC</th>
                                <th>RCH ID</th>
                                <th>Name Of the Mother</th>
                                <th>Name Of the Husband</th>
                                <th>Contact No</th>
                                <th>Gravida/ Para/live/abort/Neonatal death</th>
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
