<?php $page=1;?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template.">
  <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>Project Dashboard - Robust - Responsive Bootstrap 4 Admin Dashboard Template for
    Web Application</title>
  <link rel="apple-touch-icon" href="{{asset('admin/images/ico/apple-icon-120.png')}}">
  <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,400,500,700"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/css/vendors.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/charts/jquery-jvectormap-2.0.3.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/charts/morris.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/extensions/unslider.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/weather-icons/climacons.min.css')}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN ROBUST CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/css/app.css')}}">
  <!-- END ROBUST CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/css/core/menu/menu-types/vertical-menu.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/css/core/colors/palette-gradient.css')}}">
  <link rel="stylesheet" type="text/css" href=".{{asset('admin/css/plugins/calendars/clndr.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/css/core/colors/palette-climacon.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/css/pages/users.css')}}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}">
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="2-columns">
@include('admin.layout.navbar')
  <!-- ////////////////////////////////////////////////////////////////////////////-->
@include('admin.layout.left_side')

  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <!-- project stats -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-content">
                <div class="row">
                  <div class="col-lg-4 col-md-12 col-sm-12 border-right-blue-grey border-right-lighten-5">
                    <div class="p-1 text-center">
                      <div>
                        <h3 class="font-large-1 grey darken-1 text-bold-400">$84,962</h3>
                        <span class="font-small-3 grey darken-1">Monthly Profit</span>
                      </div>
                      <div class="card-content overflow-hidden">
                        <div id="morris-comments" class="height-75"></div>
                        <ul class="list-inline clearfix mb-0">
                          <li class="border-right-grey border-right-lighten-2 pr-2">
                            <h3 class="success text-bold-400">$8,200</h3>
                            <span class="font-small-3 grey darken-1"><i class="ft-chevron-up success"></i> Today</span>
                          </li>
                          <li class="pl-2">
                            <h3 class="success text-bold-400">$5,400</h3>
                            <span class="font-small-3 grey darken-1"><i class="ft-chevron-down success"></i> Yesterday</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-12 col-sm-12 border-right-blue-grey border-right-lighten-5">
                    <div class="p-1 text-center">
                      <div>
                        <h3 class="font-large-1 grey darken-1 text-bold-400">1,879</h3>
                        <span class="font-small-3 grey darken-1">Total Sales</span>
                      </div>
                      <div class="card-content overflow-hidden">
                        <div id="morris-likes" class="height-75"></div>
                        <ul class="list-inline clearfix mb-0">
                          <li class="border-right-grey border-right-lighten-2 pr-2">
                            <h3 class="primary text-bold-400">4789</h3>
                            <span class="font-small-3 grey darken-1"><i class="ft-chevron-up primary"></i> Today</span>
                          </li>
                          <li class="pl-2">
                            <h3 class="primary text-bold-400">389</h3>
                            <span class="font-small-3 grey darken-1"><i class="ft-chevron-down primary"></i> Yesterday</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="p-1 text-center">
                      <div>
                        <h3 class="font-large-1 grey darken-1 text-bold-400">894</h3>
                        <span class="font-small-3 grey darken-1">Support Tickets</span>
                      </div>
                      <div class="card-content overflow-hidden">
                        <div id="morris-views" class="height-75"></div>
                        <ul class="list-inline clearfix mb-0">
                          <li class="border-right-grey border-right-lighten-2 pr-2">
                            <h3 class="danger text-bold-400">81</h3>
                            <span class="font-small-3 grey darken-1"><i class="ft-chevron-up danger"></i> Critical</span>
                          </li>
                          <li class="pl-2">
                            <h3 class="danger text-bold-400">498</h3>
                            <span class="font-small-3 grey darken-1"><i class="ft-chevron-down danger"></i> Low</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>


                </div>
              </div>
            </div>
          </div>
        </div>



