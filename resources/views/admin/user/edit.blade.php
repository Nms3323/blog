<x-admin-layout>
    <x-slot name="header">
    	<dv class="headerat">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
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
					<li class="breadcrumb-item text-muted">Create User</li>
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
						<form action="{{route('admin.user.update', $user_data->id)}}" method="post" class="form mb-15 edit__form" id="kt_contact_form">
							<!--begin::Input group-->
							{{ method_field('PATCH') }}
							@csrf
							<input type="hidden" name="hidden_id" value="{{$user_data->id}}">
							<div class="row mb-5">
								<!--begin::Col-->
								<div class="col-md-6 fv-row">
									<!--begin::Label-->
									<label class="fs-5 fw-bold mb-2" for="name">Name</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input type="text" class="form-control form-control-solid" placeholder="Please enter name" value="{{$user_data->name}}" id="name" name="name" />
									<!--end::Input-->
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-md-6 fv-row">
									<!--end::Label-->
									<label class="fs-5 fw-bold mb-2" for="email">Email</label>
									<!--end::Label-->
									<!--end::Input-->
									<input type="text" class="form-control form-control-solid" placeholder="Enter email" value="{{$user_data->email}}" id="email" name="email" />
									<!--end::Input-->
								</div>
								<!--end::Col-->
							</div>

							<!--end::Input group-->
							
							<!--begin::Submit-->
							<button type="submit" class="btn btn-success" id="kt_contact_submit_button">Submit</button>
							<a href="{{route('admin.user.index')}}"><button type="button" class="btn btn-danger" id="kt_contact_submit_button">Cancle</button></a>
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
			name: { required: true },
			email:{
				required: true,
				remote: {
					url: "{{ route('admin.check.email') }}",
					type: "post",
					dataType: 'json',
					data: {
						'_token': $('input[name="_token"]').val(),
						id: function() {
							return $("#hidden_id").val();
						},
						email: function() {
							return $("#email").val();
						}
					}
				}
			}
		},
		messages:
		{
			name: { required: "Please enter name" },
			email:{
				required:"Please enter email",
				remote:"This user is already exist"
			}
		}
	});

</script>

</x-admin-layout>
