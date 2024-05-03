@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	
	<div class="col-12 col-lg-12 p-0 ">
	 
		
		<form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{url('/admin/create-auth/'.$user->id)}}" >
		@csrf
		@method("PUT")
		<div class="col-12 col-lg-8 p-0 main-box">
			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	<span class="fas fa-info-circle"></span>  تفعيل المستخدم
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3 row">
				
			
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					الاسم
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="name" readonly minlength="3"  maxlength="190" class="form-control" value="{{$user->name}}" >
				</div>
			</div>
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					البريد
				</div>
				<div class="col-12 pt-3">
					<input type="email" name="email" readonly class="form-control"  value="{{$user->email}}" >
				</div>
			</div>

			
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					الصورة الشخصية
				</div>
				<div class="col-12 p-0">
					<img src="{{url('uploads/image/'.$user->image)}}" style="width:100px;margin-top:20px">
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					الهاتف
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="phone"  readonly maxlength="190" class="form-control"  value="{{$user->phone}}" >
				</div>
			</div>

			</div>
 
		</div>
		 
		<div class="col-12 p-3">
			<button class="btn btn-success" id="submitEvaluation">تفعيل المستخدم</button>
		</div> 
		</form>
	</div>
</div>
@endsection