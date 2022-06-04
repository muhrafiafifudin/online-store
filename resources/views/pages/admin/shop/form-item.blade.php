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
				<form>
					<div class="card-body">
						<div class="form-group">
							<label>Name Item
							<span class="text-danger">*</span></label>
							<input type="text" class="form-control" placeholder="Enter email" />
						</div>
						<div class="form-group">
							<label>Images</label>
							<div></div>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="customFile" />
								<label class="custom-file-label" for="customFile">Choose file</label>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleTextarea">Short Description</label>
							<textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
						</div>
						<div class="form-group">
							<label for="exampleSelect1">Category
							<span class="text-danger">*</span></label>
							<select class="form-control" id="exampleSelect1">
								<option>1</option>
								<option>2</option>
								<option>3</option>
							</select>
						</div>
						<div class="form-group">
							<label>Price
							<span class="text-danger">*</span></label>
							<input type="number" class="form-control" placeholder="Enter email" />
						</div>
						<div class="form-group">
							<label for="exampleTextarea">Description</label>
							<textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
						</div>
					</div>
					<div class="card-footer">
						<button type="reset" class="btn btn-primary mr-2">Submit</button>
						<button type="reset" class="btn btn-secondary">Cancel</button>
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