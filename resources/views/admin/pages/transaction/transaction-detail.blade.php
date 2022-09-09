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
						<h3 class="card-label">Transaction Details
							<div class="text-muted pt-2 font-size-sm">No. Order : {{ $transactions->order_number }}</div>
						</h3>
					</div>
				</div>
				<div class="card-body">
                    <table class="table table-checkable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1 @endphp
                            @foreach ($transaction_details as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->products->name }}</td>
                                    <td>IDR. {{ number_format($item->products->price, 2, '.', ',') }}</td>
                                    <td>{{ $item->qty }} Pcs</td>
                                    <td>IDR. {{ number_format($item->products->price * $item->qty, 2, '.', ',') }}</td>
                                </tr>
                            @endforeach

                            <tr>
                                <td colspan="3"></td>
                                <td>
                                    <strong>Shipping</strong>
                                </td>
                                <td>IDR. {{ number_format($transactions->shipping, 2, '.', ',') }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td>
                                    <strong>Total</strong>
                                </td>
                                <td>IDR. {{ number_format($transactions->total, 2, '.', ',') }}</td>
                            </tr>
                        </tbody>
                    </table>
				</div>
                <div class="card-footer">
                    <a href="{{ url('admin/transaction') }}" class="btn btn-secondary">Back</a>
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
