@extends('admin.layouts.admin')

@section('title')
	Diva Metal Mandiri | Transaction
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
					<h5 class="text-dark font-weight-bold my-1 mr-5">Transaction</h5>
					<!--end::Page Title-->
					<!--begin::Breadcrumb-->
					<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
						<li class="breadcrumb-item">
							<a href="" class="text-muted">Dashboard</a>
						</li>
						<li class="breadcrumb-item">
							<a href="" class="text-muted">Transaction</a>
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
						<h3 class="card-label">Transaction
							<div class="text-muted pt-2 font-size-sm">All Data Transactions</div>
						</h3>
					</div>
				</div>
				<div class="card-body">
                    <div class="card-toolbar">
                        <ul class="nav nav-success nav-pills nav-tabs-line">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#order">
                                    <span class="nav-icon"><i class="flaticon2-list-2"></i></span>
                                    <span class="nav-text">Order</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#onProcess">
                                    <span class="nav-icon"><i class="flaticon2-cube"></i></span>
                                    <span class="nav-text">On Process</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#delivery">
                                    <span class="nav-icon"><i class="flaticon2-lorry"></i></span>
                                    <span class="nav-text">Delivery</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#finish">
                                    <span class="nav-icon"><i class="flaticon2-notepad"></i></span>
                                    <span class="nav-text">Finish</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active mt-10" id="order" role="tabpanel">
                            <table class="table table-checkable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Order Number</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1 @endphp
                                    @foreach ($transactions as $transaction)
                                        @if ($transaction->process == 0)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $transaction->order_number }}</td>
                                                <td>{{ $transaction->name }}</td>
                                                <td>{{ $transaction->email }}</td>
                                                <td>{{ $transaction->gross_amount }}</td>
                                                <td>{{ $transaction->created_at }}</td>
                                                <td>
                                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')">Process</button>
                                                    <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure ?')">View</button>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade mt-10" id="onProcess" role="tabpanel">
                            <table class="table table-checkable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Order Number</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1 @endphp
                                    @foreach ($transactions as $transaction)
                                        @if ($transaction->process == 1)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $transaction->order_number }}</td>
                                                <td>{{ $transaction->name }}</td>
                                                <td>{{ $transaction->email }}</td>
                                                <td>{{ $transaction->gross_amount }}</td>
                                                <td>{{ $transaction->created_at }}</td>
                                                <td>
                                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')">Delivery</button>
                                                    <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure ?')">View</button>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade mt-10" id="delivery" role="tabpanel">
                            <table class="table table-checkable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Order Number</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1 @endphp
                                    @foreach ($transactions as $transaction)
                                        @if ($transaction->process == 2)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $transaction->order_number }}</td>
                                                <td>{{ $transaction->name }}</td>
                                                <td>{{ $transaction->email }}</td>
                                                <td>{{ $transaction->gross_amount }}</td>
                                                <td>{{ $transaction->created_at }}</td>
                                                <td>
                                                    <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure ?')">View</button>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade mt-10" id="finish" role="tabpanel">
                            <table class="table table-checkable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Order Number</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1 @endphp
                                    @foreach ($transactions as $transaction)
                                        @if ($transaction->process == 3)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $transaction->order_number }}</td>
                                                <td>{{ $transaction->name }}</td>
                                                <td>{{ $transaction->email }}</td>
                                                <td>{{ $transaction->gross_amount }}</td>
                                                <td>{{ $transaction->created_at }}</td>
                                                <td>
                                                    <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure ?')">View</button>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
