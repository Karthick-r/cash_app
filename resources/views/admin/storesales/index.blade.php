@extends('admin.layout.app')
 

@section('main-content')
 <?php $page=11;?> 

   <section id="dom">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Store Report</h4>



                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements" style="top:11px;right:100px">
                    <ul class="list-inline mb-0">
                   <li> 

                       
                   <div class="col-md-12 col-sm-12 col-12">          


  <form method="post" action="{{ route('storesales.store') }}">

                          {{ csrf_field() }}
                  
  <div class="form-group">
      <div class="input-group">
         <input type='text' class="form-control showdropdowns"  name="date" placeholder="{{$date}}" value="{{$date}}" />
            <div class="input-group-append">
              <span class="input-group-text">
                <span class="fa fa-calendar"></span>
              </span>
            </div>

         <select class="form-control" name="sto_id" style="margin-left: 25px" >
         <option value=="0"> ALL Store</option>
         
           @foreach($store as $stores)
            <option value="{{$stores->store_id}}" >{{$stores->store_name}}</option>
           @endforeach
         
         </select>
        
        <input type="submit" value="Search" name=""  style="margin-left: 25px" class="btn btn-info">
      </div>                    
  </div>
    </form>
  </div>

                      </li>
                      
                    
                    </ul>
                  </div>
                </div>
                </div>
                </div>
                </div>
                </section>





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
                     
                          <span class="font-large-1 text-bold-500 info text-center">{{$today->water}} ltr</span>
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
                         
                          <span class="font-large-1 text-bold-500 warning "> Cash Collected</span>
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

     



     


     
     <section id="dom">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Daily Report</h4>


                     

                 
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                   
                      <li>
 

                       </li>
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    
            <div class="table-responsive">
            
                 <table  class="table table-striped table-bordered  dataex-html5-export">
                <thead>

                  <tr>
                <th rowspan="2">#</th>
                      <th rowspan="2">  Date(dd-mm)</th>
                  <th rowspan="2" >Shop-Name</th> 
                  <th rowspan="2">Route-Name</th>
                  <th colspan="5" style="text-align:center">Water</th>
                  <th colspan="5" style="text-align:center">bottle</th>              
                  <th rowspan="2">Salary</th>
                  <th rowspan="2">Cash</th>
            
                </tr>
                <tr>
          
                  <th >O.R</th>
                  <th>C.R</th> 
                  <th>M.R</th> 
                  <th>T.R</th>
                  <th>Amount</th>
                  <th>O.R</th>
                  <th>C.R</th> 
                  <th>M.R</th>  
                  <th>T.R</th>
                  <th>Amount</th>
                
            
                </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
                @foreach($reading as $reading)
                <tr>
                <td>{{ $i }}
         <?php $i++;?>
                </td>
                <td><?php echo date('d-m-Y',strtotime($reading->created_at));?></td>
          <td> {{$reading->reading_store1->store_name}}</td>
          <td><a> {{$reading->reading_route1->route_name}}  </a></td>
          <td><a><?php $open=$reading->water_reading-$reading->today_water_reading; ?></a>{{$open}}</td>
          <td><a>{{$reading->water_reading}}</a></td>
          <td><a>{{$reading->water_maintance_reading}}</a></td>
          <td><a>{{$reading->today_water_reading}}</a></td>
          <td><?php echo ($reading->today_water_reading * $reading->water_price);?></td>
    


          <td><a><?php $open1= $reading->bottle_reading-$reading->today_bottle_reading; ?></a>{{$open1}}</td>
          <td><a>{{$reading->bottle_reading}}</a></td>
          <td><a>{{$reading->bottle_maintance_reading}}</a></td>
          <td><a>{{$reading->bottle_today_reading}}</a></td>  
          <td><?php echo ($reading->bottle_today_reading * $reading->bottle_price);?></td>

 <td><a>{{$reading->salary}}</a></td>  

 <td><a href="" data-toggle="modal" data-target="#default{{$reading->reading_id}}">{{$reading->cash_collect}}</a></td>  

      

                 
                </tr>

 
                    <div class="modal fade text-left" id="default{{$reading->reading_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                          aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel1">Denomination</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                              
                                @foreach($denominations as $denomination)

                                @if($reading->reading_id==$denomination->reading_id)
                             <div class="modal-body">
                          <h5><b>2000</b>:{{ $denomination->rs_2000}}</h5>
                          <h5><b>500</b>:{{ $denomination->rs_500}}</h5>
                          <h5><b>200</b>:{{ $denomination->rs_200}}</h5>
                          <h5><b>100</b>:{{ $denomination->rs_100}}</h5>
                          <h5><b>20</b>:{{ $denomination->rs_20}}</h5>
                          <h5><b>10</b>:{{ $denomination->rs_10}}</h5>
                          <h5><b>5</b>:{{ $denomination->rs_5}}</h5>
                          <h5><b>2</b>:{{ $denomination->rs_2}}</h5>
                          <h5><b>1</b>:{{ $denomination->rs_1}}</h5>
                                </div>
                                @endif
                                 @endforeach
                                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                                 
                                </div>
                              </div>
                            </div>
                          </div>
                 @endforeach
              
              
                </tbody>
              
              </table>
              </div>
                
             </div>
                </div>
              </div>
            </div>
          </div>
        </section>

 <div id="div_hidden">
                  
<input id="picker_from"  class="form-control datepicker" type="hidden">
<input id="picker_to" class="form-control datepicker" type="hidden">
       
    </div>

<script>
document.getElementById("div_hidden").style.display = "none";
</script>
     

     
@endsection