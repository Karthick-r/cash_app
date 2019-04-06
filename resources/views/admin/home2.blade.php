@extends('admin.layout.app')

@section('main-content')

<?php $page=0;?>



 <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                      <div class="pb-1 text-center">
                        <div class="clearfix mb-1 text-center">
                     
                          <span class="font-large-1 text-bold-500 info text-center">Total liters</span>
                        </div>
                        <div class="clearfix mb-1 ">
                     
                          <span class="font-large-1 text-bold-500 info text-center">{{$today->water}} ltr </span>
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
                        
                          <span class="font-large-1 text-bold-500 success "> Salary</span>
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
                         
                          <span class="font-large-1 text-bold-500 warning ">Cash Collected</span>
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




<div class="row">
    <div class="col-xl-12 col-lg-12 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
  
<div id="chartContainer" style="height: 370px; width: 100%;"></div>

                </div>
            </div>
        </div>
    </div>

   
</div>

<div class="row">
    <div class="col-xl-6 col-lg-12 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                <div class="">
                <select>
                  <option>Jan</option>
                   <option>Feb</option>
                </select>
                </div>
  
<div id="chartContainer2" style="height: 370px; width: 100%;"></div>

                </div>
            </div>
        </div>
    </div>

 <div class="col-xl-6 col-lg-12 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
  
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Chart Demo</div>

                <div class="panel-body">
                    {!! $chart->html() !!}
                </div>
            </div>
        </div>
    </div>
</div>
{!! Charts::scripts() !!}
{!! $chart->script() !!}


                </div>
            </div>
        </div>
    </div>
   
</div>









@endsection

