

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
@include('admin.layout.head')

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
 data-open="click" data-menu="vertical-menu" data-col="2-columns">

 
  <!-- fixed-top-->
@include('admin.layout.navbar')
  <!-- ////////////////////////////////////////////////////////////////////////////-->
@include('admin.layout.left_side')
  
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      
        @yield('header-content')
      </div>
        <div class="content-body">
          @section('main-content')
            

                  @show
        </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
@include('admin.layout.footer')
  <!-- BEGIN VENDOR JS-->
  @include('admin.layout.alert')
 @include('admin.layout.script')

  
 @section('last-content')
            

                  @show


                
</body>
</html>
