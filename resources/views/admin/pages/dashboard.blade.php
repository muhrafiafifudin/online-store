@extends('admin.layouts.admin')

@section('title')
    Diva Metal Mandiri
@endsection

@section('content')
<!--begin::Entry-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>
                <!--end::Page Title-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--Begin::Row-->
            <div class="row">
                <div class="col-xl-4">
                    <!--begin::Stats Widget 13-->
                    <div class="card card-custom bg-danger card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between flex-grow-1">
                                <span class="text-inverse-danger font-weight-bolder font-size-h2">
                                    +{{ $users }}
                                </span>
                                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Group.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <div class="text-inverse-danger font-weight-bolder font-size-h6 mb-1 mt-6">Customer</div>
                            <div class="text-inverse-danger font-size-sm">All Customers to Date</div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 13-->
                </div>
                <div class="col-xl-4">
                    <!--begin::Stats Widget 14-->
                    <div class="card card-custom bg-primary card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between flex-grow-1">
                                <span class="text-inverse-danger font-weight-bolder font-size-h2">
                                    +{{ $products }}
                                </span>
                                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Clothes\Briefcase.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M5.84026576,8 L18.1597342,8 C19.1999115,8 20.0664437,8.79732479 20.1528258,9.83390904 L20.8194924,17.833909 C20.9112219,18.9346631 20.0932459,19.901362 18.9924919,19.9930915 C18.9372479,19.9976952 18.8818364,20 18.8264009,20 L5.1735991,20 C4.0690296,20 3.1735991,19.1045695 3.1735991,18 C3.1735991,17.9445645 3.17590391,17.889153 3.18050758,17.833909 L3.84717425,9.83390904 C3.93355627,8.79732479 4.80008849,8 5.84026576,8 Z M10.5,10 C10.2238576,10 10,10.2238576 10,10.5 L10,11.5 C10,11.7761424 10.2238576,12 10.5,12 L13.5,12 C13.7761424,12 14,11.7761424 14,11.5 L14,10.5 C14,10.2238576 13.7761424,10 13.5,10 L10.5,10 Z" fill="#000000"/>
                                            <path d="M10,8 L8,8 L8,7 C8,5.34314575 9.34314575,4 11,4 L13,4 C14.6568542,4 16,5.34314575 16,7 L16,8 L14,8 L14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 C10.4477153,6 10,6.44771525 10,7 L10,8 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <div class="text-inverse-primary font-weight-bolder font-size-h6 mb-1 mt-6">Products</div>
                            <div class="text-inverse-primary font-size-sm">Chair, Table, Wall Decoration, etc</div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 14-->
                </div>
                <div class="col-xl-4">
                    <!--begin::Stats Widget 15-->
                    <div class="card card-custom bg-success card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between flex-grow-1">
                                <span class="text-inverse-danger font-weight-bolder font-size-h2">
                                    IDR. {{ number_format($incomes, 2, ',', '.') }}
                                </span>
                                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Wallet2.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <rect fill="#000000" opacity="0.3" x="2" y="2" width="10" height="12" rx="2"/>
                                            <path d="M4,6 L20,6 C21.1045695,6 22,6.8954305 22,8 L22,20 C22,21.1045695 21.1045695,22 20,22 L4,22 C2.8954305,22 2,21.1045695 2,20 L2,8 C2,6.8954305 2.8954305,6 4,6 Z M18,16 C19.1045695,16 20,15.1045695 20,14 C20,12.8954305 19.1045695,12 18,12 C16.8954305,12 16,12.8954305 16,14 C16,15.1045695 16.8954305,16 18,16 Z" fill="#000000"/>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <div class="text-inverse-success font-weight-bolder font-size-h6 mb-1 mt-6">Income</div>
                            <div class="text-inverse-success font-size-sm">Total Income for All Transactions</div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 15-->
                </div>
            </div>
            <!--End::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Entry-->
@endsection
