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
                    <ul class="nav nav-success nav-pills" id="myTab1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="order-tab" data-toggle="tab" href="#order">
                                <span class="nav-icon"><i class="flaticon2-list-2"></i></span>
                                <span class="nav-text">Order</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="process-tab" data-toggle="tab" href="#process">
                                <span class="nav-icon"><i class="flaticon2-cube"></i></span>
                                <span class="nav-text">On Process</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="delivery-tab" data-toggle="tab" href="#delivery">
                                <span class="nav-icon"><i class="flaticon2-lorry"></i></span>
                                <span class="nav-text">Delivery</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="finish-tab" data-toggle="tab" href="#finish">
                                <span class="nav-icon"><i class="flaticon2-notepad"></i></span>
                                <span class="nav-text">Finish</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content mt-5" id="myTabContent1">
                        <div class="tab-pane fade show active" id="order" role="tabpanel" aria-labelledby="order-tab">
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
                                    @php $no = 1 @endphp
                                    @foreach ($transactions as $transaction)
                                        @if ($transaction->process == 0)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $transaction->order_number }}</td>
                                                <td>{{ $transaction->name }}</td>
                                                <td>{{ $transaction->email }}</td>
                                                <td>IDR. {{ number_format($transaction->gross_amount, 2, '.', ',') }}</td>
                                                <td>{{ $transaction->created_at }}</td>
                                                <td>
                                                    <form action="{{ url('admin/transaction/update-process/' . $transaction->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        <button type="submit" class="btn btn-primary">Process</button>
                                                        <a href="{{ url('admin/transaction-detail/' . $transaction->id) }}" class="btn btn-warning mr-2">View</a>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="process" role="tabpanel" aria-labelledby="process-tab">
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
                                                <td>IDR. {{ number_format($transaction->gross_amount, 2, '.', ',') }}</td>
                                                <td>{{ $transaction->created_at }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModalCenter">Delivery</button>
                                                    <a href="{{ url('admin/transaction-detail/' . $transaction->id) }}" class="btn btn-warning mr-2">View</a>

                                                    <!-- Modal-->
                                                    <div class="modal fade" id="exampleModalCenter" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <form action="{{ url('admin/transaction/update-delivery/' . $transaction->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Added Receipt Number</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <label>Receipt Number</label>
                                                                        <input type="text" name="resi" class="form-control" placeholder="Enter receipt number ..." required/>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary font-weight-bold">Save</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="delivery" role="tabpanel" aria-labelledby="delivery-tab">
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
                                                <td>IDR. {{ number_format($transaction->gross_amount, 2, '.', ',') }}</td>
                                                <td>{{ $transaction->created_at }}</td>
                                                <td>
                                                    <a href="{{ url('admin/transaction-detail/' . $transaction->id) }}" class="btn btn-warning mr-2">View</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="finish" role="tabpanel" aria-labelledby="finish-tab">
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
                                                <td>IDR. {{ number_format($transaction->gross_amount, 2, '.', ',') }}</td>
                                                <td>{{ $transaction->created_at }}</td>
                                                <td>
                                                    <a href="{{ url('admin/transaction-detail/' . $transaction->id) }}" class="btn btn-warning mr-2">View</a>
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
