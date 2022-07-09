<x-admin-layout>
    <x-slot name="header">
    	<dv class="headerat">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog') }}
        </h2>

				<!--begin::Breadcrumb-->
				<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
					<!--begin::Item-->
					<li class="breadcrumb-item text-muted">
						<a href="index.html" class="text-muted text-hover-primary">Home</a>
					</li>
					<!--end::Item-->
					<!--begin::Item-->
					<li class="breadcrumb-item">
						<span class="bullet bg-gray-200 w-5px h-2px"></span>
					</li>
					<!--end::Item-->
					<!--begin::Item-->
					<li class="breadcrumb-item text-muted">Blog Details</li>
					<!--end::Item-->
				</ul>
				<!--end::Breadcrumb-->
			</dv>
    </x-slot>
    <!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Toolbar-->
	<div class="toolbar" id="kt_toolbar">
		<!--begin::Container-->
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-end ml-auto mr-auto">
			
			<!--begin::Actions-->
			<div class="d-flex align-items-center py-1">
				<!--begin::Wrapper-->

				<!--end::Wrapper-->
				<!--begin::Button-->
				<a href="{{route('admin.blog.create')}}" class="btn btn-sm btn-primary" id="kt_toolbar_primary_button">Create</a>
				<!--end::Button-->
			</div>
			<!--end::Actions-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Toolbar-->
	<!--begin::Post-->
	<div class="post d-flex flex-column-fluid" id="kt_post">
		<!--begin::Container-->
		<div id="kt_content_container" class="container">
			<!--begin::Layout-->
			<div class="d-flex flex-column flex-xl-row">

				<!--begin::Content-->
				<div class="flex-lg-row-fluid ms-lg-0">
					<div class="table-responsive">
						<!--begin::Table-->
						<table class="table align-middle table-row-dashed fs-6 gy-5 data-table dataTableNew" id="kt_subscriptions_table blog_list">
							<!--begin::Table head-->
							<thead>
								<!--begin::Table row-->
								<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
									<th style="width: 50px">No.</th>
									<th>Title</th>
									<th>User</th>
									<th>Activate Status</th>
									<th style="width: 150px">Actions</th>
								</tr>
								<!--end::Table row-->
							</thead>
							<!--end::Table head-->
							<!--begin::Table body-->
							<tbody class="text-gray-600 fw-bold">
								@if(!empty($data))
								<?php $count = 1; ?>
								@foreach($data as $dt)
								<tr>
									<td>{{ $count++ }}</td>
									<td>{{ ucfirst($dt->name) }}</td>
									<td>{{ $dt->user_name }}</td>
									<td>
										<label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
											<input class="form-check-input" type="checkbox" value="1" @if($dt->active == 1) checked @endif onchange="status('{{ $dt->id }}')" name=""/>
										</label>
									</td>
									<td>
										<a class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit" href="{{route('admin.blog.edit', $dt->id)}}" style="background: #968cbd;">
											<i class="la la-edit" style="color: white !important;"></i>
										</a>
										<input type="hidden" value="{{ $dt->id }}" name="delete_blog_id" id="delete_blog_id">
										<button class="btn btn-sm btn-clean btn-icon btn-icon-md" id="delete_blog" style="background-color: red;" data-toggle="tooltip" title="Delete">
											<i class="la la-trash" style="color: #ffffff"></i>
										</button>
									</td>
								</tr>
								@endforeach
								@endif
							</tbody>
							<!--end::Table body-->
						</table>
						<!--end::Table-->
					</div>
				</div>
				<!--end::Content-->
			</div>
			<!--end::Layout-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Post-->
</div>
<!--end::Content-->

<script type="text/javascript">
	$(document).ready(function() {
		$('.data-table').DataTable();
	});

	$(document).ready(function() {

		$(document).on('click', '#delete_blog', function ()
		{
			var obj = $(this);
			var id = $(this).closest('td').find("#delete_blog_id").val();
			var delete_url = "{{route('admin.blog.destroy', ':id') }}";
			delete_url = delete_url.replace(':id', id);

			swal({
				title: "Are you sure?",
				text: "You will not be able recover this record",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes delete it!",
				closeOnConfirm: false
			},
			function () {
				$.ajax({
					type: "DELETE",
					url: delete_url,
					data: {
						'_token': $('input[name="_token"]').val(),
						'id': id
					},
					cache: false,
					success: function (data)
					{
						location.reload();
					}
				});
			});
		});
	});

	function status(id) {
		$.ajax({
			type:'POST',
			url:"{{route('admin.blog.status')}}",
			data:{
				'_token' : $('input[name="_token"]').val(),
				'id':id
			},
			success:function(data){
				if (data.status === 'status_changed') 
				{
					toastr.options.timeOut = 1500;
					toastr.options.fadeOut = 1500;
					toastr.options.progressBar = true;
					toastr.options.onHidden = function(){
					};
					toastr["success"]("Status Changed", "Success");
				}else{
					toastr.options.timeOut = 1500;
					toastr.options.fadeOut = 1500;
					toastr.options.progressBar = true;
					toastr.options.onHidden = function(){
					};
					toastr["warning"]("Status Changed", "warning");
				}
			}
		});
	}
	
</script>
</x-admin-layout>
