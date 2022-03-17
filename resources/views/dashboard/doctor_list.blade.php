{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
            <!-- row -->
			<div class="container-fluid">
				<div class="form-head d-flex mb-3 mb-md-4 align-items-start">
					<div class="mr-auto d-lg-block">
						<a href="href="{!! url('/doctor-detail'); !!}" class="btn btn-primary btn-rounded">+ Add New</a>
					</div>
					<div class="input-group search-area ml-auto d-inline-flex mr-2">
						<input type="text" class="form-control" placeholder="Search here">
						<div class="input-group-append">
							<button type="button" class="input-group-text"><i class="flaticon-381-search-2"></i></button>
						</div>
					</div>
					<a href="javascript:void(0);" class="settings-icon"><i class="flaticon-381-settings-2 mr-0"></i></a>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<div class="table-responsive">
							<table id="example-5" class="table shadow-hover  table-bordered mb-4 dataTablesCard fs-14">
								<thead>
									<tr>
										<th>
											<div class="checkbox align-self-center">
												<div class="custom-control custom-checkbox ">
													<input type="checkbox" class="custom-control-input" id="checkAll" required="">
													<label class="custom-control-label" for="checkAll"></label>
												</div>
											</div>
										</th>
										<th>ID</th>
										<th>Date Join</th>
										<th>Doctor Name</th>
										<th>Specialist</th>
										<th>Schedule</th>
										<th>Contact</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div class="checkbox text-right align-self-center">
													<div class="custom-control custom-checkbox ">
														<input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
														<label class="custom-control-label" for="customCheckBox2"></label>
													</div>
												</div>
												<img alt="" src="{{ asset('images/doctors/9.jpg') }}" height="43" width="43" class="rounded-circle ml-4">
											</div>
										</td>
										<td>#P-00012</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Dr. Samantha</td>
										<td>Dentist</td>
										<td>
											<a href="#" class="btn btn-primary light btn-rounded btn-sm text-nowrap" >5 Appointment</a>
										</td>
										<td><span class="font-w500">+12 4124 5125</span></td>
										<td>
											<div class="d-flex align-items-center">
												<span class="text-light font-w600">Unavailable</span>
												<div class="dropdown ml-auto text-right">
													<div class="btn-link" data-toggle="dropdown" >
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														</svg>
													</div>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#">View Detail</a>
														<a class="dropdown-item" href="#">Edit</a>
														<a class="dropdown-item" href="#">Delete</a>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div class="checkbox text-right align-self-center">
													<div class="custom-control custom-checkbox ">
														<input type="checkbox" class="custom-control-input" id="customCheckBox21" required="">
														<label class="custom-control-label" for="customCheckBox21"></label>
													</div>
												</div>
												<img alt="" src="{{ asset('images/doctors/10.jpg') }}" height="43" width="43" class="rounded-circle ml-4">
											</div>
										</td>
										<td>#P-00016</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Dr. Cindy Anderson</td>
										<td>Physical Therapy</td>
										<td>
											<a href="#" class="btn btn-primary light btn-rounded btn-sm" >2 Appointment</a>
										</td>
										<td><span class="font-w500">+12 4124 1556</span></td>
										<td>
											<div class="d-flex align-items-center">
												<span class="text-light font-w600">Unavailable</span>
												<div class="dropdown ml-auto text-right">
													<div class="btn-link" data-toggle="dropdown" >
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														</svg>
													</div>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#">View Detail</a>
														<a class="dropdown-item" href="#">Edit</a>
														<a class="dropdown-item" href="#">Delete</a>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div class="checkbox text-right align-self-center">
													<div class="custom-control custom-checkbox ">
														<input type="checkbox" class="custom-control-input" id="customCheckBox22" required="">
														<label class="custom-control-label" for="customCheckBox22"></label>
													</div>
												</div>
												<img alt="" src="{{ asset('images/doctors/11.jpg') }}" height="43" width="43" class="rounded-circle ml-4">
											</div>
										</td>
										<td>#P-00015</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Dr. Olivia Jean</td>
										<td>Dentist</td>
										<td>
											<a href="#" class="btn btn-outline-light btn-rounded btn-sm" >No Schedule</a>
										</td>
										<td><span class="font-w500">+12 4156 6675</span></td>
										<td>
											<div class="d-flex align-items-center">
												<span class="text-light font-w600">Unavailable</span>
												<div class="dropdown ml-auto text-right">
													<div class="btn-link" data-toggle="dropdown" >
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														</svg>
													</div>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#">View Detail</a>
														<a class="dropdown-item" href="#">Edit</a>
														<a class="dropdown-item" href="#">Delete</a>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div class="checkbox text-right align-self-center">
													<div class="custom-control custom-checkbox ">
														<input type="checkbox" class="custom-control-input" id="customCheckBox24" required="">
														<label class="custom-control-label" for="customCheckBox24"></label>
													</div>
												</div>
												<img alt="" src="{{ asset('images/doctors/12.jpg') }}" height="43" width="43" class="rounded-circle ml-4">
											</div>
										</td>
										<td>#P-00014</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Dr. David Lee</td>
										<td>Nursing</td>
										<td>
											<a href="#" class="btn btn-primary light btn-rounded btn-sm" >2 Appointment</a>
										</td>
										<td><span class="font-w500">+12 4155 7623</span></td>
										<td>
											<div class="d-flex align-items-center">
												<span class="text-primary font-w600">Available</span>
												<div class="dropdown ml-auto text-right">
													<div class="btn-link" data-toggle="dropdown" >
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														</svg>
													</div>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#">View Detail</a>
														<a class="dropdown-item" href="#">Edit</a>
														<a class="dropdown-item" href="#">Delete</a>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div class="checkbox text-right align-self-center">
													<div class="custom-control custom-checkbox ">
														<input type="checkbox" class="custom-control-input" id="customCheckBox25" required="">
														<label class="custom-control-label" for="customCheckBox25"></label>
													</div>
												</div>
												<img alt="" src="{{ asset('images/doctors/13.jpg') }}" height="43" width="43" class="rounded-circle ml-4">
											</div>
										</td>
										<td>#P-00013</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Dr. Marcus Jr</td>
										<td>Physical Therapy</td>
										<td>
											<a href="#" class="btn btn-primary light btn-rounded btn-sm" >2 Appointment</a>
										</td>
										<td><span class="font-w500">+12 4124 5156</span></td>
										<td>
											<div class="d-flex align-items-center">
												<span class="text-light font-w600">Unavailable</span>
												<div class="dropdown ml-auto text-right">
													<div class="btn-link" data-toggle="dropdown" >
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														</svg>
													</div>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#">View Detail</a>
														<a class="dropdown-item" href="#">Edit</a>
														<a class="dropdown-item" href="#">Delete</a>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div class="checkbox text-right align-self-center">
													<div class="custom-control custom-checkbox ">
														<input type="checkbox" class="custom-control-input" id="customCheckBox26" required="">
														<label class="custom-control-label" for="customCheckBox26"></label>
													</div>
												</div>
												<img alt="" src="{{ asset('images/doctors/14.jpg') }}" height="43" width="43" class="rounded-circle ml-4">
											</div>
										</td>
										<td>#P-00017</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Dr. Kevin Zidan</td>
										<td>Nursing</td>
										<td>
											<a href="#" class="btn btn-outline-light btn-rounded btn-sm" >No Schedule</a>
										</td>
										<td><span class="font-w500">+12 4122 4556</span></td>
										<td>
											<div class="d-flex align-items-center">
												<span class="text-light font-w600">Unavailable</span>
												<div class="dropdown ml-auto text-right">
													<div class="btn-link" data-toggle="dropdown" >
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														</svg>
													</div>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#">View Detail</a>
														<a class="dropdown-item" href="#">Edit</a>
														<a class="dropdown-item" href="#">Delete</a>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div class="checkbox text-right align-self-center">
													<div class="custom-control custom-checkbox ">
														<input type="checkbox" class="custom-control-input" id="customCheckBox27" required="">
														<label class="custom-control-label" for="customCheckBox27"></label>
													</div>
												</div>
												<img alt="" src="{{ asset('images/doctors/15.jpg') }}" height="43" width="43" class="rounded-circle ml-4">
											</div>
										</td>
										<td>#P-00018</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Dr. Gustauv Loi</td>
										<td>Dentist</td>
										<td>
											<a href="#" class="btn btn-primary light btn-rounded btn-sm" >2 Appointment</a>
										</td>
										<td><span class="font-w500">+12 2567 8654</span></td>
										<td>
											<div class="d-flex align-items-center">
												<span class="text-primary font-w600">Available</span>
												<div class="dropdown ml-auto text-right">
													<div class="btn-link" data-toggle="dropdown" >
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														</svg>
													</div>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#">View Detail</a>
														<a class="dropdown-item" href="#">Edit</a>
														<a class="dropdown-item" href="#">Delete</a>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div class="checkbox text-right align-self-center">
													<div class="custom-control custom-checkbox ">
														<input type="checkbox" class="custom-control-input" id="customCheckBox28" required="">
														<label class="custom-control-label" for="customCheckBox28"></label>
													</div>
												</div>
												<img alt="" src="{{ asset('images/doctors/16.jpg') }}" height="43" width="43" class="rounded-circle ml-4">
											</div>
										</td>
										<td>#P-00019</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Dr. Samantha</td>
										<td>Nursing</td>
										<td>
											<a href="#" class="btn btn-outline-light btn-rounded btn-sm" >No Schedule</a>
										</td>
										<td><span class="font-w500">+12 4125 6211</span></td>
										<td>
											<div class="d-flex align-items-center">
												<span class="text-light font-w600">Unavailable</span>
												<div class="dropdown ml-auto text-right">
													<div class="btn-link" data-toggle="dropdown" >
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														</svg>
													</div>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#">View Detail</a>
														<a class="dropdown-item" href="#">Edit</a>
														<a class="dropdown-item" href="#">Delete</a>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div class="checkbox text-right align-self-center">
													<div class="custom-control custom-checkbox ">
														<input type="checkbox" class="custom-control-input" id="customCheckBox29" required="">
														<label class="custom-control-label" for="customCheckBox29"></label>
													</div>
												</div>
												<img alt="" src="{{ asset('images/doctors/10.jpg') }}" height="43" width="43" class="rounded-circle ml-4">
											</div>
										</td>
										<td>#P-000110</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Dr. David Lee</td>
										<td>Physical Therapy</td>
										<td>
											<a href="#" class="btn btn-primary light btn-rounded btn-sm" >2 Appointment</a>
										</td>
										<td><span class="font-w500">+12 6567 1245</span></td>
										<td>
											<div class="d-flex align-items-center">
												<span class="text-primary font-w600">Available</span>
												<div class="dropdown ml-auto text-right">
													<div class="btn-link" data-toggle="dropdown" >
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														</svg>
													</div>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#">View Detail</a>
														<a class="dropdown-item" href="#">Edit</a>
														<a class="dropdown-item" href="#">Delete</a>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div class="checkbox text-right align-self-center">
													<div class="custom-control custom-checkbox ">
														<input type="checkbox" class="custom-control-input" id="customCheckBox200" required="">
														<label class="custom-control-label" for="customCheckBox200"></label>
													</div>
												</div>
												<img alt="" src="{{ asset('images/doctors/1.jpg') }}" height="43" width="43" class="rounded-circle ml-4">
											</div>
										</td>
										<td>#P-00012</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Dr. Samantha</td>
										<td>Dentist</td>
										<td>
											<a href="#" class="btn btn-primary light btn-rounded btn-sm" >5 Appointment</a>
										</td>
										<td><span class="font-w500">+12 4124 5125</span></td>
										<td>
											<div class="d-flex align-items-center">
												<span class="text-light font-w600">Unavailable</span>
												<div class="dropdown ml-auto text-right">
													<div class="btn-link" data-toggle="dropdown" >
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														</svg>
													</div>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#">View Detail</a>
														<a class="dropdown-item" href="#">Edit</a>
														<a class="dropdown-item" href="#">Delete</a>
													</div>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
            </div>
			
@endsection			