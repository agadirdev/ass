  @php $role = Auth::user()->role; @endphp
  <!-- / main menu header-->
        <!-- main menu content-->
        <div class="sidebar-content">
          <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" data-scroll-to-active="true" class="navigation navigation-main">
              <li class=" nav-item"><a href="{{ url('/home')}}"><i class="ft-cpu"></i><span data-i18n="" class="menu-title">الصفحه الرئيسيه</span></a>
              </li>
               <li class=" nav-item">
                <a href="{{route($role.'-ass-index')}}">
                  <i class="ft-cpu"></i><span data-i18n="" class="menu-title">الجمعية</span>
                </a>
              </li>
              <li class=" nav-item">
                <a href="{{route($role.'-abonnee-index')}}">
                  <i class="ft-cpu"></i><span data-i18n="" class="menu-title">المنخريطين</span>
                </a>
              </li>
              <li class=" nav-item">
                <a href="{{route($role.'-users-index')}}">
                  <i class="ft-cpu"></i><span data-i18n="" class="menu-title">المستخدمين</span>
                </a>
              </li>
              <li class=" nav-item">
                <a href="{{route($role.'-services-index')}}">
                  <i class="ft-cpu"></i><span data-i18n="" class="menu-title">الخدمات</span>
                </a>
              </li>
              <li class=" nav-item">
                <a href="{{route($role.'-tranches-index')}}">
                  <i class="ft-cpu"></i><span data-i18n="" class="menu-title">الاشطر</span>
                </a>
              </li>
        <li class="has-sub nav-item"><a href="#"><i class="ft-briefcase"></i><span data-i18n="" class="menu-title">خدمات</span></a>
                <ul class="menu-content">
                  <li class="has-sub"><a href="#" class="menu-item">شبكة الماء الصالح للشرب</a>
                    <ul class="menu-content">
           <li><a href="inputs.html" class="menu-item">لايحة المنخرضين</a></li>
           <li><a href="inputs.html" class="menu-item">اضافة منخرط</a></li>
           <li><a href="inputs.html" class="menu-item">الغرمات</a></li>
           <li><a href="inputs.html" class="menu-item">اشعرات ب الاداء</a></li>
           <li><a href="inputs.html" class="menu-item">تواصيل الاداء</a></li>
           <li><a href="inputs.html" class="menu-item">الجولات</a></li>
           <li><a href="inputs.html" class="menu-item">اعدادات</a></li>
           
          </ul>
          </li>
          <li class="has-sub"><a href="#" class="menu-item">روض الاطفال</a>
                    <ul class="menu-content">
           <li><a href="inputs.html" class="menu-item">لايحة المنخرضين</a></li>
           <li><a href="inputs.html" class="menu-item">اضافة منخرط</a></li>
           <li><a href="inputs.html" class="menu-item">اعدادات</a></li>
          </ul>
          </li>
          <li class="has-sub"><a href="#" class="menu-item">النقل المدرسي</a>
                    <ul class="menu-content">
           <li><a href="inputs.html" class="menu-item">لايحة المنخرضين</a></li>
           <li><a href="inputs.html" class="menu-item">اضافة منخرط</a></li>
           <li><a href="inputs.html" class="menu-item">اعدادات</a></li>
          </ul>
          </li>
          <li class="has-sub"><a href="#" class="menu-item">محو الامية</a>
                    <ul class="menu-content">
           <li><a href="inputs.html" class="menu-item">لايحة المنخرضين</a></li>
           <li><a href="inputs.html" class="menu-item">اضافة منخرط</a></li>
           <li><a href="inputs.html" class="menu-item">اعدادات</a></li>
          </ul>
          </li>
          <li class="has-sub"><a href="#" class="menu-item">خدمات اخراى</a>
                    <ul class="menu-content">
           <li><a href="inputs.html" class="menu-item">اضافة </a></li>
           <li><a href="inputs.html" class="menu-item">اعدادات</a></li>
          </ul>
          </li>
         </ul>
        </li>
        
        <li class="has-sub nav-item"><a href="#"><i class="ft-file-minus"></i><span data-i18n="" class="menu-title"> الحسبات</span></a>
                    <ul class="menu-content">
                      <li><a href="basic-forms.html" class="menu-item">تواصيل الاداء</a>
                      </li>
                     <li><a href="basic-forms.html" class="menu-item">تواصيل الاقتناء</a>
                      </li>
           </ul>
                  </li>
      
          
        
        <li class="has-sub nav-item"><a href="#"><i class="ft-file-minus"></i><span data-i18n="" class="menu-title"> التقارير</span></a>
                    <ul class="menu-content">
                      <li><a href="basic-forms.html" class="menu-item">التقريرالمالي الاسبوعي</a>
                      </li>
                     <li><a href="basic-forms.html" class="menu-item">التقريرالمالي الشهري</a>
                      </li>
            <li><a href="basic-forms.html" class="menu-item">التقريرالمالي السنوي</a>
                      </li>
           </ul>
                  </li>
      
      
      <li class="has-sub nav-item"><a href="#"><i class="ft-activity"></i><span data-i18n="" class="menu-title">احصاءيات</span></a>
                    <ul class="menu-content">
                      <li><a href="basic-forms.html" class="menu-item">اجصاء شبكة الماء الصالح للشرب</a>
                      </li>
                     <li><a href="basic-forms.html" class="menu-item">احصاء روض الاطفال</a>
                      </li>
            <li><a href="basic-forms.html" class="menu-item">احصاءالنقل المدرسي</a>
                      </li>
            <li><a href="basic-forms.html" class="menu-item">احصاء محو الامية</a>
                      </li>
            </ul>
                  </li>
      
        <li class="has-sub nav-item"><a href="#"><i class="ft-settings"></i><span data-i18n="" class="menu-title">اعدادات</span></a>
                    <ul class="menu-content">
                      <li><a href="basic-forms.html" class="menu-item">اعضاء مكتب الجمعية</a>
                      </li>
                     <li><a href="basic-forms.html" class="menu-item">القنون الداخلي</a>
                      </li>
            <li><a href="basic-forms.html" class="menu-item">الغرمات</a>
                      </li>
            <li><a href="basic-forms.html" class="menu-item">اعدادات أخرىء</a>
                      </li>
                  </li>
      
        
       
              
             
            </ul>
          </div>
        </div>
        <!-- main menu content-->
        <div class="sidebar-background"></div>
        <!-- main menu footer-->
        <!-- include includes/menu-footer-->
        <!-- main menu footer-->

      <!-- / main menu-->
