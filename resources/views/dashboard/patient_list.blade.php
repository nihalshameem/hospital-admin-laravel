{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
            <!-- row -->
			<div class="container-fluid">
				<div class="form-head d-flex mb-3 mb-md-4 align-items-start">
					<div class="mr-auto d-none d-lg-block">
						<a href="{!! url('/patient-details'); !!}" class="btn btn-primary btn-rounded">+ Add New</a>
					</div>
					
					<div class="input-group search-area ml-auto d-inline-flex mr-3">
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
							<table id="example-5" class="table table-striped patient-list mb-4 dataTablesCard fs-14">
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
										<th>Date Check In</th>
										<th>Patient Name</th>
										<th>Doctor Assgined</th>
										<th>Disease</th>
										<th>Status</th>
										<th>Room No</th>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<div class="checkbox text-right align-self-center">
												<div class="custom-control custom-checkbox ">
													<input type="checkbox" class="custom-control-input" id="customCheckBox1" required="">
													<label class="custom-control-label" for="customCheckBox1"></label>
												</div>
											</div>
										</td>
										<td>#P-00012</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Alexia Kev</td>
										<td>Dr. Samantha</td>
										<td>Allergies & Asthma</td>
										<td>
											<span class="text-nowrap">
												<svg class="mr-2" width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
													<circle cx="4.5" cy="4.5" r="4.5" fill="#FFB800"/>
												</svg>
												<span class="text-warning">Pending</span>
											</span>
										</td>
										<td>AB-002</td>
										<td>
											<a href="#">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>
										</td>
										<td>
											<a href="#">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M3 6H5H21" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<div class="checkbox text-right align-self-center">
												<div class="custom-control custom-checkbox ">
													<input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
													<label class="custom-control-label" for="customCheckBox2"></label>
												</div>
											</div>
										</td>
										<td>#P-00013</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Andrew Stevano</td>
										<td>Dr. Marcus Jr</td>
										<td>Dental Care</td>
										<td>
											<span class="text-nowrap">
												<svg class="mr-2" width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
													<circle cx="4.5" cy="4.5" r="4.5" fill="#FFB800"/>
												</svg>
												<span class="text-warning">Pending</span>
											</span>
										</td>
										<td>AB-003</td>
										<td>
											<a href="#">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>
										</td>
										<td>
											<a href="#">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M3 6H5H21" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<div class="checkbox text-right align-self-center">
												<div class="custom-control custom-checkbox ">
													<input type="checkbox" class="custom-control-input" id="customCheckBox3" required="">
													<label class="custom-control-label" for="customCheckBox3"></label>
												</div>
											</div>
										</td>
										<td>#P-00014</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Brian Lucky</td>
										<td>Dr. David Lee</td>
										<td>Sleep Problem</td>
										<td>
											<span class="text-nowrap">
												<svg class="mr-2" width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
													<circle cx="4.5" cy="4.5" r="4.5" fill="#2BC155"/>
												</svg>
												<span class="text-primary">Recovered</span>
											</span>
										</td>
										<td>AB-002</td>
										<td>
											<a href="#">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>
										</td>
										<td>
											<a href="#">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M3 6H5H21" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<div class="checkbox text-right align-self-center">
												<div class="custom-control custom-checkbox ">
													<input type="checkbox" class="custom-control-input" id="customCheckBox4" required="">
													<label class="custom-control-label" for="customCheckBox4"></label>
												</div>
											</div>
										</td>
										<td>#P-00015</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Bella Simatupang</td>
										<td>Dr. Olivia Jean</td>
										<td>Hearing Loss</td>
										<td>
											<span class="text-nowrap">
												<svg class="mr-2" width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
													<circle cx="4.5" cy="4.5" r="4.5" fill="#369DC9"/>
												</svg>
												<span class="text-info">On Recovery</span>
											</span>
										</td>
										<td>AB-005</td>
										<td>
											<a href="#">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>
										</td>
										<td>
											<a href="#">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M3 6H5H21" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<div class="checkbox text-right align-self-center">
												<div class="custom-control custom-checkbox ">
													<input type="checkbox" class="custom-control-input" id="customCheckBox5" required="">
													<label class="custom-control-label" for="customCheckBox5"></label>
												</div>
											</div>
										</td>
										<td>#P-00016</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Cive Slauw</td>
										<td>Dr. Samantha</td>
										<td>Diabetes</td>
										<td>
											<span class="text-nowrap">
												<svg class="mr-2" width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
													<circle cx="4.5" cy="4.5" r="4.5" fill="#2BC155"/>
												</svg>
												<span class="text-primary">Recovered</span>
											</span>
										</td>
										<td>AB-006</td>
										<td>
											<a href="#">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>
										</td>
										<td>
											<a href="#">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M3 6H5H21" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<div class="checkbox text-right align-self-center">
												<div class="custom-control custom-checkbox ">
													<input type="checkbox" class="custom-control-input" id="customCheckBox6" required="">
													<label class="custom-control-label" for="customCheckBox6"></label>
												</div>
											</div>
										</td>
										<td>#P-00017</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>David Bekam</td>
										<td>Dr. Kevin Zidan</td>
										<td>Alcoholism</td>
										<td>
											<span class="text-nowrap">
												<svg class="mr-2" width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
													<circle cx="4.5" cy="4.5" r="4.5" fill="#FFB800"/>
												</svg>
												<span class="text-warning">Pending</span>
											</span>
										</td>
										<td>AB-007</td>
										<td>
											<a href="#">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>
										</td>
										<td>
											<a href="#">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M3 6H5H21" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<div class="checkbox text-right align-self-center">
												<div class="custom-control custom-checkbox ">
													<input type="checkbox" class="custom-control-input" id="customCheckBox7" required="">
													<label class="custom-control-label" for="customCheckBox7"></label>
												</div>
											</div>
										</td>
										<td>#P-00018</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Enjeline Sari</td>
										<td>Dr. Gustauv Loi</td>
										<td>Cold & Flu</td>
										<td>
											<span class="text-nowrap">
												<svg class="mr-2" width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
													<circle cx="4.5" cy="4.5" r="4.5" fill="#369DC9"/>
												</svg>
												<span class="text-info">On Recovery</span>
											</span>
										</td>
										<td>AB-008</td>
										<td>
											<a href="#">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>
										</td>
										<td>
											<a href="#">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M3 6H5H21" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<div class="checkbox text-right align-self-center">
												<div class="custom-control custom-checkbox ">
													<input type="checkbox" class="custom-control-input" id="customCheckBox8" required="">
													<label class="custom-control-label" for="customCheckBox8"></label>
												</div>
											</div>
										</td>
										<td>#P-00019</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Eddy Cusuma</td>
										<td>Dr. Samantha</td>
										<td>Dental Care</td>
										<td>
											<span class="text-nowrap">
												<svg class="mr-2" width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
													<circle cx="4.5" cy="4.5" r="4.5" fill="#F46B68"/>
												</svg>
												<span class="text-danger">Rejected</span>
											</span>
										</td>
										<td>AB-009</td>
										<td>
											<a href="#">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>
										</td>
										<td>
											<a href="#">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M3 6H5H21" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<div class="checkbox text-right align-self-center">
												<div class="custom-control custom-checkbox ">
													<input type="checkbox" class="custom-control-input" id="customCheckBox9" required="">
													<label class="custom-control-label" for="customCheckBox9"></label>
												</div>
											</div>
										</td>
										<td>#P-00020</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Frank Azire</td>
										<td>Dr. David Lee</td>
										<td>Allergies & Asthma</td>
										<td>
											<span class="text-nowrap">
												<svg class="mr-2" width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
													<circle cx="4.5" cy="4.5" r="4.5" fill="#2BC155"/>
												</svg>
												<span class="text-primary">Recovered</span>
											</span>
										</td>
										<td>AB-020</td>
										<td>
											<a href="#">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>
										</td>
										<td>
											<a href="#">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M3 6H5H21" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<div class="checkbox text-right align-self-center">
												<div class="custom-control custom-checkbox ">
													<input type="checkbox" class="custom-control-input" id="customCheckBox10" required="">
													<label class="custom-control-label" for="customCheckBox10"></label>
												</div>
											</div>
										</td>
										<td>#P-00012</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Alexia Kev</td>
										<td>Dr. Samantha</td>
										<td>Allergies & Asthma</td>
										<td>
											<span class="text-nowrap">
												<svg class="mr-2" width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
													<circle cx="4.5" cy="4.5" r="4.5" fill="#FFB800"/>
												</svg>
												<span class="text-warning">Pending</span>
											</span>
										</td>
										<td>AB-002</td>
										<td>
											<a href="#">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>
										</td>
										<td>
											<a href="#">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M3 6H5H21" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<div class="checkbox text-right align-self-center">
												<div class="custom-control custom-checkbox ">
													<input type="checkbox" class="custom-control-input" id="customCheckBox11" required="">
													<label class="custom-control-label" for="customCheckBox11"></label>
												</div>
											</div>
										</td>
										<td>#P-00012</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Alexia Kev</td>
										<td>Dr. Samantha</td>
										<td>Allergies & Asthma</td>
										<td>
											<span class="text-nowrap">
												<svg class="mr-2" width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
													<circle cx="4.5" cy="4.5" r="4.5" fill="#FFB800"/>
												</svg>
												<span class="text-warning">Pending</span>
											</span>
										</td>
										<td>AB-002</td>
										<td>
											<a href="#">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>
										</td>
										<td>
											<a href="#">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M3 6H5H21" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
            </div>
			
@endsection			