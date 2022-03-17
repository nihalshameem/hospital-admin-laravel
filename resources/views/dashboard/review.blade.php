{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
            <!-- row -->
			<div class="container-fluid">
				<div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Settings</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Reviews</a></li>
					</ol>
                </div>
				<div class="form-head d-flex mb-3 mb-md-4 align-items-start">
					<div class="mr-auto d-none d-lg-block">
						<a href="#" class="btn btn-primary btn-rounded mr-2">Publish</a>
						<a href="#" class="btn btn-danger btn-rounded">Delete</a>
					</div>
					
					<div class="input-group search-area ml-auto d-inline-flex">
						<input type="text" class="form-control" placeholder="Search here">
						<div class="input-group-append">
							<button type="button" class="input-group-text"><i class="flaticon-381-search-2"></i></button>
						</div>
					</div>
					<div class="dropdown ml-2 d-inline-block">
						<div class="btn btn-primary light btn-rounded dropdown-toggle" data-toggle="dropdown">
							Newest
						</div>
						<div class="dropdown-menu dropdown-menu-left">
							<a class="dropdown-item" href="javascript:void(0);">Newest</a>
							<a class="dropdown-item" href="javascript:void(0);">Old</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<ul class="nav nav-pills review-tab">
							<li class="nav-item">
								<a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">All Review</a>
							</li>
							<li class="nav-item">
								<a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">Published</a>
							</li>
							<li class="nav-item">
								<a href="#navpills-3" class="nav-link" data-toggle="tab" aria-expanded="true">Deleted</a>
							</li>
						</ul>
						<div class="tab-content">
							<div id="navpills-1" class="tab-pane active">
								<div class="card review-table">
									<div class="media align-items-center">
										<div class="checkbox mr-lg-4 mr-0 align-self-center">
											<div class="custom-control custom-checkbox checkbox-info">
												<input type="checkbox" class="custom-control-input" checked="" id="customCheckBox1" required="">
												<label class="custom-control-label" for="customCheckBox1"></label>
											</div>
										</div>
										<img class="mr-3 img-fluid rounded" width="90" src="{{ asset('images/doctors/6.jpg') }}" alt="DexignZone">
										<div class="media-body d-lg-flex d-block row align-items-center">
											<div class="col-xl-4 col-xxl-5 col-lg-6 review-bx">
												<h3 class="fs-20 font-w600 mb-1"><a class="text-black" href="javascript:void(0);">Glee Smiley</a></h3>
												<span class="fs-15 d-block">Sunday, 24 July 2020   04:55 PM</span>
												<span class="text-primary d-block font-w600 mt-sm-2 mt-3"><i class="las la-stethoscope scale5 mr-3"></i>Diabetes</span>
											</div>
											<div class="col-xl-7 col-xxl-7 col-lg-6 text-dark mb-lg-0 mb-2">
												When I came with my mother, I was very nervous. But after entering here I felt warmed with smiling
											</div>
										</div>
										<div class="media-footer d-sm-flex d-block align-items-center">
											<div class="disease mr-5">
												<span class="star-review ml-lg-3 mb-sm-0 mb-2 ml-0 d-inline-block">
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-gray"></i>
												</span>
											</div>
											<div class="edit ml-auto">
												<a href="javascript:void(0);" class="text-primary font-w600 mr-4">PUBLISH</a>
												<a href="javascript:void(0);" class="text-danger font-w600">DELETE</a>
											</div>
										</div>
									</div>
								</div>
								<div class="card review-table">
									<div class="media align-items-center">
										<div class="checkbox mr-lg-4 mr-0 align-self-center">
											<div class="custom-control custom-checkbox checkbox-info">
												<input type="checkbox" class="custom-control-input" checked="" id="customCheckBox2" required="">
												<label class="custom-control-label" for="customCheckBox2"></label>
											</div>
										</div>
										<img class="mr-3 img-fluid rounded" width="90" src="{{ asset('images/doctors/17.jpg') }}" alt="DexignZone">
										<div class="media-body d-lg-flex d-block row align-items-center">
											<div class="col-xl-4 col-xxl-5 col-lg-6 review-bx">
												<h3 class="fs-20 font-w600 mb-1"><a class="text-black" href="javascript:void(0);">Alexia Kev</a></h3>
												<span class="fs-15 d-block">Sunday, 24 July 2020   04:55 PM</span>
												<span class="text-primary d-block font-w600 mt-sm-2 mt-3"><i class="las la-stethoscope scale5 mr-3"></i>Allergies & Atshma</span>
											</div>
											<div class="col-xl-7 col-xxl-7 col-lg-6 text-dark mb-lg-0 mb-2">
												Thanks for all the services, no doubt it is the best hospital. My kidney, BP, diabetes problem
											</div>
										</div>
										<div class="media-footer d-sm-flex d-block align-items-center">
											<div class="disease mr-5">
												<span class="star-review ml-lg-3 mb-sm-0 mb-2 ml-0 d-inline-block">
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-gray"></i>
												</span>
											</div>
											<div class="edit ml-auto">
												<a href="javascript:void(0);" class="text-primary font-w600 mr-4">PUBLISH</a>
												<a href="javascript:void(0);" class="text-danger font-w600">DELETE</a>
											</div>
										</div>
									</div>
								</div>
								<div class="card review-table">
									<div class="media align-items-center">
										<div class="checkbox mr-lg-4 mr-0 align-self-center">
											<div class="custom-control custom-checkbox checkbox-info">
												<input type="checkbox" class="custom-control-input" checked="" id="customCheckBox3" required="">
												<label class="custom-control-label" for="customCheckBox3"></label>
											</div>
										</div>
										<img class="mr-3 img-fluid rounded" width="90" src="{{ asset('images/doctors/18.jpg') }}" alt="DexignZone">
										<div class="media-body d-lg-flex d-block row align-items-center">
											<div class="col-xl-4 col-xxl-5 col-lg-6 review-bx">
												<h3 class="fs-20 font-w600 mb-1"><a class="text-black" href="javascript:void(0);">Brian Lucky</a></h3>
												<span class="fs-15 d-block">Sunday, 24 July 2020   04:55 PM</span>
												<span class="text-primary d-block font-w600 mt-sm-2 mt-3"><i class="las la-stethoscope scale5 mr-3"></i>Dental Care</span>
											</div>
											<div class="col-xl-7 col-xxl-7 col-lg-6 text-dark mb-lg-0 mb-2">
												Hospital & staff were extremely warm & quick in getting me start with the procedures
											</div>
										</div>
										<div class="media-footer d-sm-flex d-block align-items-center">
											<div class="disease mr-5">
												<span class="star-review ml-lg-3 mb-sm-0 mb-2 ml-0 d-inline-block">
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-gray"></i>
												</span>
											</div>
											<div class="edit ml-auto">
												<a href="javascript:void(0);" class="text-primary font-w600 mr-4">PUBLISH</a>
												<a href="javascript:void(0);" class="text-danger font-w600">DELETE</a>
											</div>
										</div>
									</div>
								</div>
								<div class="card review-table">
									<div class="media align-items-center">
										<div class="checkbox mr-lg-4 mr-0 align-self-center">
											<div class="custom-control custom-checkbox checkbox-info">
												<input type="checkbox" class="custom-control-input" checked="" id="customCheckBox4" required="">
												<label class="custom-control-label" for="customCheckBox4"></label>
											</div>
										</div>
										<img class="mr-3 img-fluid rounded" width="90" src="{{ asset('images/doctors/19.jpg') }}" alt="DexignZone">
										<div class="media-body d-lg-flex d-block row align-items-center">
											<div class="col-xl-4 col-xxl-5 col-lg-6 review-bx">
												<h3 class="fs-20 font-w600 mb-1"><a class="text-black" href="javascript:void(0);">Don Jhon</a></h3>
												<span class="fs-15 d-block">Sunday, 24 July 2020   04:55 PM</span>
												<span class="text-primary d-block font-w600 mt-sm-2 mt-3"><i class="las la-stethoscope scale5 mr-3"></i>Physical Therapy</span>
											</div>
											<div class="col-xl-7 col-xxl-7 col-lg-6 text-dark mb-lg-0 mb-2">
												I am very much glad to note my feedback and grateful. Thanks to Dr. Chibber and assistants. I got very good guidelines for my patient.
											</div>
										</div>
										<div class="media-footer d-sm-flex d-block align-items-center">
											<div class="disease mr-5">
												<span class="star-review ml-lg-3 mb-sm-0 mb-2 ml-0 d-inline-block">
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-gray"></i>
												</span>
											</div>
											<div class="edit ml-auto">
												<a href="javascript:void(0);" class="text-primary font-w600 mr-4">PUBLISH</a>
												<a href="javascript:void(0);" class="text-danger font-w600">DELETE</a>
											</div>
										</div>
									</div>
								</div>
								<div class="card review-table">
									<div class="media align-items-center">
										<div class="checkbox mr-lg-4 mr-0 align-self-center">
											<div class="custom-control custom-checkbox checkbox-info">
												<input type="checkbox" class="custom-control-input" checked="" id="customCheckBox5" required="">
												<label class="custom-control-label" for="customCheckBox5"></label>
											</div>
										</div>
										<img class="mr-3 img-fluid rounded" width="90" src="{{ asset('images/doctors/20.jpg') }}" alt="DexignZone">
										<div class="media-body d-lg-flex d-block row align-items-center">
											<div class="col-xl-4 col-xxl-5 col-lg-6 review-bx">
												<h3 class="fs-20 font-w600 mb-1"><a class="text-black" href="javascript:void(0);">Olivia Smuth</a></h3>
												<span class="fs-15 d-block">Sunday, 24 July 2020   04:55 PM</span>
												<span class="text-primary d-block font-w600 mt-sm-2 mt-3"><i class="las la-stethoscope scale5 mr-3"></i>Allergies & Atshma</span>
											</div>
											<div class="col-xl-7 col-xxl-7 col-lg-6 text-dark mb-lg-0 mb-2">
												It was never a feeling as if I was in a hospital. I got the best care. The response of each staff, right from security (screening), housekeeping, admission staff, nurses, trainee doctor, Doctor was excellent. 
											</div>
										</div>
										<div class="media-footer d-sm-flex d-block align-items-center">
											<div class="disease mr-5">
												<span class="star-review ml-lg-3 mb-sm-0 mb-2 ml-0 d-inline-block">
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-gray"></i>
												</span>
											</div>
											<div class="edit ml-auto">
												<a href="javascript:void(0);" class="text-primary font-w600 mr-4">PUBLISH</a>
												<a href="javascript:void(0);" class="text-danger font-w600">DELETE</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="navpills-2" class="tab-pane">
								<div class="card review-table">
									<div class="media align-items-center">
										<div class="checkbox mr-lg-4 ml-0 align-self-center">
											<div class="custom-control custom-checkbox checkbox-info">
												<input type="checkbox" class="custom-control-input" checked="" id="customCheckBox6" required="">
												<label class="custom-control-label" for="customCheckBox6"></label>
											</div>
										</div>
										<img class="mr-3 img-fluid rounded" width="90" src="{{ asset('images/doctors/18.jpg') }}" alt="DexignZone">
										<div class="media-body d-lg-flex d-block row align-items-center">
											<div class="col-xl-4 col-xxl-5 col-lg-6 review-bx">
												<h3 class="fs-20 font-w600 mb-1"><a class="text-black" href="javascript:void(0);">Glee Smiley</a></h3>
												<span class="fs-15 d-block">Sunday, 24 July 2020   04:55 PM</span>
												<span class="text-primary d-block font-w600 mt-sm-2 mt-3"><i class="las la-stethoscope scale5 mr-3"></i>Diabetes</span>
											</div>
											<div class="col-xl-7 col-xxl-7 col-lg-6 text-dark mb-lg-0 mb-2">
												When I came with my mother, I was very nervous. But after entering here I felt warmed with smiling
											</div>
										</div>
										<div class="media-footer d-sm-flex d-block align-items-center">
											<div class="disease mr-5">
												<span class="star-review ml-lg-3 mb-sm-0 mb-2 ml-0 d-inline-block">
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-gray"></i>
												</span>
											</div>
											<div class="edit ml-auto">
												<a href="javascript:void(0);" class="text-primary font-w600 mr-4">PUBLISH</a>
												<a href="javascript:void(0);" class="text-danger font-w600">DELETE</a>
											</div>
										</div>
									</div>
								</div>
								<div class="card review-table">
									<div class="media align-items-center">
										<div class="checkbox mr-lg-4 ml-0 align-self-center">
											<div class="custom-control custom-checkbox checkbox-info">
												<input type="checkbox" class="custom-control-input" checked="" id="customCheckBox7" required="">
												<label class="custom-control-label" for="customCheckBox7"></label>
											</div>
										</div>
										<img class="mr-3 img-fluid rounded" width="90" src="{{ asset('images/doctors/17.jpg') }}" alt="DexignZone">
										<div class="media-body d-lg-flex d-block row align-items-center">
											<div class="col-xl-4 col-xxl-5 col-lg-6 review-bx">
												<h3 class="fs-20 font-w600 mb-1"><a class="text-black" href="javascript:void(0);">Alexia Kev</a></h3>
												<span class="fs-15 d-block">Sunday, 24 July 2020   04:55 PM</span>
												<span class="text-primary d-block font-w600 mt-sm-2 mt-3"><i class="las la-stethoscope scale5 mr-3"></i>Allergies & Atshma</span>
											</div>
											<div class="col-xl-7 col-xxl-7 col-lg-6 text-dark mb-lg-0 mb-2">
												Thanks for all the services, no doubt it is the best hospital. My kidney, BP, diabetes problem
											</div>
										</div>
										<div class="media-footer d-sm-flex d-block align-items-center">
											<div class="disease mr-5">
												<span class="star-review ml-lg-3 mb-sm-0 mb-2 ml-0 d-inline-block">
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-gray"></i>
												</span>
											</div>
											<div class="edit ml-auto">
												<a href="javascript:void(0);" class="text-primary font-w600 mr-4">PUBLISH</a>
												<a href="javascript:void(0);" class="text-danger font-w600">DELETE</a>
											</div>
										</div>
									</div>
								</div>
								<div class="card review-table">
									<div class="media align-items-center">
										<div class="checkbox mr-lg-4 mr-0 align-self-center">
											<div class="custom-control custom-checkbox checkbox-info">
												<input type="checkbox" class="custom-control-input" checked="" id="customCheckBox8" required="">
												<label class="custom-control-label" for="customCheckBox8"></label>
											</div>
										</div>
										<img class="mr-3 img-fluid rounded" width="90" src="{{ asset('images/doctors/18.jpg') }}" alt="DexignZone">
										<div class="media-body d-lg-flex d-block row align-items-center">
											<div class="col-xl-4 col-xxl-5 col-lg-6 review-bx">
												<h3 class="fs-20 font-w600 mb-1"><a class="text-black" href="javascript:void(0);">Brian Lucky</a></h3>
												<span class="fs-15 d-block">Sunday, 24 July 2020   04:55 PM</span>
												<span class="text-primary d-block font-w600 mt-sm-2 mt-3"><i class="las la-stethoscope scale5 mr-3"></i>Dental Care</span>
											</div>
											<div class="col-xl-7 col-xxl-7 col-lg-6 text-dark mb-lg-0 mb-2">
												Hospital & staff were extremely warm & quick in getting me start with the procedures
											</div>
										</div>
										<div class="media-footer d-sm-flex d-block align-items-center">
											<div class="disease mr-5">
												<span class="star-review ml-lg-3 mb-sm-0 mb-2 ml-0 d-inline-block">
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-gray"></i>
												</span>
											</div>
											<div class="edit ml-auto">
												<a href="javascript:void(0);" class="text-primary font-w600 mr-4">PUBLISH</a>
												<a href="javascript:void(0);" class="text-danger font-w600">DELETE</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="navpills-3" class="tab-pane">
								<div class="card review-table">
									<div class="media align-items-center">
										<div class="checkbox mr-lg-4 mr-0 align-self-center">
											<div class="custom-control custom-checkbox checkbox-info">
												<input type="checkbox" class="custom-control-input" checked="" id="customCheckBox9" required="">
												<label class="custom-control-label" for="customCheckBox9"></label>
											</div>
										</div>
										<img class="mr-3 img-fluid rounded" width="90" src="{{ asset('images/doctors/18.jpg') }}" alt="DexignZone">
										<div class="media-body d-lg-flex d-block row align-items-center">
											<div class="col-xl-4 col-xxl-5 col-lg-6 review-bx">
												<h3 class="fs-20 font-w600 mb-1"><a class="text-black" href="javascript:void(0);">Brian Lucky</a></h3>
												<span class="fs-15 d-block">Sunday, 24 July 2020   04:55 PM</span>
												<span class="text-primary d-block font-w600 mt-sm-2 mt-3"><i class="las la-stethoscope scale5 mr-3"></i>Dental Care</span>
											</div>
											<div class="col-xl-7 col-xxl-7 col-lg-6 text-dark mb-lg-0 mb-2">
												Hospital & staff were extremely warm & quick in getting me start with the procedures
											</div>
										</div>
										<div class="media-footer d-sm-flex d-block align-items-center">
											<div class="disease mr-5">
												<span class="star-review ml-lg-3 mb-sm-0 mb-2 ml-0 d-inline-block">
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-gray"></i>
												</span>
											</div>
											<div class="edit ml-auto">
												<a href="javascript:void(0);" class="text-primary font-w600 mr-4">PUBLISH</a>
												<a href="javascript:void(0);" class="text-danger font-w600">DELETE</a>
											</div>
										</div>
									</div>
								</div>
								<div class="card review-table">
									<div class="media align-items-center">
										<div class="checkbox mr-lg-4 mr-0 align-self-center">
											<div class="custom-control custom-checkbox checkbox-info">
												<input type="checkbox" class="custom-control-input" checked="" id="customCheckBox10" required="">
												<label class="custom-control-label" for="customCheckBox10"></label>
											</div>
										</div>
										<img class="mr-3 img-fluid rounded" width="90" src="{{ asset('images/doctors/7.jpg') }}" alt="DexignZone">
										<div class="media-body d-lg-flex d-block row align-items-center">
											<div class="col-xl-4 col-xxl-5 col-lg-6 review-bx">
												<h3 class="fs-20 font-w600 mb-1"><a class="text-black" href="javascript:void(0);">Brian Lucky</a></h3>
												<span class="fs-15 d-block">Sunday, 24 July 2020   04:55 PM</span>
												<span class="text-primary d-block font-w600 mt-sm-2 mt-3"><i class="las la-stethoscope scale5 mr-3"></i>Dental Care</span>
											</div>
											<div class="col-xl-7 col-xxl-7 col-lg-6 text-dark mb-lg-0 mb-2">
												Hospital & staff were extremely warm & quick in getting me start with the procedures
											</div>
										</div>
										<div class="media-footer d-sm-flex d-block align-items-center">
											<div class="disease mr-5">
												<span class="star-review ml-lg-3 mb-sm-0 mb-2 ml-0 d-inline-block">
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-orange"></i>
													<i class="fa fa-star text-gray"></i>
												</span>
											</div>
											<div class="edit ml-auto">
												<a href="javascript:void(0);" class="text-primary font-w600 mr-4">PUBLISH</a>
												<a href="javascript:void(0);" class="text-danger font-w600">DELETE</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
			
@endsection			