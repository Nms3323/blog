<x-admin-layout>
	<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <x-slot name="header">
    	<dv class="headerat">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Comment') }}
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
					<li class="breadcrumb-item text-muted">Create Comment</li>
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
				<div class="card" style="width:100%">
				<div class="card-body p-lg-17">
				<div class="row">
					<div class="col-md-12 pe-lg-10">
						<!--begin::Form-->
						<form action="{{ route('admin.comment.store') }}" method="post" class="form mb-15 add__form" id="kt_contact_form">
							<!--begin::Input group-->
							@csrf

							<div class="row mb-5">
								<!--begin::Col-->
								<div class="col-md-5 fv-row">
									<!--begin::Label-->
									<label class="fs-5 fw-bold mb-2" for="user_id">Select User</label>
									<!--end::Label-->
									<!--begin::Input-->
									<select class="form-control" name="user_id" id="user_id" required>
										<option value="">--Select User--</option>
										@if(!empty($user_list))
										@foreach($user_list as $user_list_dt)
										<option value="{{$user_list_dt->id}}">{{$user_list_dt->name}}--({{$user_list_dt->email}})</option>
										@endforeach
										@endif
									</select>
									<!--end::Input-->
								</div>
								<!--end::Col-->

								<!--begin::Col-->
								<div class="col-md-7 fv-row">
									<!--begin::Label-->
									<label class="fs-5 fw-bold mb-2" for="blog_id">Select Blog</label>
									<!--end::Label-->
									<!--begin::Input-->
									<select class="form-control" name="blog_id" id="blog_id" required>
										<option value="">--Select Blog--</option>
										@if(!empty($blog_list))
										@foreach($blog_list as $blog_list_dt)
										<option value="{{$blog_list_dt->id}}">{{$blog_list_dt->name}}</option>
										@endforeach
										@endif
									</select>
									<!--end::Input-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							
							<div class="row mb-5">
								<!--begin::Col-->
								<div class="col-md-12 fv-row">
									<!--begin::Label-->
									<label class="fs-5 fw-bold mb-2" for="comment_description">Comment</label>
									<!--end::Label-->
									<!--begin::Input-->
									<textarea class="form-control" placeholder="Enter comment" name="comment_description" id="comment_description">
									</textarea>
									<!--end::Input-->
								</div>
								<!--end::Col-->
							</div>

							<!--begin::Submit-->
							<button type="submit" class="btn btn-success" id="kt_contact_submit_button">Submit</button>
							<a href="{{route('admin.comment.index')}}"><button type="button" class="btn btn-danger" id="kt_contact_submit_button">Cancle</button></a>
							<!--end::Submit-->
						</form>
						<!--end::Form-->
					</div>
				</div>
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
	
	$(".add__form").validate({
		rules:
		{
			user_id: {required : true},
			blog_id: { required : true },
			comment_description: {required: true}
		},
		messages:
		{
			user_id: { required: "Please select user"},
			blog_id: { required: "Please select blog"},
			comment_description: {required: "Please enter description"}
		}
	});

</script>

</x-admin-layout>
