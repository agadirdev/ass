@extends('layouts.master')

@section('content')
@php $role = Auth::user()->role; @endphp
<!-- BEGIN : Main Content-->
<div class="main-content">
<div class="content-wrapper"><!-- Basic Elements start -->
<section class="basic-elements">
	<div class="row">
		<div class="col-sm-12">
			<div class="content-header">اضافة . تعديل</div>
		</div>
	</div>
  <div class="row">
      <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title" id="from-actions-top-left">لائحة المنخرطين</h4>
    
        </div>
        <div class="card-body">
          <a href="{{route($role.'-users-add')}}">اظافة</a>
          <div class="px-3">
            @include('association.users.table')
          </div>
        </div>
      </div>
      </div>
  </div>
</section>
<!-- Basic Inputs end -->
</div>
</div>
<!-- END : End Main Content-->
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script type="text/javascript">


    function UsersTable(){

      UsersTable = $('#UsersTable').DataTable({
          language: {
                      "emptyTable": "ليست هناك بيانات متاحة في الجدول",
                      "loadingRecords": "جارٍ التحميل...",
                      "processing": "جارٍ التحميل...",
                      "lengthMenu": "أظهر _MENU_ مدخلات",
                      "zeroRecords": "لم يعثر على أية سجلات",
                      "info": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                      "infoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                      "infoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                      "search": "ابحث:",
                      "paginate": {
                          "first": "الأول",
                          "previous": "السابق",
                          "next": "التالي",
                          "last": "الأخير"
                      },
                      "aria": {
                          "sortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                          "sortDescending": ": تفعيل لترتيب العمود تنازلياً"
                      },
                      "select": {
                          "rows": {
                              "_": "%d قيمة محددة",
                              "0": "",
                              "1": "1 قيمة محددة"
                          }
                      },
                      "buttons": {
                          "print": "طباعة",
                          "colvis": "الأعمدة الظاهرة",
                          "copy": "نسخ إلى الحافظة",
                          "copyTitle": "نسخ",
                          "copyKeys": "زر <i>ctrl<\/i> أو <i>⌘<\/i> + <i>C<\/i> من الجدول<br>ليتم نسخها إلى الحافظة<br><br>للإلغاء اضغط على الرسالة أو اضغط على زر الخروج.",
                          "copySuccess": {
                              "_": "%d قيمة نسخت",
                              "1": "1 قيمة نسخت"
                          },
                          "pageLength": {
                              "-1": "اظهار الكل",
                              "_": "إظهار %d أسطر"
                          }
                      }
                  } ,

          "columns": [
 

              { 'data': 'cin',
                'className': 'text-center'},
              { 'data': 'name',
                'className': 'text-center' },
              { 'data': 'email',
                'className': 'text-center' },
              { 'data': 'responsabilite',
                'className': 'text-center' },
              { 'data': 'tel',
                'className': 'text-center' },
              { 'data': 'role',
                'className': 'text-center' },
              { 'data': 'date_exp',
                'className': 'text-center' },
              { 'data': 'id',
                'searchable': false,
                'sortable': false,
                'className': 'text-left',
                  'render': function (v, t, r) {
                    return '<a type="button"  class="btn btn-primary btn-sm" href="'+app_url+'/users/edit/'+v+'"><i class="fa fa-edit" aria-hidden="true"></i></a> '+' <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-id="'+v+'"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                                   
                        }
              }

            ],

            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": app_url+'/users/data',
           // dom: 'Bfrtip',
         
                //buttons: [ 'pdfHtml5', 'csvHtml5', 'copyHtml5', 'excelHtml5' ]
          

        });


      }

    function fun_delete(){
      $('#delete-modal').modal('hide');

        $.ajax({
          url:app_url+'/clients/deleted/'+_btn.data('id'),
          method:'post',
          data:{_method:'DELETE'},
          dataTye:'json',
          success:function(obj){
            if(obj.b)
            $('#UsersTable').DataTable().ajax.reload();
          }
        });
     }

    $(document).ready(function(){

      app_url = $('meta[name="app-url"]').attr('content');

      $('#delete-modal').on('show.bs.modal',function(e){
          _btn = $(e.relatedTarget);
      });

      UsersTable();
    });



</script>