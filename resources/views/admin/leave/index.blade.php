@extends('layouts.admin')
@section('content')





<div class="col-12 p-3">
	<!-- breadcrumb -->
	<x-bread-crumb :breads="[
			['url' => url('/admin') , 'title' => 'لوحة التحكم' , 'isactive' => false],
			['url' => route('admin.users.index') , 'title' => 'الاجازات' , 'isactive' => true],
		]">
		</x-bread-crumb>
	<!-- /breadcrumb -->
	<div class="col-12 col-lg-12 p-0 main-box">
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-users"></span>	الاجازات
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
				
			</div>
			<div class="col-12 divider" style="min-height: 2px;"></div>
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
				
			
			<table class="table table-bordered  table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>الاسم</th>
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
						<td>{{$l->user->name}}</td>
						<td>{{$l->date_start}}</td>
						<td>{{$l->date_end}}</td>
						<td>{{$l->leave_type}}</td>
						<td>{{$l->status}}</td>
						<td>
						<a href="{{url('/admin/edit-status/'.$l->id)}}">
							<span class="btn  btn-outline-success btn-sm font-small mx-1">
								<span class="fas fa-wrench "></span> تعديل الحالة
							</span>
						</a>
					</td>
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


