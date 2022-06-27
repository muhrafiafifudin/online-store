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

                    @include('admin.includes.header-transaction')

                    <div class="tab-content">
                        <div class="tab-pane fade show active mt-10">
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
                                                    <form action="{{ url('admin/transaction/update-delivery/' . $transaction->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-primary">Delivery</button>
                                                        <button class="btn btn-warning" onclick="return confirm('Are you sure ?')">View</button>
                                                    </form>
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
