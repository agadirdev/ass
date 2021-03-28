@extends('layouts.master')
@php $role = Auth::user()->role; @endphp
@section('content')

<!-- BEGIN : Main Content-->
<div class="main-content">
  <div class="content-wrapper"><!-- Form actions layout section start -->
  <section id="form-action-layouts">
    <div class="row">
      <div class="col-sm-12">
        <div class="content-header">المنخريطين</div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title" id="from-actions-top-left"> {{$services->ref}} ** {{$services->designation}}</h4>
        </div>
        <div class="card-body">
          <div class="px-3">
            <form id="form-services" method="post" action="{{route($role.'-services-store')}}">
               @csrf
              <div class="form-body">
                <div class="form-group row">
                  <label for="switcherySize10" class="font-medium-2 text-bold-600 mr-1">شراء</label>
                  <input type="checkbox" id="type" value="{{$services->type}}"  name="type" class="switchery" data-size="lg" checked />
                  <label for="switcherySize10" class="font-medium-2 text-bold-600 ml-1">خدمة </label>      
                </div>
                <div class="form-group row">
                  <label class="col-md-3 label-control" for="ref">رقم التسلسلي </label>
                  <div class="col-md-9">
                    <div class="position-relative has-icon-left">
                      <input type="text" id="ref" class="form-control" value="{{$services->ref}}" placeholder="رقم التسلسلي" name="ref">
                       <input type="hidden" id="id" class="form-control" value="{{$services->id}}" name="id">
                      <div class="form-control-position">
                        <i class="ft-user"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-3 label-control" for="designation">اسم </label>
                  <div class="col-md-9">
                    <div class="position-relative has-icon-left">
                      <input type="text" id="designation" class="form-control" value="{{$services->designation}}" placeholder="اسم" name="designation">
                      <div class="form-control-position">
                        <i class="fa fa-briefcase"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row" id="profac">
                  <label class="col-md-3 label-control" for="famille">اسم المصنع </label>
                  <div class="col-md-9">
                    <div class="position-relative has-icon-left">
                      <input type="text" id="famille" value="{{$services->famille}}"  class="form-control" placeholder="اسم المصنع" name="famille">
                      <div class="form-control-position">
                        <i class="fa fa-briefcase"></i>
                      </div>
                    </div>
                  </div>
                </div>            
                <div class="form-group row" id="protype">
                  <label class="col-md-3 label-control" for="marque">نوع </label>
                  <div class="col-md-9">
                    <div class="position-relative has-icon-left">
                      <input type="text" id="marque"  class="form-control" value="{{$services->marque}}" placeholder="نوع" name="marque">
                      <div class="form-control-position">
                        <i class="fa fa-briefcase"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row" id="proprix">
                  <label class="col-md-3 label-control" for="prix_achat">تمن  </label>
                  <div class="col-md-9">
                    <div class="position-relative has-icon-left">
                      <input type="hidden" id="unite" value="{{$services->unite}}" class="form-control" value="unite" name="unite">
                       <input type="hidden" id="qte_stock" value="{{$services->qte_stock}}" class="form-control" value="0" name="qte_stock">
                       <input type="text" id="prix_achat" value="{{$services->prix_achat}}" class="form-control" name="prix_achat">
                      <div class="form-control-position">
                        <i class=""></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row" id="proprixvent">
                  <label class="col-md-3 label-control" for="prix_vente">تمن البيع </label>
                  <div class="col-md-9">
                    <div class="position-relative has-icon-left">
                      <input type="text"  class="form-control" value="{{$services->prix_vente}}" id="prix_vente" name="prix_vente">
                      <div class="form-control-position">
                        <i class=""></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row last">
                  <label class="col-md-3 label-control" for="note">ملاحطة</label>
                  <div class="col-md-9">
                    <div class="position-relative has-icon-left">
                      <textarea id="note" rows="5" class="form-control" value="{{$services->note}}" name="note" placeholder="ملاحطة"></textarea>
                      <div class="form-control-position">
                        <i class="ft-file"></i>
                      </div>
                    </div>
                  </div>
                </div>
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
</script>