<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-end me-3 rotate-caret  bg-gradient-dark" id="sidenav-main">
    <div class="nav-item nav-profile">
        <div class="nav-link">
            <div class="profile-image"> <img src={{asset('assets/img/drake.jpg')}} alt="image"/> 
                
            <div class="profile-name">
              <p class="name">اهلا ادمن</p>
            </div>
          </div>
        </div>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse px-0 w-auto  max-height-vh-100"  id="sidenav-collapse-main" style="height: calc(100vh - 200px);">
      <ul class="navbar-nav">

       

        <li class="nav-item">
          <a class="nav-link sidenav-nav-link active" href="../pages/dashboard.html">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="material-icons-round opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text me-1">لوحة القيادة</span>
          </a>
        </li>
        @can('show_users')
            
        <li class="nav-item">
          <a class="nav-link sidenav-nav-link" href="{{route('admin.users.index')}}">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="material-icons-round opacity-10">table_view</i>
            </div>
            <span class="nav-link-text me-1">المستخدمين</span>
          </a>
        </li>
        @endcan

        @can('show_posts')
            
        <li class="nav-item">
          <a class="nav-link sidenav-nav-link" href="{{route('admin.posts.index')}}">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="material-icons-round opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text me-1">المنشورات</span>
          </a>
        </li>
        @endcan
        @can('show_roles')

         <li class="nav-item">
          <a class="nav-link sidenav-nav-link" href="{{route('admin.roles.index')}}">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="material-icons-round opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text me-1">الصلاحيات</span>
          </a>
        </li>
        @endcan
        @can('show_admin_users')

        <li class="nav-item">
          <a class="nav-link sidenav-nav-link" href="{{route('admin.admin.users.index')}}">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="material-icons-round opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text me-1">مستخدمى النظام</span>
          </a>
        </li>
        @endcan

       {{-- <li class="nav-item">
          <a class="nav-link sidenav-nav-link" href="../pages/notifications.html">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text me-1">إشعارات</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link sidenav-nav-link" href="../pages/profile.html">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="material-icons-round opacity-10">person</i>
            </div>
            <span class="nav-link-text me-1">حساب تعريفي</span>
          </a>
        </li> --}}
        <li class="nav-item">
          <a href="{{route('admin.logout')}}" class="nav-link sidenav-nav-link" href="../pages/sign-in.html">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="material-icons-round opacity-10">login</i>
            </div>
            <span class="nav-link-text me-1">تسجيل الدخول</span>
          </a>
        </li> 
      
      </ul>
    </div>
   
  </aside>