<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                      <div class="pb-1 text-center">
                        <div class="clearfix mb-1 text-center">
                     
                          <span class="font-large-1 text-bold-500 info text-center">Total Water liters</span>
                        </div>
                        <div class="clearfix mb-1 ">
                     
                          <span class="font-large-1 text-bold-500 info text-center">{{$today->water}} liters</span>
                        </div>
                      
                      </div>
                      <div class="progress mb-0" style="height: 7px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>

                    <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                      <div class="pb-1 text-center">
                        <div class="clearfix mb-1">
                         
                          <span class="font-large-1 text-bold-500 danger"> Bottles</span>
                        </div>
                       
                         <div class="clearfix mb-1">
                         New
                         
                          <span class="font-large-1 text-bold-300 danger"> {{$today->new_bottle}} </span>

                          Closed
                          <span class="font-large-1 text-bold-300 danger"> {{$today->bottle}} </span>
                       
                        </div>
                        </div>
                     
                         
                        
                    
                      <div class="progress mb-0" style="height: 7px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>


                    <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                      <div class="pb-1 text-center">
                        <div class="clearfix mb-1">
                        
                          <span class="font-large-1 text-bold-500 success ">Today Salary</span>
                        </div>
                        <div class="clearfix mb-1">
                        
                          <span class="font-large-1 text-bold-500 success">Rs.{{$today->salary}}</span>
                        </div>
                     
                      </div>
                      <div class="progress mb-0" style="height: 7px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>

                    <div class="col-lg-3 col-sm-12 text-center">
                      <div class="pb-1 text-center">
                        <div class="clearfix mb-1">
                         
                          <span class="font-large-1 text-bold-500 warning ">Today Cash Collected</span>
                        </div>

                          <div class="clearfix mb-1">
                         
                          <span class="font-large-1 text-bold-500 warning ">Rs.{{$today->cash}}</span>
                        </div>


                       
                      </div>
                      <div class="progress mb-0" style="height: 7px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



        <!--/ project stats -->
        <!--/ project charts -->
        <div class="row match-height">
          <div class="col-xl-8 col-lg-12">


            <div class="card">
              <div class="card-content">

                
                <div class="chartjs height-250">
                  <canvas id="line-stacked-area" height="250"></canvas>
                </div>
              </div>

            </div>

          </div>


          <div class="col-xl-4 col-lg-12">
            <div class="card  card-inverse bg-primary">
              <div class="card-content">
                <div class="card-body sales-growth-chart">
                  <div class="chart-title mb-1 text-center">
                    <span class="white">Total monthly Sales.</span>



                  </div>



                 
                </div>
              </div>
             
            </div>
          </div>



        </div>
        <!--/ project charts -->
        <!--project health, featured & chart-->
        <div class="row">
          <div class="col-xl-4 col-lg-6 col-md-12">
            <div class="card">
              <div class="card-content">
                <div class="card-body text-center" style="background:black">
                  
                  <div class="card-header mb-2">
                    <span class="success darken-1">Total Budget</span>
                    <h3 class="font-large-2 grey darken-1 text-bold-200">$24,879</h3>
                  </div>
                  <div class="card-content">
                    <input type="text" value="75" class="knob hide-value responsive angle-offset" data-angleOffset="0"
                    data-thickness=".15" data-linecap="round" data-width="150" data-height="150"
                    data-inputColor="#e1e1e1" data-readOnly="true" data-fgColor="#37BC9B"
                    data-knob-icon="ft-trending-up">
                    <ul class="list-inline clearfix mt-2 mb-0">
                      <li class="border-right-grey border-right-lighten-2 pr-2">
                        <h2 class="grey darken-1 text-bold-400">75%</h2>
                        <span class="success">Completed</span>
                      </li>
                      <li class="pl-2">
                        <h2 class="grey darken-1 text-bold-400">25%</h2>
                        <span class="danger">Remaining</span>
                      </li>
                    </ul>
                  </div>


<div id="monthly-sales" class="height-250" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
<svg height="250" version="1.1" width="253.797" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.390625px; top: -0.265625px;">

<desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.1.2</desc>
<defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>

<text x="44.84375" y="211" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text>


<path fill="none" stroke="#ffffff" d="M57.34375,211H228.797" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>

<text x="44.84375" y="164.5" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">750</tspan></text>
<path fill="none" stroke="#ffffff" d="M57.34375,164.5H228.797" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>

<text x="44.84375" y="118" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">1,500</tspan></text>

<path fill="none" stroke="#ffffff" d="M57.34375,118H228.797" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>

<text x="44.84375" y="71.5" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2,250</tspan></text>


