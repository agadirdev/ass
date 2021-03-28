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
          <h4 class="card-title" id="from-actions-top-left"> {{$Abonnee->nom}} {{$Abonnee->prenom}}</h4>
        </div>
        <div class="card-body">
          <div class="px-3">
            <form id="form-abonnee" method="post" action="{{route($role.'-abonnee-store')}}">
               @csrf
              <div class="form-body">
                <h4 class="form-section"><i class="ft-user"></i> معلومات المنخرط(ة)</h4>
                <div class="row">
                  <div class="form-group col-md-3 mb-2">
                    <label for="cin">رقم بطاقة التعريف الوطنية</label>
                    <input type="text" id="cin" class="form-control" value="{{$Abonnee->cin}}" placeholder="رقم بطاقة التعريف الوطنية" name="cin">
                    <input type="hidden" id="id" class="form-control" value="{{$Abonnee->id}}" name="id">
                  </div>
                  <div class="form-group col-md-3 mb-2">
                    <label for="n_compteur">رقم العداد</label>
                    <input type="number" id="n_compteur" class="form-control" value="{{$Abonnee->n_compteur}}" min="0" placeholder="رقم العداد" name="n_compteur">
                  </div>
                  <div class="form-group col-md-3 mb-3">
                    <label for="sexe">الجنس</label>
                    <select id="sexe" name="sexe" class="form-control">
                      <option value="M">M</option>
                      <option value="F">F</option>
                    </select>
                  </div>
     
                  <div class="form-group col-md-3 mb-2">
                    <label for="etat_social">الحالة المدنية</label>
                    <select id="etat_social" name="etat_social" class="form-control">
                      <option value="none" selected="" disabled="">Interested in</option>
                      <option value="design">design</option>
                      <option value="development">development</option>
                      <option value="illustration">illustration</option>
                      <option value="branding">branding</option>
                      <option value="video">video</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-3 mb-2">
                    <label for="nom">الاسم</label>
                    <input type="text" id="nom" class="form-control" value="{{$Abonnee->nom}}" placeholder="الاسم" name="nom">
                  </div>
                  <div class="form-group col-md-3 mb-2">
                    <label for="prenom">النسب</label>
                    <input type="text" id="prenom" class="form-control" value="{{$Abonnee->prenom}}" placeholder="النسب"  name="prenom">
                  </div>
                  <div class="form-group col-md-3 mb-2">
                    <label for="date_naissance">تاريخ الازدياد</label>
                    <input type="date" id="date_naissance" class="form-control" value="{{$Abonnee->date_naissance}}" placeholder="النسب"  name="date_naissance">
                  </div>
                  <div class="form-group col-md-3 mb-2">
                    <label for="tel">رقم الهاتف</label>
                    <input type="text" id="tel" class="form-control" value="{{$Abonnee->tel}}" placeholder="رقم الهاتف"  name="tel">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6 mb-2">
                    <label for="adresse">العنوان</label>
                    <input type="text" id="adresse" class="form-control" value="{{$Abonnee->adresse}}" placeholder="العنوان" name="adresse">
                  </div>
                  <div class="form-group col-md-6 mb-2">
                    <label for="rib">رقم الحساب البنكي</label>
                    <input type="text" id="rib" class="form-control" value="{{$Abonnee->rib}}" placeholder="رقم الحساب البنكي"  name="rib">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-3 mb-2">
                    <label for="email">البريد الإلكتروني</label>
                    <input type="text" id="email" class="form-control" value="{{$Abonnee->email}}" placeholder="البريد الإلكتروني" name="email">
                  </div>
                  <div class="form-group col-md-3 mb-2">
                    <label for="date_inscription">تاريخ الانخراط</label>
                    <input type="date" id="date_inscription" class="form-control" value="{{$Abonnee->date_inscription}}" placeholder="تاريخ الانخراط"  name="date_inscription">
                  </div>
                  <div class="form-group col-md-2 mb-2">
                    <label for="nbr_enfant">عدد الابناء</label>
                    <input type="number" min="0" id="nbr_enfant" value="{{$Abonnee->nbr_enfant}}" class="form-control" placeholder="عدد الابناء" name="nbr_enfant">
                  </div>
                  <div class="form-group col-md-4 mb-2">
                    <label for="note">ملاحظات</label>
                    <input type="text" id="note" class="form-control" value="{{$Abonnee->note}}" placeholder="ملاحظات" name="note">
                  </div>
                </div>
              </div>
              <div class="form-actions top">
                <button type="button" class="btn btn-raised btn-primary" onclick="save()">
                  <i class="fa fa-check-square-o"></i> تعديل
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
      var form = $('#form-abonnee');
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