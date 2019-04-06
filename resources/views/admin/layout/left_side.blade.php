  <div class="main-menu menu-fixed menu-dark menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
<li class=" nav-item <?php if($page==0){ echo 'active';}?>"><a href="{{ url('/home') }}"><i class="icon-home"></i><span class="menu-title" data-i18n="nav.users.main">Dashboard</span></a></li>

 
       <li class=" nav-item "><a href="#"><i class="icon-layers"></i><span class="menu-title" data-i18n="nav.page_layouts.main">Master</span></a>
              <ul class="menu-content">
                <li class="<?php if($page==1){ echo 'active';}?>"><a class="menu-item " href="{{ url ('employe') }}" data-i18n="nav.page_layouts.1_column">Employee</a>
            </li>
            

              <li class="<?php if($page==2){ echo 'active';}?>">
              <a class="menu-item" href="{{ url ('store') }}" data-i18n="nav.page_layouts.2_columns">Store</a>
            </li>

               
                  <li class="<?php if($page==3){ echo 'active';}?>">
              <a class="menu-item" href="{{ url ('route') }}" data-i18n="nav.page_layouts.2_columns">Route</a>
            </li>

                   <li class="<?php if($page==4){ echo 'active';}?>">
              <a class="menu-item" href="{{ url ('expensive_category') }}" data-i18n="nav.page_layouts.2_columns">Expense Category</a>
            </li>



              </ul>
            </li>


             <li class=" nav-item "><a href="#"><i class="icon-layers"></i><span class="menu-title" data-i18n="nav.page_layouts.main">Allocation</span></a>
              <ul class="menu-content">
                <li class="<?php if($page==5){ echo 'active';}?>"><a class="menu-item " href="{{ url ('routeallocation') }}" data-i18n="nav.page_layouts.1_column">Allocate Route</a>
            </li>
            

              <li class="<?php if($page==6){ echo 'active';}?>">
              <a class="menu-item" href="{{ url ('storeallocation') }}" data-i18n="nav.page_layouts.2_columns">Allocate Store</a>
            </li>

               
                  

              </ul>
            </li>






         





           <li class=" nav-item <?php if($page==7){ echo 'active';}?>"><a href="{{ url ('price') }}"><i class="icon-layers"></i><span class="menu-title" data-i18n="nav.changelog.main">Price</span></a>
          </li> 
     
       <li class=" nav-item  <?php if($page==8){ echo 'active';}?>"><a href="{{ url ('firstreading') }}"><i class="icon-layers"></i><span class="menu-title" data-i18n="nav.changelog.main">First Reading</span></a>
          </li> 


          <li class=" nav-item "><a href="#"><i class="icon-layers"></i><span class="menu-title" data-i18n="nav.page_layouts.main">Report</span></a>
              <ul class="menu-content">
                <li class=" <?php if($page==9){ echo 'active';}?>"><a class="menu-item " href="{{ url ('report') }}" data-i18n="nav.page_layouts.1_column">Daily Report</a>
            </li>
            

              <li class="<?php if($page==10){ echo 'active';}?>">
              <a class="menu-item" href="{{ url ('datesales') }}" data-i18n="nav.page_layouts.2_columns">Route Wise Sales</a>
            </li>

                  <li class="<?php if($page==11){ echo 'active';}?>">
              <a class="menu-item" href="{{ url ('storesales') }}" data-i18n="nav.page_layouts.2_columns">Store Wise Sales</a>
            </li>
                  <li class="<?php if($page==12){ echo 'active';}?>">
              <a class="menu-item" href="{{ url ('expanse') }}" data-i18n="nav.page_layouts.2_columns">Expense</a>
            </li>

              </ul>
            </li>



      </ul>
    </div>
  </div>