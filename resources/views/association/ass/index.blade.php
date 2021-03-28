@extends('layouts.master')

@section('content')
@php $role = Auth::user()->role; @endphp
<!-- BEGIN : Main Content-->
<div class="main-content">
  <div class="content-wrapper"><!-- Form actions layout section start -->
 <section class="basic-elements">
  <div class="row">
    <div class="col-sm-12">
      <div class="content-header">{{$ste->raison_social}}</div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title mb-0">المرجو ادخال المعلومات</h4>
        </div>
        <div class="card-content">
          <div class="px-3">
            <form id="form-ass" method="post" action="{{route($role.'-ass-store')}}" enctype="multipart/form-data">
               @csrf
              <div class="form-body">
                <div class="row">
                  <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                    <fieldset class="form-group">
                      <label for="n_association">رقم السجل</label>
                      <input type="text" name="n_association" value="{{$ste->n_association}}" class="form-control" id="n_association">
                      <input type="hidden" name="id" value="{{$ste->id}}" class="form-control" id="id">
                    </fieldset>
                  </div>
                  <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                    <fieldset class="form-group">
                      <label for="raison_social">اسم الجمعية  </label>
                      <input type="text" name="raison_social" value="{{$ste->raison_social}}" class="form-control" id="raison_social">
                    </fieldset>
                  </div>
                  <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                    <fieldset class="form-group">
                      <label for="helpInputTop">البريد الاكتروني</label>
                      <small class="text-muted">eg.<i>someone@example.com</i></small>
                      <input type="text" class="form-control" id="helpInputTop">
                    </fieldset>
                  </div>
                  
                  <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                    <fieldset class="form-group">
                      <label for="disabledInput">الهاتف</label>
                      <input type="text"  name="tel" value="{{$ste->tel}}" class="form-control" id="tel"
                        placeholder="الهاتف">
                    </fieldset>
                  </div>
                  
                  <div class="col-xl-4 col-lg-6 col-md-12">
                    <fieldset class="form-group">
                      <label for="adresse">العنوان</label>
                      <textarea class="form-control" name="adresse" id="adresse" rows="3">{{$ste->adresse}}</textarea>
                    </fieldset>
                  </div>
                  
                  
                  
                  
                  <div class="col-xl-4 col-lg-6 col-md-12">
                    <fieldset class="form-group">
                      <label for="responsable">ريس</label>
                      <select class="form-control" name="responsable" id="responsable">
                      @foreach($users as $u)
                       <option value="{{$u->name}}" {{$u->name==$ste->responsable?'selected':''}}> {{$u->name }}</option>
                      @endforeach 
                      </select>
                    </fieldset>
                  </div>
                  
                  
                  
                  <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                   <label for="date_ouvert"> تاريخ الانتهاء الاشتراك</label>
                    <input type="date" class="form-control" value="{{$ste->date_ouvert}}" id="date_ouvert" name="date_ouvert"
                    value="2018-07-22"
                    min="2021-02-01" max="2030-12-31">
                    </div>
                  
                  <div class="col-xl-4 col-lg-6 col-md-12">
                    <fieldset class="form-group">
                      <label for="note">ملخص </label>
                      <textarea class="form-control" id="note" name="note" rows="3">{{$ste->note}}</textarea>
                    </fieldset>
                  </div>
                  
                  <div class="col-lg-6 col-md-12">
                    <img src="{{asset('/storage/'.$ste->logo)}}" width="100%">
                  </div>

                  <div class="col-lg-6 col-md-12">
                    <label for="file">شعار</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">تحميل</span>
                      </div>
                      <div class="custom-file">
                        <input type="file" name="logo" class="custom-file-input" id="logo"
                          aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="logo">اختيار صورة</label>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-actions">
                      <div class="text-right">
                        <button type="submit"  class="btn btn-raised btn-primary">حفط <i class="ft-thumbs-up position-right"></i></button>
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
  </section>
  <!-- // Form actions layout section end -->
  </div>
</div>
<!-- END : End Main Content-->
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script type="text/javascript">



    $(document).ready(function(){

      app_url = $('meta[name="app-url"]').attr('content');

      $('#delete-modal').on('show.bs.modal',function(e){
          _btn = $(e.relatedTarget);
      });

    
    });



</script>