{{-- Extends layout --}}
@extends('layouts.app')



{{-- Content --}}
@section('content')
    <!-- row -->


    <div class="container-fluid" style="background-color: #ffb800;">
        <div class="form-head d-flex mb-3 mb-md-4 align-items-start">
            <div class="mr-auto d-none d-lg-block">
                <h3 class="text-black font-w600">Welcome to Niraisool  - District Dashboard</h3>
                
            </div>
            <!--<div class="input-group search-area ml-auto d-inline-flex">-->
            <!--    <input type="text" class="form-control" placeholder="Search here">-->
            <!--    <div class="input-group-append">-->
            <!--        <button type="button" class="input-group-text"><i class="flaticon-381-search-2"></i></button>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<a href="javascript:void(0);" class="settings-icon  ml-3"><i class="flaticon-381-settings-2 mr-0"></i></a>-->
        </div>
        <div class="row">
            <div class="col-xl-3 col-xxl-6 col-sm-6">
                <div class="card gradient-bx text-white bg-danger rounded">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <a href="{{ url('patient') }}">
                                    <p class="mb-1 text-white">Active AN Mothers</p>
                                </a>
                                <div class="d-flex flex-wrap">
                                    <h2 class="fs-40 font-w600 text-white mb-0 mr-3">{{ $active_an_mother }}</h2>
                                    <div>
                                        <img src="{{ asset('images/svg/graph-up.svg') }}" alt="">
                                        <div class="fs-14">+4%</div>
                                    </div>
                                </div>
                            </div>
                            <span class="border rounded-circle p-4">
                                <img src="{{ asset('images/svg/heart-rate.svg') }}" alt="">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-6 col-sm-6">
                <div class="card gradient-bx text-white bg-success rounded">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <p class="mb-1 text-white">Active PN Mothers</p>
                                <div class="d-flex flex-wrap">
                                    <h2 class="fs-40 font-w600 text-white mb-0 mr-3"> 0</h2>
                                    <div>
                                        <img src="{{ asset('images/svg/graph-down.svg') }}" alt="">
                                        <div class="fs-14"></div>
                                    </div>
                                </div>
                            </div>
                            <span class="border rounded-circle p-4">
                                <img src="{{ asset('images/svg/doc.svg') }}" alt="">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-6 col-sm-6">
                <div class="card gradient-bx text-white bg-info rounded">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <a href="{{ url('patient?q=high_risk') }}">
                                    <p class="mb-1 text-white">HighRisk AN Mothers</p>
                                </a>

                                <div class="d-flex flex-wrap">
                                    <h2 class="fs-40 font-w600 text-white mb-0 mr-3">{{ $an_high_risk }}</h2>
                                    <div>
                                        <img src="{{ asset('images/svg/graph-down.svg') }}" alt="">
                                        <div class="fs-14">0</div>
                                    </div>
                                </div>
                            </div>
                            <span class="border rounded-circle p-4">
                                <img src="{{ asset('images/svg/calender.svg') }}" alt="">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-6 col-sm-6">
                <div class="card gradient-bx text-white bg-secondary rounded">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <p class="mb-1 text-white">Highrisk PN Members</p>
                                <div class="d-flex flex-wrap">
                                    <h2 class="fs-40 font-w600 text-white mb-0 mr-3">0</h2>
                                    <div>
                                        <img src="{{ asset('images/svg/graph-up.svg') }}" alt="">
                                        <div class="fs-14">0</div>
                                    </div>
                                </div>
                            </div>
                            <span class="border rounded-circle p-4">
                                <img src="{{ asset('images/svg/doller.svg') }}" alt="">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-6 col-sm-6">
                <div class="card gradient-bx text-white bg-info rounded">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <a href="{{ url('patient?q=edd') }}">
                                    <p class="mb-1 text-white">EDD</p>
                                </a>

                                <span>this week</span>
                                <div class="d-flex flex-wrap">
                                    <h2 class="fs-40 font-w600 text-white mb-0 mr-3">{{ $edd }}</h2>
                                    <div>
                                        <img src="{{ asset('images/svg/graph-down.svg') }}" alt="">
                                        <div class="fs-14">0</div>
                                    </div>
                                </div>
                            </div>
                            <span class="border rounded-circle p-4">
                                <img src="{{ asset('images/svg/calender.svg') }}" alt="">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-6 col-sm-6">
                <div class="card gradient-bx text-white bg-secondary rounded">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <p class="mb-1 text-white">Delivered</p>
                                <span>this week</span>
                                <div class="d-flex flex-wrap">
                                    <h2 class="fs-40 font-w600 text-white mb-0 mr-3">0</h2>
                                    <div>
                                        <img src="{{ asset('images/svg/graph-up.svg') }}" alt="">
                                        <div class="fs-14">0</div>
                                    </div>
                                </div>
                            </div>
                            <span class="border rounded-circle p-4">
                                <img src="{{ asset('images/svg/doller.svg') }}" alt="">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-6 col-sm-6">
                <div class="card gradient-bx text-white bg-info rounded">
                    <div class="card-body" style="background-color: red;">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <a href="{{ url('patient?q=high_risk_edd') }}">
                                    <p class="mb-1 text-white"> High Risk EDD</p>
                                </a>

                                <span>this week</span>
                                <div class="d-flex flex-wrap">
                                    <h2 class="fs-40 font-w600 text-white mb-0 mr-3">{{ $an_risk_and_edd }}</h2>
                                    <div>
                                        <img src="{{ asset('images/svg/graph-down.svg') }}" alt="">
                                        <div class="fs-14">0</div>
                                    </div>
                                </div>
                            </div>
                            <span class="border rounded-circle p-4">
                                <img src="{{ asset('images/svg/calender.svg') }}" alt="">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-6 col-sm-6">
                <div class="card gradient-bx text-white bg-secondary rounded">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <p class="mb-1 text-white">High RisK Delivered</p>
                                <span>this week</span>
                                <div class="d-flex flex-wrap">
                                    <h2 class="fs-40 font-w600 text-white mb-0 mr-3">0</h2>
                                    <div>
                                        <img src="{{ asset('images/svg/graph-up.svg') }}" alt="">
                                        <div class="fs-14">0</div>
                                    </div>
                                </div>
                            </div>
                            <span class="border rounded-circle p-4">
                                <img src="{{ asset('images/svg/doller.svg') }}" alt="">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="col-xl-3 col-xxl-4 col-lg-4">-->
            <!--    <div class="card">-->
            <!--        <div class="card-header border-0 pb-0">-->
            <!--            <h3 class="fs-20 mb-0 text-black">HighRisk AN Mothers</h3>-->
            <!--            <div class="dropdown d-inline-block">-->
            <!--                <div class="btn-link text-primary dropdown-toggle mb-0 fs-14 text-primary"-->
            <!--                    data-toggle="dropdown">-->
            <!--                    <span class="font-w500">2020</span>-->
            <!--                </div>-->
            <!--                <div class="dropdown-menu dropdown-menu-left">-->
            <!--                    <a class="dropdown-item" href="javascript:void(0);">2019</a>-->
            <!--                    <a class="dropdown-item" href="javascript:void(0);">2018</a>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--        <div class="card-body">-->
            <!--            <div>-->
            <!--                <span class="text-info fs-26 font-w600 mr-3">$41,512k</span>-->
            <!--                <span class="text-secondary fs-18 font-w400">$25,612k</span>-->
            <!--            </div>-->
            <!--            <div id="line-chart"></div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-xl-9 col-xxl-8 col-lg-8">-->
            <!--    <div class="card">-->
            <!--        <div class="card-header d-sm-flex d-block border-0 pb-0">-->
            <!--            <h3 class="fs-20 mb-3 mb-sm-0 text-black">High RisK EDD</h3>-->
            <!--            <div class="card-action card-tabs mt-3 mt-sm-0 mt-3 mt-sm-0">-->
            <!--                <ul class="nav nav-tabs" role="tablist">-->
            <!--                    <li class="nav-item">-->
            <!--                        <a class="nav-link active" data-toggle="tab" href="#monthly" role="tab">-->
            <!--                            Monthly-->
            <!--                        </a>-->
            <!--                    </li>-->
            <!--                    <li class="nav-item">-->
            <!--                        <a class="nav-link" data-toggle="tab" href="#weekly" role="tab">-->
            <!--                            Weekly-->
            <!--                        </a>-->
            <!--                    </li>-->
            <!--                    <li class="nav-item">-->
            <!--                        <a class="nav-link" data-toggle="tab" href="#today" role="tab">-->
            <!--                            Today-->
            <!--                        </a>-->
            <!--                    </li>-->
            <!--                </ul>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--        <div class="card-body">-->
            <!--            <div id="chartBar"></div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-xl-3 col-xxl-4 col-lg-5">-->
            <!--    <div class="card border-0 pb-0">-->
            <!--        <div class="card-header flex-wrap border-0 pb-0">-->
            <!--            <h3 class="fs-20 mb-0 text-black"> High Risk EDD</h3>-->
            <!--            <a href="patient-list.html" class="text-primary font-w500">View more >></a>-->
            <!--        </div>-->
            <!--        <div class="card-body">-->
            <!--            <div id="DZ_W_Todo2" class="widget-media dz-scroll ps ps--active-y height320">-->
            <!--                <ul class="timeline">-->
            <!--                    <li>-->
            <!--                        <div class="timeline-panel">-->
            <!--                            <div class="media mr-2">-->
            <!--                                <img alt="image" width="50" src="images/avatar/2.jpg">-->
            <!--                            </div>-->
            <!--                            <div class="media-body">-->
            <!--                                <h6 class="mb-1">Priya ( Kallakurichi )</h6>-->
            <!--                                <span class="fs-14">24 Years</span>-->
            <!--                                <a href="javascript:void(0);" class="text-warning mt-2">Pending</a>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </li>-->
            <!--                    <li>-->
            <!--                        <div class="timeline-panel">-->
            <!--                            <div class="media mr-2">-->
            <!--                                <img alt="image" width="50" src="images/avatar/2.jpg">-->
            <!--                            </div>-->
            <!--                            <div class="media-body">-->
            <!--                                <h6 class="mb-1">Dhivya ( Chinna Salem )</h6>-->
            <!--                                <span class="fs-14">26 Years</span>-->
            <!--                                <a href="javascript:void(0);" class="text-info mt-2">On Recovery</a>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </li>-->
            <!--                    <li>-->
            <!--                        <div class="timeline-panel">-->
            <!--                            <div class="media mr-2">-->
            <!--                                <img alt="image" width="50" src="images/avatar/2.jpg">-->
            <!--                            </div>-->
            <!--                            <div class="media-body">-->
            <!--                                <h6 class="mb-1">Maha ( sankarapuram )</h6>-->
            <!--                                <small class="d-block">13 march 2022 - 01:20 PM</small>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </li>-->
            <!--                    <li>-->
            <!--                        <div class="timeline-panel">-->
            <!--                            <div class="media mr-2">-->
            <!--                                <img alt="image" width="50" src="images/avatar/2.jpg">-->
            <!--                            </div>-->
            <!--                            <div class="media-body">-->
            <!--                                <h6 class="mb-1">Ratha ( Kallakurichi )</h6>-->
            <!--                                <small class="d-block">14 march 2022 - 01:26 PM</small>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </li>-->
            <!--                    <li>-->
            <!--                        <div class="timeline-panel">-->
            <!--                            <div class="media mr-2">-->
            <!--                                <img alt="image" width="50" src="images/avatar/2.jpg">-->
            <!--                            </div>-->
            <!--                            <div class="media-body">-->
            <!--                                <h6 class="mb-1">Indhu ( Thirukovilur )</h6>-->
            <!--                                <small class="d-block">10 march 2022 - 12:26 PM</small>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </li>-->
            <!--                    <li>-->
            <!--                        <div class="timeline-panel flex-wrap">-->
            <!--                            <div class="media mr-3">-->
            <!--                                <img class="rounded-circle" alt="image" width="50" src="images/widget/2.jpg">-->
            <!--                            </div>-->
            <!--                            <div class="media-body">-->
            <!--                                <h5 class="mb-1"><a class="text-black"-->
            <!--                                        href="patient-details.html">Griezerman</a></h5>-->
            <!--                                <span class="fs-14">24 Years</span>-->
            <!--                            </div>-->
            <!--                            <a href="javascript:void(0);" class="text-info mt-2">On Recovery</a>-->
            <!--                        </div>-->
            <!--                    </li>-->
            <!--                    <li>-->
            <!--                        <div class="timeline-panel flex-wrap">-->
            <!--                            <div class="media mr-3">-->
            <!--                                <img class="rounded-circle" alt="image" width="50" src="images/widget/3.jpg">-->
            <!--                            </div>-->
            <!--                            <div class="media-body">-->
            <!--                                <h5 class="mb-1"><a class="text-black"-->
            <!--                                        href="patient-details.html">Oconner</a></h5>-->
            <!--                                <span class="fs-14">24 Years</span>-->
            <!--                            </div>-->
            <!--                            <a href="javascript:void(0);" class="text-danger mt-2">Rejected</a>-->
            <!--                        </div>-->
            <!--                    </li>-->
            <!--                    <li>-->
            <!--                        <div class="timeline-panel flex-wrap">-->
            <!--                            <div class="media mr-3">-->
            <!--                                <img class="rounded-circle" alt="image" width="50" src="images/widget/5.jpg">-->
            <!--                            </div>-->
            <!--                            <div class="media-body">-->
            <!--                                <h5 class="mb-1"><a class="text-black"-->
            <!--                                        href="patient-details.html">Uli Trumb</a></h5>-->
            <!--                                <span class="fs-14">24 Years</span>-->
            <!--                            </div>-->
            <!--                            <a href="javascript:void(0);" class="text-primary mt-2">Recovered</a>-->
            <!--                        </div>-->
            <!--                    </li>-->
            <!--                    <li>-->
            <!--                        <div class="timeline-panel flex-wrap">-->
            <!--                            <div class="media mr-3">-->
            <!--                                <img class="rounded-circle" alt="image" width="50" src="images/widget/1.jpg">-->
            <!--                            </div>-->
            <!--                            <div class="media-body">-->
            <!--                                <h5 class="mb-1"><a class="text-black"-->
            <!--                                        href="patient-details.html">Aziz Bakree</a></h5>-->
            <!--                                <span class="fs-14">24 Years</span>-->
            <!--                            </div>-->
            <!--                            <a href="javascript:void(0);" class="text-warning mt-2">Pending</a>-->
            <!--                        </div>-->
            <!--                    </li>-->
            <!--                    <li>-->
            <!--                        <div class="timeline-panel flex-wrap">-->
            <!--                            <div class="media mr-3">-->
            <!--                                <img class="rounded-circle" alt="image" width="50" src="images/widget/2.jpg">-->
            <!--                            </div>-->
            <!--                            <div class="media-body">-->
            <!--                                <h5 class="mb-1"><a class="text-black"-->
            <!--                                        href="patient-details.html">Aziz Bakree</a></h5>-->
            <!--                                <span class="fs-14">24 Years</span>-->
            <!--                            </div>-->
            <!--                            <a href="javascript:void(0);" class="text-warning mt-2">Pending</a>-->
            <!--                        </div>-->
            <!--                    </li>-->
            <!--                </ul>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
        </div>
    </div>
    </div>
@endsection


{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
