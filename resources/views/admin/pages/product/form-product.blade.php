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
							<a href="" class="text-muted">Item</a>
						</li>
						<li class="breadcrumb-item">
							<a href="" class="text-muted">Add Item</a>
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
						<h3 class="card-label">Form Item
							<div class="text-muted pt-2 font-size-sm">Add Data Item</div>
						</h3>
					</div>
				</div>
				<!--begin::Form-->
				<form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					@method('POST')

					<div class="card-body">
						<div class="form-group">
							<label>Name Product</label>
							<input type="text" name="name" class="form-control" placeholder="Enter product name ..." required/>
						</div>
						<div class="form-group">
							<label>Images</label>
							<div></div>
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="photos" required/>
								<label class="custom-file-label">Choose file</label>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleTextarea">Description</label>
							<textarea class="form-control" name="description" rows="3" required></textarea>
						</div>
						<div class="form-group">
							<label for="exampleSelect1">Category</label>
							<select class="form-control" name="categories_id" required>
                                <option value="">Choose Your Category</option>
								@foreach ($category as $data)
									<option value="{{ $data->id }}">{{ $data->category }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Price</label>
							<input type="number" name="price" class="form-control" placeholder="Enter price ..." required/>
						</div>
						<div class="form-group">
							<label>Weight</label>
							<input type="number" name="weight" class="form-control" placeholder="Enter weight ..." required/>
						</div>
						<div class="form-group">
							<label>Stock</label>
							<input type="number" name="stock" class="form-control" placeholder="Enter stock ..." required/>
						</div>
						<div class="form-group">
							<label>Slug</label>
							<input type="text" name="slug" class="form-control" placeholder="Enter slug ..." required/>
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Save</button>
						<a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Cancel</a>
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
