@extends('layouts.admin')

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
						<h3 class="card-label">Category
							<div class="text-muted pt-2 font-size-sm">All Data Category</div>
						</h3>
					</div>
					<div class="card-toolbar">
						<!--begin::Button-->
						<a href="javascript:void(0)" class="btn btn-primary font-weight-bolder" id="openModal" data-action="{{ route('category.store') }}" data-toggle="modal">
						<span class="svg-icon svg-icon-md">
							<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24" />
									<circle fill="#000000" cx="9" cy="15" r="6" />
									<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
								</g>
							</svg>
							<!--end::Svg Icon-->
						</span>Add Category
						</a>
						<!--end::Button-->

						<!--begin::AddModalCategrory-->
						<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Add category</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<i aria-hidden="true" class="ki ki-close"></i>
										</button>
									</div>
									<div class="modal-body">
										<form action="post" id="formData">
											@csrf
											<div class="form-group">
												<label>
													Category Name<span class="text-danger">*</span>
												</label>
												<input type="text" class="form-control" value="{{ old('title') }}" placeholder="Enter category" />
												<span class="form-text text-muted error-text">Added new category name</span>
											</div>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary font-weight-bold" id="btn-save">Save changes</button>
									</div>
								</div>
							</div>
						</div>
						<!--end::AddModalCategrory-->
					</div>
				</div>
				<div class="card-body">
					<!--begin: Datatable-->
					<table class="table table-checkable" id="kt_datatable">
						<thead>
							<tr>
								<th>No</th>
								<th>Category</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody id="tbody">

						</tbody>
					</table>
					<!--end: Datatable-->
				</div>
			</div>
			<!--end::Card-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>
<!--end::Content-->


<!--begin::AjaxRequest-->
<script>
const baseUrl = 'http://127.0.0.1:8000';

// begin:function for show category without refresh
showCategory();

// table row with ajax
function table_category_row(res) 
{
	let htmlView = '';

	if (res.category.length <= 0) {
		htmlView += `
			<tr>
				<td colspan="3">No Data.</td>
			</tr>
		`;
	}

	for (let i = 0; i < res.category.length; i++) {
		htmlView += `
			<tr>
				<td>`+ (i+1) +`</td>
				<td>`+res.category[i].name+`</td>
				<td>
					<button id="editModal" data-action="`+baseUrl +`/dashboard/shop/category/`+ res.category[i].id+`/update" data-id="`+ res.category[i].id +`" class="btn btn-warning">Edit</button>
					<button id="deleteModal" data-id="`+res.category[i].id+`" class="btn btn-danger">Delete</button>
				</td>
			</tr>
		`;
	}
	
	$('#tbody').html(htmlView);

}

function showCategory() 
{
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: baseUrl+'/dashboard/shop/category',
		success: function(res) {
			table_category_row(res);
		},
		error: function(error) {
			console.log(error);
		}
	});
}
// end:function for show category without refresh

// begin:function for insert and update category without refresh
$('#openModal').click(function() {
	let url = $(this).data('action');

	$('#exampleModalLong').modal('show');
	$('#formData').trigger("reset");
	$('#formData').attr('action', url);
})

// event for created and updated category
$('#formData').submit(function(event) {
	event.preventDefault();

	let formData = new FormData(this);

	$.ajax({
		type: "POST",
		data: formData,
		contentType: false,
		processData: false,
		url: $(this).attr('action'),
		beforeSend: function() {
			$('#btn-save').addClass("disable").html("Processing ...").attr('disable',true);
			$(document).find('span.error-text').text('Added new category failed!');
		},
		complete: function() {
			$('#btn-save').removeClass("disable").html("Save Change").attr('disable',false);
		},
		success: function(res) {
			console.log(res);

			if (res.success == true) {
				$('#formData').trigger("reset");
				$('#exampleModalLong').modal('hide');

				showCategory();

				swal.fire(
					'Success!',
					res.message,
					'success'
				)
			}
		},
		error(err) {
			$.each(err.responseJSON, function(prefix,val) {
				$('.'+prefix+'_error').text(val[0]);
			})
			console.log(err);
		}
	})
})
// end:function for insert and update category without refresh

// begin:function for delete category without refresh
$(document).on('click','button#deleteModal', function(e) {
	e.preventDefault();

	let dataDelete = $(this).data('id');

	// console.log(dataDelete);
	Swal.fire({
		title: 'Are you sure ?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!',
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				type: 'DELETE',
				dataType: 'JSON',
				url: baseUrl+'/dashboard/shop/category/${dataDelete}',
				data: {
					_token: $('meta[name="csrf-token"]').attr('content')
				},
				success: function(response) {
					Swal.fire(
						'Deleted!',
						'Your category has been deleted',
						'success'
					)
					showCategory();
				},
				error: function(err) {
					console.log(err);
				}
			});
		}
	})
});
// end:function for delete category without refresh
</script>
<!--end::AjaxRequest-->
@endsection