{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

			<div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <p class="mb-0">Your business dashboard template</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Plugins</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Light Gallery</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                                <div class="card-header">
									<h4 class="card-title">Light Gallery</h4>
								</div>
								<div class="card-body">
									<div id="lightgallery" class="row">
										<a href="{{ asset('images/gallery/pic1.jpg') }}" data-exthumbimage="{{ asset('images/gallery/pic1.jpg') }}" data-src="{{ asset('images/gallery/pic1.jpg') }}" class="col-3 col-sm-6 col-md-3">
											<img src="{{ asset('images/gallery/pic1.jpg') }}" class="w-100"/>
										</a>
										<a href="{{ asset('images/gallery/pic2.jpg') }}" data-exthumbimage="{{ asset('images/gallery/pic2.jpg') }}" data-src="{{ asset('images/gallery/pic2.jpg') }}" class="col-3 col-sm-6 col-md-3">
											<img src="{{ asset('images/gallery/pic2.jpg') }}" class="w-100" />
										</a>
										<a href="{{ asset('images/gallery/pic3.jpg') }}" data-exthumbimage="{{ asset('images/gallery/pic3.jpg') }}" data-src="{{ asset('images/gallery/pic3.jpg') }}" class="col-3 col-sm-6 col-md-3">
											<img src="{{ asset('images/gallery/pic3.jpg') }}" class="w-100" />
										</a>
										<a href="{{ asset('images/gallery/pic4.jpg') }}" data-exthumbimage="{{ asset('images/gallery/pic4.jpg') }}" data-src="{{ asset('images/gallery/pic4.jpg') }}" class="col-3 col-sm-6 col-md-3">
											<img src="{{ asset('images/gallery/pic4.jpg') }}" class="w-100" />
										</a>
									</div>
								</div>
                        </div>
                        <!-- /# card -->
                    </div>
                </div>
			</div>
			
@endsection