<path fill="none" stroke="#ffffff" d="M57.34375,71.5H228.797" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>


<text x="44.84375" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">3,000</tspan>

</text>

<path fill="none" stroke="#ffffff" d="M57.34375,25H228.797" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>



<text x="221.65311458333335" y="223.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Dec</tspan></text>


<text x="150.21426041666666" y="223.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Jul</tspan></text>

<text x="78.77540625" y="223.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Feb</tspan></text>



<rect x="62.34446979166667" y="97.23" width="4.28633125" height="113.77" rx="0" ry="0" fill="#ffffff" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>


<rect x="76.632240625" y="64.928" width="4.28633125" height="146.072" rx="0" ry="0" fill="#ffffff" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>

<rect x="90.92001145833333" y="120.542" width="4.28633125" height="90.458" rx="0" ry="0" fill="#ffffff" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>

<rect x="105.20778229166667" y="131.082" width="4.28633125" height="79.918" rx="0" ry="0" fill="#ffffff" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>

<rect x="119.495553125" y="108.886" width="4.28633125" height="102.114" rx="0" ry="0" fill="#ffffff" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>

<rect x="133.7833239583333" y="77.328" width="4.28633125" height="133.672" rx="0" ry="0" fill="#ffffff" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>


<rect x="148.07109479166667" y="97.23" width="4.28633125" height="113.77" rx="0" ry="0" fill="#ffffff" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>

<rect x="162.358865625" y="64.928" width="4.28633125" height="146.072" rx="0" ry="0" fill="#ffffff" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>


<rect x="176.64663645833332" y="120.542" width="4.28633125" height="90.458" rx="0" ry="0" fill="#ffffff" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>

<rect x="190.93440729166664" y="131.082" width="4.28633125" height="79.918" rx="0" ry="0" fill="#ffffff" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>

<rect x="205.22217812499997" y="108.886" width="4.28633125" height="102.114" rx="0" ry="0" fill="#ffffff" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>

<rect x="219.50994895833333" y="77.328" width="4.28633125" height="133.672" rx="0" ry="0" fill="#ffffff" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>


</svg>

    

