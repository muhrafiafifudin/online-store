@extends('admin.layouts.admin')

@section('title')
	Diva Metal Mandiri | Customer
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
						<h3 class="card-label">Report Transaction
							<div class="text-muted pt-2 font-size-sm">All Data Transaction</div>
						</h3>
					</div>
				</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <label>From Date</label>
                            <input type="date" name="fromDate" id="fromDate" class="form-control"/>
                        </div>
                        <div class="col-lg-4">
                            <label>Till Date</label>
                            <input type="date" name="toDate" id="toDate" class="form-control"/>
                        </div>
                        <div class="col-lg-4">
                            <label>Type</label>
                            <select class="form-control" name="type" id="type">
                                <option value="4">All Process</option>
                                <option value="0">Order</option>
                                <option value="1">Process</option>
                                <option value="2">Delivery</option>
                                <option value="3">Finish</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="" onclick="this.href='/admin/print-pdf/' + document.getElementById('fromDate').value + '/' + document.getElementById('toDate').value + '/' + document.getElementById('type').value" target="_blank" class="btn btn-primary mr-2">Print PDF</a>
                </div>
			</div>
			<!--end::Card-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>
<!--end::Content-->
@endsection
