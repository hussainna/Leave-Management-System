@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">
	 
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-roles"></span> عرض الكل
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					@can('roles-create')
					<a href="{{route('admin.roles.create')}}">
					<span class="btn btn-primary"><span class="fas fa-plus"></span> إضافة جديد</span>
					</a>
					@endcan
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
			<div class="col-12 p-0" style="min-width:1100px;">
				
			
			<table class="table table-bordered  table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>اسم الصلاحية</th>
						<th>عدد الاجازات</th>
						<th>تحكم</th>
					</tr>
				</thead>
				<tbody id="sortable-table">
					@foreach($roles as $role)
					<tr >
						<td class="ui-state-default drag-handler" >{{$loop->iteration}}</td>
						<td>{{$role->name}}</td>
						<td>{{$role->number_leaves}}</td>

						<td style="width: 270px;">

					 
							
							<a href="">
								<span class="btn  btn-outline-success btn-sm font-1 mx-1">
									<span class="fas fa-wrench "></span> تحكم
								</span>
							</a>
							<a class="btn  btn-outline-danger btn-sm font-1 mx-1" href="{{url('/admin/delete-permission/'.$role->id)}}">
								<span class="fas fa-trash "></span> حذف
							</a>
							
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
@endsection