@extends('layouts.master')
@php $role = Auth::user()->role; @endphp
@section('content')

<!-- BEGIN : Main Content-->
<div class="main-content">
  <div class="content-wrapper"><!-- Form actions layout section start -->
  <section id="form-action-layouts">
    <div class="row">
      <div class="col-sm-12">
        <div class="content-header">الخدمات</div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title" id="from-actions-top-left">اظافة شطر جديد</h4>
        </div>
        <div class="card-body">
          <div class="px-3">
            <form id="form-services" method="post" action="{{route($role.'-services-store')}}">
              @csrf
              <div class="form-body">
                <div class="form-group row">
                  <label class="col-md-3 label-control" for="timesheetinput1">اسم </label>
                  <div class="col-md-9">
                    <div class="position-relative has-icon-left">
                      <input type="text" id="timesheetinput1" class="form-control" placeholder="اسم" name="">
                      <div class="form-control-position">
                        <i class="ft-user"></i>
                      </div>
                    </div>
                  </div>
                </div>
               
                <div class="form-group row">
                  <label class="col-md-3 label-control" for="timesheetinput2">m3</label>
                  <div class="col-md-9">
                    <div >
                     <input id="ex1" type="text" class="span2" value="" data-slider-min="1" data-slider-max="1000" data-slider-step="1" data-slider-value="[1,100]"/> 
                    </div>
                  </div>
                </div>
              
                <div class="form-group row">
                  <label class="col-md-3 label-control">تمن</label>
                  <div class="col-md-9">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">DH</span>
                      </div>
                      <input type="text" class="form-control" placeholder="تمن " aria-label="تمن الوحدة "
                        name="rateperhour">
                      <div class="input-group-append">
                        <span class="input-group-text"></span>
                      </div>
                    </div>
                  </div>
                </div>
        
                


              <div class="form-actions right">
                <button type="button" class="btn btn-raised btn-warning mr-1">
                  <i class="ft-x"></i> الغاء
                </button>
                <button type="button" class="btn btn-raised btn-primary">
                  <i class="fa fa-check-square-o"></i> حفط
                </button>
              </div>
              <div class="form-actions right">
                <button type="button" onclick="save()" class="btn btn-raised btn-primary">
                  <i class="fa fa-check-square-o"></i> Save
                </button>
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
      var form = $('#form-services');
      $.ajax({
          url      : form.attr('action'),
          method   : form.attr('method'),
          data     : form.serialize(),
          dataType : 'json',
          success  : function(data){


          }
        });
    }

  const checkbox = document.getElementById('type')
  checkbox.addEventListener('change', (event) => {
  if (event.currentTarget.checked) {
    
    $("#profac").show(); 
    $("#proprix").show();
    $("#protype").show();
    $("#proprixvent").show();
  
  } else {
 
    $("#profac").hide();
    $("#proprix").hide();
    $("#protype").hide();
    $("#proprixvent").hide();
  
  }
})

</script>