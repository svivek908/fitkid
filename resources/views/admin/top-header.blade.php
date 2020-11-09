 <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="mobile-only-brand pull-left">
      
    </div>
    <div id="mobile_right_sidebar" class="mobile-right-sidebar pull-right">
      <ul class="nav navbar-right top-nav pull-right">
      
		 <li>
			 <div id="google_translate_element" style="display:inline-block;margin-top: 15px;"></div>
		 </li>
  <!--       <li class="dropdown auth-drp"> <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="{{ asset('images/logo.png')}}" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
          <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
            <li> <a href="{{ route('admin-logout')}}"><i class="mdi mdi-power"></i><span>Log Out</span></a> </li>
          </ul>
        </li> -->
      </ul>
    </div>
    <div class="">
        <div class="logo-wrap"> <a href="{{url('admin/dashboard')}}"> 
          <img class="brand-img" src="{{URL::ASSET('images/logo.png')}}" alt="brand" style="width: 120px;
    height: 61px;margin-left: 20%;" /> </a> </div>
    <ul class="nav navbar-nav side-nav nicescroll-bar">
      <li> <a href="{{url('admin/dashboard')}}" data-toggle="collapse" data-target="#admin-dash">
        <div class="pull-left"><i class="fa fa-tachometer" aria-hidden="true" style="padding-right: 5px"></i><span class="right-nav-text">Dashboard</span></div>
        <div class="pull-right"></div>
        <div class="clearfix"></div>
        </a>
        
      </li>
     
      <li> <a href="{{url('admin/trainee')}}" data-toggle="collapse" data-target="#admin-dash">
        <div class="pull-left"><i class="fa fa-users mr-20"></i><span class="right-nav-text">Students</span></div>
        <div class="pull-right"></div>
        <div class="clearfix"></div>
        </a>
        
      </li>
      <li> <a href="{{url('admin/batch')}}" data-toggle="collapse" data-target="#admin-dash">
        <div class="pull-left"><i class="fa fa-database mr-20"></i><span class="right-nav-text">Batches</span></div>
        <div class="pull-right"></div>
        <div class="clearfix"></div>
        </a>
        
      </li>
      <li> <a href="{{route('all_payments')}}" data-toggle="collapse" data-target="#admin-all_payments">
        <div class="pull-left"><i class="fa fa-money mr-20"></i><span class="right-nav-text">Payments</span></div>
        <div class="pull-right"></div>
        <div class="clearfix"></div>
        </a>
        
      </li>
     
    
      <li>
        
       <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
        Masters<i class="fa fa-caret-down" aria-hidden="true" style="padding-left: 3px"></i>
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="{{url('admin/banner')}}">Banners</a>
        <a class="dropdown-item" href="{{url('admin/gallery')}}">Gallery</a>
          <a class="dropdown-item" href="{{url('admin/video')}}">Videos</a>
          <a href="{{url('admin/classtype')}}" translate="no">Class type</a>
          <a href="{{url('admin/course')}}" translate="no">Courses</a>
        <a class="dropdown-item" href="{{url('admin/testimonial')}}">Testimonial</a>
        <a class="dropdown-item" href="{{url('admin/expenses')}}">Expenses</a>
      </div>
    </li>
      </li>
      
       <li> <a href="{{url('admin/report')}}" data-toggle="collapse" data-target="#ui_element">
        <div class="pull-left"><i class="fa fa-pencil-square-o" aria-hidden="true" style="padding-right:5px"></i><span class="right-nav-text">Reports</span></div>
        <div class="pull-right"></div>
        <div class="clearfix"></div>
        </a>
      </li>
     <li> <a href="{{url('admin/admin_change_password')}}" data-toggle="collapse" data-target="#ui_element">
        <div class="pull-left"><i class="fa fa-pencil-square-o" aria-hidden="true" style="padding-right:5px"></i><span class="right-nav-text">Change Password</span></div>
        <div class="pull-right"></div>
        <div class="clearfix"></div>
        </a>
      </li>
    
     <li> <a href="{{url('admin/edit_profile')}}" data-toggle="collapse" data-target="#ui_element">
        <div class="pull-left"><i class="fa fa-user mr-20"></i><span class="right-nav-text">Profile</span></div>
        <div class="pull-right"></div>
        <div class="clearfix"></div>
        </a>
      </li>

     <li> <a href="{{url('admin/logout')}}" data-toggle="collapse" data-target="#ui_element">
        <div class="pull-left"><i class="fa fa-sign-out mr-20"></i><span class="right-nav-text">Logout</span></div>
        <div class="pull-right"></div>
        <div class="clearfix"></div>
        </a>
      </li>
    </ul>
      </div>
  </nav>
  <style type="text/css">
    .logo-wrap {
    float: left;
}
.logo-wrap {
    float: left;
}
i.mdi.mdi-lead-pencil.font-18.txt-primary.data-table-edit {
    background-color: #000;
    color: #fff;
    padding: 4px;
}
i.fa.fa-close.txt-danger.font-18.delete {
    background-color: #000;
    color: #fff !important;
    padding: 6px;
}
.navbar-nav {
    float: right;
    margin-right: 0px;
}
.navbar.navbar-inverse.navbar-fixed-top .nav>li>a:active, .navbar.navbar-inverse.navbar-fixed-top .nav>li>a:focus, .navbar.navbar-inverse.navbar-fixed-top .nav>li>a:hover {
    color:#676767;
}
.mr-20 {
    margin-right: 5px!important;
}
.dropdown-menu a:hover
{
 color:#676767; 
}
.dropdown-menu a {
    display: block;
    padding: 5px 15px;
}
  </style>
