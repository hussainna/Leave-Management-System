@extends('layouts.user')
@section('user-content')

<script>
	@if(session('success'))
		toastr.success("{{ session('success') }}");
	@endif
</script>

<div class="col-12 p-4 mb-3 d-flex align-items-center justify-content-center" style="background: #fff;border-radius: 8px;min-height: 40vh;">
	<div class="col-12 col-lg-12 p-0 main-box">
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-users"></span>	الاجازات
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					<a type="button"  data-toggle="modal" data-target="#myModal" >
					<span class="btn btn-primary"><span class="fas fa-plus"></span> إضافة جديد</span>
					</a>
				</div>
			</div>
			<div class="col-12 divider" style="min-height: 0.5px;"></div>
		</div>

		<div class="col-12 py-2 px-2 row">
			<div class="col-12 col-lg-4 p-2">
				<form method="GET">
					<input type="text" name="q" class="form-control" placeholder="بحث ... " value="{{request()->get('q')}}">
				</form>
			</div>
		</div>
		<div class="col-12 p-3" style="overflow:auto">
			<div class="col-12 p-0" style="min-width:1100px;min-height: 600px;">

				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">اطلب اجازه</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<!-- Your form goes here -->
								<form method="POST" action="{{ url('/create-leave') }}">
									@csrf
									<div class="form-group mt-2">
										<label for="exampleFormControlInput1">موعد البداية </label>
										<input type="date" class="form-control" name="date_end">
									</div>
									<div class="form-group mt-2">
										<label for="exampleFormControlInput1">موعد النهاية </label>
										<input type="date" class="form-control" name="date_start">
									</div>
									<div class="form-group mt-2">
										<label for="exampleFormControlInput1">نوع الاجازه</label>
										<select class="form-control" name="leave_type" id="">
											<option value="مرضية">اجازه مرضية</option>
											<option value="عطله">اجازه عطلة</option>
											<option value="سفر">اجازه سسفر</option>
											<option value="راحه">اجازه راحه</option>

										</select>
									</div>
									<div class="form-group mt-2">
										<label for="exampleFormControlInput1">نص تعبيري</label>
										<input type='text' class="form-control" name="description"/>
									</div>
									
									<!-- Add more form fields as needed -->
				
									<button type="submit" class="btn btn-primary mt-5">Submit</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				
				
			
			<table class="table table-bordered  table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>موعد البداية</th>
						<th>موعد النهاية</th>
						<th>نوع الاجازه</th>
						<th>الحالة</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($leave as $l)
						<tr>
							<td>{{$l->id}}</td>
							<td>{{$l->date_start}}</td>
							<td>{{$l->date_end}}</td>
							<td>{{$l->leave_type}}</td>
							<td>{{$l->status}}</td>

						</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
		<div class="col-12 p-3">
			{{-- {{$users->appends(request()->query())->render()}} --}}
		</div>
	</div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>