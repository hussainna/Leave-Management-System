@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<!-- breadcrumb -->

	<!-- /breadcrumb -->
	<div class="col-12 col-lg-12 p-0 ">
	 
		
		<form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{url('/admin/update-status/'.$leave->id)}}">
		@csrf
		@method("PUT")
		<div class="col-12 col-lg-8 p-0 main-box">
			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	<span class="fas fa-info-circle"></span> تعديل  الحالة
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3 row">
				
			
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					الاسم
				</div>
				<div class="col-12 pt-3">
					<input type="text" readonly name="name" required minlength="3"  maxlength="190" class="form-control" value="{{$leave->user->name}}" >
				</div>
			</div>
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					البريد
				</div>
				<div class="col-12 pt-3">
					<input type="email" readonly name="email"  class="form-control"  value="{{$leave->user->email}}" >
				</div>
			</div>
			
			{{-- <div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					الصورة الشخصية
				</div>
				<div class="col-12 pt-3">
					<input type="file" name="avatar"  class="form-control"  accept="image/*" >
				</div>
				<div class="col-12 p-0">
					<img src="{{$leave->user->getUserAvatar()}}" style="width:100px;margin-top:20px">
				</div>
			</div> --}}

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					الهاتف
				</div>
				<div class="col-12 pt-3">
					<input type="text" readonly name="phone"  class="form-control"  value="{{$leave->user->phone}}" >
				</div>
			</div>
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					 الحالة
				</div>
				<div class="col-12 pt-3">
					<select class="form-control" name="status" id="">
						<option value="{{$leave->status}}">{{$leave->status}}</option>
						<option value="قبول">قبول</option>
						<option value="رفض">رفض</option>
						<option value="تأجيل">تأجيل</option>

					</select>
				</div>
			</div>


			</div>
 
		</div>
		 
		<div class="col-12 p-3">
			<button class="btn btn-success" id="submitEvaluation">حفظ</button>
		</div> 
		</form>
	</div>
</div>
@endsection