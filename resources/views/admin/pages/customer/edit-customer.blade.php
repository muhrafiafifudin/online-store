@extends('admin.layouts.admin')

@section('title')
	Diva Metal Mandiri | Add Customer
@endsection

@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Subheader-->
	<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
		<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<!--begin::Info-->
			<div class="d-flex align-items-center flex-wrap mr-1">
				<!--begin::Page Heading-->
				<div class="d-flex align-items-baseline flex-wrap mr-5">
					<!--begin::Page Title-->
					<h5 class="text-dark font-weight-bold my-1 mr-5">Pages Customer</h5>
					<!--end::Page Title-->
					<!--begin::Breadcrumb-->
					<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
						<li class="breadcrumb-item">
							<a href="" class="text-muted">Dashboard</a>
						</li>
						<li class="breadcrumb-item">
							<a href="" class="text-muted">Customer</a>
						</li>
						<li class="breadcrumb-item">
							<a href="" class="text-muted">Edit Customer</a>
						</li>
					</ul>
					<!--end::Breadcrumb-->
				</div>
				<!--end::Page Heading-->
			</div>
			<!--end::Info-->
		</div>
	</div>
	<!--end::Subheader-->
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Card-->
			<div class="card card-custom">
				<div class="card-header flex-wrap py-5">
					<div class="card-title">
						<h3 class="card-label">Form Edit Customer
							<div class="text-muted pt-2 font-size-sm">Edit Data Customer</div>
						</h3>
					</div>
				</div>
				<!--begin::Form-->
				<form action="{{ route('admin.customer.update',  $users->id) }}" method="post">
					@csrf
					@method('PUT')

					<div class="card-body">
						<div class="form-group">
							<label>Full Name</label>
							<input type="text" name="name" class="form-control" value="{{ $users->name }}" placeholder="Enter full name ..." required/>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control" value="{{ $users->email }}" placeholder="Enter email ..." required/>
						</div>
						<div class="form-group row">
                            <div class="col-lg-6">
                                <label for="exampleSelect1">Province</label>
                                <select class="form-control" name="provinces_id" id="provinces_id">
                                    <option value="">Choose Province</option>
                                </select>
                            </div>

                            <div class="col-lg-6">
                                <label for="exampleSelect1">City</label>
                                <select class="form-control" name="cities_id" id="cities_id">
                                    <option value="">Choose City</option>
                                </select>
                            </div>
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" name="address" rows="3" placeholder="Enter address ..." required>{{ $users->address }}</textarea>
						</div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Postcode</label>
                                <input type="text" name="postcode" class="form-control" value="{{ $users->postcode }}" placeholder="Enter postcode ..." required/>
                            </div>
                            <div class="col-lg-6">
                                <label>Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" value="{{ $users->phone_number }}" placeholder="Enter phone number ..." required/>
                            </div>
						</div>
					</div>

					<div class="card-footer">
						<button type="submit" class="btn btn-primary mr-2">Submit</button>
						<a href="{{ route('admin.customer.index') }}" class="btn btn-secondary">Cancel</a>
					</div>
				</form>
				<!--end::Form-->
			</div>
			<!--end::Card-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>
<!--end::Content-->

@endsection
