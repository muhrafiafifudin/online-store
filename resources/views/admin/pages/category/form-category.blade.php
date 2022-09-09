@extends('admin.layouts.admin')

@section('title')
	Diva Metal Mandiri | Shop
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
					<h5 class="text-dark font-weight-bold my-1 mr-5">Pages Shop</h5>
					<!--end::Page Title-->
					<!--begin::Breadcrumb-->
					<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
						<li class="breadcrumb-item">
							<a href="" class="text-muted">Dashboard</a>
						</li>
						<li class="breadcrumb-item">
							<a href="" class="text-muted">Shop</a>
						</li>
						<li class="breadcrumb-item">
							<a href="" class="text-muted">Category</a>
						</li>
						<li class="breadcrumb-item">
							<a href="" class="text-muted">Add Category</a>
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
						<h3 class="card-label">Form Category
							<div class="text-muted pt-2 font-size-sm">Add Data Category</div>
						</h3>
					</div>
				</div>
				<!--begin::Form-->
				<form action="{{ route('admin.category.store') }}" method="post">
					@csrf
					@method('POST')

					<div class="card-body">
						<div class="form-group">
							<label>Category
							<span class="text-danger">*</span></label>
							<input type="text" name="category" class="form-control" placeholder="Enter category ..." required/>
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-primary mr-2">Submit</button>
						<a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Cancel</a>
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