</div>


                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-md-12">
            <div class="card white bg-warning text-center">
              <div class="card-content">
                <div class="card-body">
                  <img src="{{asset('admin/images/elements/04.png')}}" alt="element 05" height="170"
                  class="mb-1">
                  <h4 class="card-title white">Storage Device</h4>
                  <p class="card-text white">945 items</p>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-content">
                <div class="media align-items-stretch">
                  <div class="p-2 bg-warning text-white media-body text-left rounded-left">
                    <h5 class="text-white">New Orders</h5>
                    <h5 class="text-white text-bold-400 mb-0">4,65,879</h5>
                  </div>
                  <div class="p-2 text-center bg-warning bg-darken-2 rounded-right">
                    <i class="icon-camera font-large-2 text-white"></i>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="card">
            <div class="card-content">
                <div class="media">
                    <div class="p-2 bg-warning white media-body">
                        <h5 class="white">New Orders</h5>
                        <h5 class="text-bold-400 white">4,65,879</h5>
                    </div>
                    <div class="p-2 text-center bg-warning bg-darken-2 media-left media-middle">
                        <i class="ft-shopping-cart font-large-2 white"></i>
                    </div>
                </div>
            </div>
        </div> -->
          </div>
          <div class="col-xl-4 col-lg-12 col-md-12">
            <div class="card card-inverse bg-info">
              <div class="card-content">
                <div class="position-relative">
                  <div class="chart-title position-absolute mt-2 ml-2 white">
                    <h1 class="font-large-2 text-bold-200 white">84%</h1>
                    <span>Employees Satisfied</span>
                  </div>
                  <canvas id="emp-satisfaction" class="height-400 block"></canvas>
                  <div class="chart-stats position-absolute position-bottom-0 position-right-0 mb-3 mr-3 white">
                    <a href="#" class="btn bg-info bg-darken-3 mr-1 white">Statistics <i class="ft-bar-chart"></i></a>                    for the last year.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- projects table with monthly chart -->
        <div class="row">
          <div class="col-xl-8 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Ongoing Projects</h4>
                <a class="heading-elements-toggle"><i class="ft-more-horizontal font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <p class="m-0">Total ongoing projects 6
                    <span class="float-right"><a href="project-summary.html" target="_blank">Project Summary <i class="ft-arrow-right"></i></a></span>
                  </p>
                </div>
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th>Project</th>
                        <th>Owner</th>
                        <th>Priority</th>
                        <th>Progress</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-truncate">ReactJS App</td>
                        <td class="text-truncate">
                          <span class="avatar avatar-xs">
                            <img src="{{asset('admin/images/portrait/small/avatar-s-4.png')}}"
                            alt="avatar">
                          </span>
                          <span>Sarah W.</span>
                        </td>
                        <td class="text-truncate">
                          <span class="tag tag-success">Low</span>
                        </td>
                        <td class="valign-middle">
                          <div class="progress m-0" style="height: 7px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 88%" aria-valuenow="88"
                            aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-truncate">Fitness App</td>
                        <td class="text-truncate">
                          <span class="avatar avatar-xs">
                            <img src="{{asset('admin/images/portrait/small/avatar-s-5.png')}}"
                            alt="avatar">
                          </span>
                          <span>Edward C.</span>
                        </td>
                        <td class="text-truncate">
                          <span class="tag tag-warning">Medium</span>
                        </td>
                        <td class="valign-middle">
                          <div class="progress m-0" style="height: 7px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55"
                            aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-truncate">SOU plugin</td>
                        <td class="text-truncate">
                          <span class="avatar avatar-xs">
                            <img src="{{asset('admin/images/portrait/small/avatar-s-6.png')}}"
                            alt="avatar">
                          </span>
                          <span>Carol E.</span>
                        </td>
                        <td class="text-truncate">
                          <span class="tag tag-danger">Critical</span>
                        </td>
                        <td class="valign-middle">
                          <div class="progress m-0" style="height: 7px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 55%" aria-valuenow="55"
                            aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-truncate">Android App</td>
                        <td class="text-truncate">
                          <span class="avatar avatar-xs">
                            <img src="{{asset('admin/images/portrait/small/avatar-s-7.png')}}"
                            alt="avatar">
                          </span>
                          <span>Gregory L.</span>
                        </td>
                        <td class="text-truncate">
                          <span class="tag tag-success">Low</span>
                        </td>
                        <td class="valign-middle">
                          <div class="progress m-0" style="height: 7px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 95%" aria-valuenow="95"
                            aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-truncate">ABC Inc. UI/UX</td>
                        <td class="text-truncate">
                          <span class="avatar avatar-xs">
                            <img src="{{asset('admin/images/portrait/small/avatar-s-8.png')}}"
                            alt="avatar">
                          </span>
                          <span>Susan S.</span>
                        </td>
                        <td class="text-truncate">
                          <span class="tag tag-warning">Medium</span>
                        </td>
                        <td class="valign-middle">
                          <div class="progress m-0" style="height: 7px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 45%" aria-valuenow="45"
                            aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-truncate">Product UI</td>
                        <td class="text-truncate">
                          <span class="avatar avatar-xs">
                            <img src="../../../app-assets/images/portrait/small/avatar-s-9.png"
                            alt="avatar">
                          </span>
                          <span>Walter K.</span>
                        </td>
                        <td class="text-truncate">
                          <span class="tag tag-danger">Critical</span>
                        </td>
                        <td class="valign-middle">
                          <div class="progress m-0" style="height: 7px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15"
                            aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-12">
            <div class="card">
              <div class="card-content bg-success">
                <div class="card-body sales-growth-chart">
                  <div id="completed-project" class="height-250"></div>
                </div>
              </div>
              <div class="card-footer">
                <div class="chart-title">
                  <span class="text-muted">Total completed project and earning.</span>
                </div>
                <ul class="list-inline text-center clearfix mt-2 mb-0">
                  <li class="border-right-grey border-right-lighten-2 pr-1">
                    <span class="text-muted">Completed Projects</span>
                    <h3 class="block">250</h3>
                  </li>
                  <li class="pl-2">
                    <span class="text-muted">Total Earnings</span>
                    <h3 class="block">64.54 M</h3>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!--/ projects table with monthly chart -->
        <!-- Recent invoice with Statistics -->
        <div class="row match-height">
          <div class="col-xl-4 col-lg-12">
            <div class="card">
              <div class="card-header no-border-bottom">
                <h4 class="card-title">Invoices Stats</h4>
                <a class="heading-elements-toggle"><i class="ft-more-horizontal font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <ul class="list-inline text-right pr-2 mb-0">
                    <li>
                      <h6><i class="ft-circle grey lighten-1"></i> Paid</h6>
                    </li>
                    <li>
                      <h6><i class="ft-circle danger"></i> Unpaid</h6>
                    </li>
                  </ul>
                </div>
                <div id="project-invoices" class="height-250"></div>
              </div>
            </div>
          </div>
          <div class="col-xl-8 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Recent Invoices</h4>
                <a class="heading-elements-toggle"><i class="ft-more-horizontal font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <p>Total paid invoices 240, unpaid 150.
                    <span class="float-right"><a href="project-summary.html" target="_blank">Invoice Summary <i class="ft-arrow-right"></i></a></span>
                  </p>
                </div>
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th>Invoice#</th>
                        <th>Customer Name</th>
                        <th>Status</th>
                        <th>Due</th>
                        <th>Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-truncate"><a href="#">INV-001001</a></td>
                        <td class="text-truncate">Elizabeth W.</td>
                        <td class="text-truncate">
                          <span class="tag tag-default tag-success">Paid</span>
                        </td>
                        <td class="text-truncate">10/05/2016</td>
                        <td class="text-truncate">$ 1200.00</td>
                      </tr>
                      <tr>
                        <td class="text-truncate"><a href="#">INV-001012</a></td>
                        <td class="text-truncate">Andrew D.</td>
                        <td class="text-truncate">
                          <span class="tag tag-default tag-success">Paid</span>
                        </td>
                        <td class="text-truncate">20/07/2016</td>
                        <td class="text-truncate">$ 152.00</td>
                      </tr>
                      <tr>
                        <td class="text-truncate"><a href="#">INV-001401</a></td>
                        <td class="text-truncate">Megan S.</td>
                        <td class="text-truncate">
                          <span class="tag tag-default tag-success">Paid</span>
                        </td>
                        <td class="text-truncate">16/11/2016</td>
                        <td class="text-truncate">$ 1450.00</td>
                      </tr>
                      <tr>
                        <td class="text-truncate"><a href="#">INV-01112</a></td>
                        <td class="text-truncate">Doris R.</td>
                        <td class="text-truncate">
                          <span class="tag tag-default tag-warning">Overdue</span>
                        </td>
                        <td class="text-truncate">11/12/2016</td>
                        <td class="text-truncate">$ 5685.00</td>
                      </tr>
                      <tr>
                        <td class="text-truncate"><a href="#">INV-008101</a></td>
                        <td class="text-truncate">Walter R.</td>
                        <td class="text-truncate">
                          <span class="tag tag-default tag-warning">Overdue</span>
                        </td>
                        <td class="text-truncate">18/05/2016</td>
                        <td class="text-truncate">$ 685.00</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Recent invoice with Statistics -->
        <!-- Emp of month & social cards -->
   
        <!--/ Emp of month & social cards -->
        <!--CLNDR Wrapper-->

  


        <!--/CLNDR Wrapper -->
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent"
        target="_blank">PIXINVENT </a>, All rights reserved. </span>
      <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
    </p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <script src="{{asset('admin/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{asset('admin/vendors/js/extensions/jquery.knob.min.js')}}" type="text/javascript"></script>

  <script src="{{asset('admin/vendors/js/charts/raphael-min.js')}}" type="text/javascript"></script>
  
  <script src="{{asset('admin/vendors/js/charts/morris.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/vendors/js/charts/chartist.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/vendors/js/charts/chartist-plugin-tooltip.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/vendors/js/charts/jquery.sparkline.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/vendors/js/extensions/moment.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/vendors/js/extensions/underscore-min.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/vendors/js/extensions/clndr.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/vendors/js/extensions/unslider-min.js')}}" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN ROBUST JS-->
  <script src="{{asset('admin/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/js/core/app.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/js/scripts/customizer.js')}}" type="text/javascript"></script>
  <!-- END ROBUST JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{asset('admin/js/scripts/pages/dashboard-project.js')}}" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>