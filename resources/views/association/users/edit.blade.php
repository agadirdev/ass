@extends('layouts.master')
@php $role = Auth::user()->role; @endphp
@section('content')
<!-- BEGIN : Main Content-->
<div class="main-content">
  <div class="content-wrapper"><!-- Form actions layout section start -->
  <section id="form-action-layouts">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title mb-0">المرجو ادخال المعلومات</h4>
				</div>
				<div class="card-content">
					<div class="px-3">
						<form id="form-user" method="post" action="{{route($role.'-users-store')}}">
							 @csrf
							<div class="form-body">
								<div class="row">
									<div class="col-xl-4 col-lg-6 col-md-12 mb-1">
										<fieldset class="form-group">
											<label for="cin">رقم البضاقة الوضنية</label>
											<input type="text" class="form-control" value="{{$users->cin}}" id="cin" name="cin">
										<input type="hidden" class="form-control" value="{{$users->id}}" id="id" name="id">
										</fieldset>
									</div>
									<div class="col-xl-4 col-lg-6 col-md-12 mb-1">
										<fieldset class="form-group">
											<label for="name">اسم الكامل </label>
											<input type="text" class="form-control" value="{{$users->name}}" id="name" name="name">
										</fieldset>
									</div>
									<div class="col-xl-4 col-lg-6 col-md-12 mb-1">
										<fieldset class="form-group">
											<label for="helpInputTop">البريد الاكتروني</label>
											<small class="text-muted">eg.<i>someone@example.com</i></small>
											<input type="email" class="form-control" id="email" value="{{$users->email}}" name="email">
										</fieldset>
									</div>
									
									<!-- passwored arkih raisker awal mra login s email tftas aisker code-->
									
									
									<div class="col-xl-4 col-lg-6 col-md-12">
										<fieldset class="form-group">
											<label for="responsabilite">المهمة </label>
											<select class="form-control" id="responsabilite" name="responsabilite">
												<option selected="selected">العون المكلف</option>
												<option>مربية</option>
												<option selected="selected">سائق</option>
												<option>ريس </option>
											
											</select>
										</fieldset>
									</div>
									
									<div class="col-xl-4 col-lg-6 col-md-12 mb-1">
										<fieldset class="form-group">
											<label for="disabledInput">الهاتف</label>
											<input type="text" class="form-control" value="{{$users->tel}}" id="tel" name="tel" 
												placeholder="الهاتف">
										</fieldset>
									</div>
									
									<div class="col-xl-4 col-lg-6 col-md-12">
										<fieldset class="form-group">
											<label for="adresse">العنوان</label>
											<textarea class="form-control" id="adresse"name="adresse" rows="3">{{$users->adresse}}
											</textarea>
										</fieldset>
									</div>
									
									
									<div class="col-xl-4 col-lg-6 col-md-12">
										<fieldset class="form-group">
											<label for="role">صلاحية</label>
											<select class="form-control" name="role" id="role">
											@foreach($roles as $r)
											<option value="{{$r->role}}" {{$r->role==$users->role?'selected':''}}> {{$r->role}}</option>
											@endforeach
											</select>
										</fieldset>
									</div>
									
									<div class="col-xl-4 col-lg-6 col-md-12 mb-1">
									 <label for="date_exp"> تاريخ الانتهاء</label>
										<input type="date" readonly="" class="form-control" value="{{$users->date_exp}}" id="date_exp" name="date_exp"
										value="2018-07-22"
										min="2021-02-01" max="2030-12-31">
										</div>
									
									<div class="col-md-12">
										<div class="form-actions">
											<div class="text-right">
												<button onclick="save()" type="button" class="btn btn-raised btn-primary">حفط <i class="ft-thumbs-up position-right"></i></button>
												<button type="reset" class="btn btn-raised btn-warning">الغاء <i class="ft-refresh-cw position-right"></i></button>
											</div>
										</div>
								       </div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
  </section>
  <!-- // Form actions layout section end -->
  </div>
</div>
<!-- END : End Main Content-->
@endsection

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script type="text/javascript">

    function save(){
      var form = $('#form-user');
      $.ajax({
          url      : form.attr('action'),
          method   : form.attr('method'),
          data     : form.serialize(),
          dataType : 'json',
          success  : function(data){


          }
        });
    }
</script>