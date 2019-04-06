@extends('admin.layout.app')
 

@section('main-content')
  <?php $page=5;?>     
     <section id="dom">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Route Allocation for employee</h4>



                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
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
                    
            
                 <table  class="table table-striped table-bordered zero-configuration">
                <thead>
                <tr>
                <th>#</th>
                  <th>Route Name</th> 
                  <th>No of shop</th> 
                  <th>Employee Name</th> 
                  <th>Exchange Employe</th>

                                  
                  <th>Action</th>
                
      
                </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
                @foreach($route as $routes)
                <tr>
                <td>{{ $i }}
         <?php $i++;?>
                </td>
                  <td>{{$routes->route_name}}</td>
                  <td><a href="" data-toggle="modal" data-target="#large{{$routes->route_id}}">{{$routes->stores_route->count()}}</a></td>
              <td>@if($routes->user_id==0)
  <a href="{{ route('routeallocation.edit',$routes->route_id ) }}" class="btn btn-success">
                            Not allocated
                                        </a>
@else              {{$routes->users->name}}@endif</td>


                
                  <td>

<input type="hidden" value="{{ $routes->user_id }}" id="order_id{{$routes->route_id }}" name="order_id">

  
@if($routes->user_id!=0)
<select id="order{{$routes->route_id }}" name="order" class="form-control col-8" onchange="order_change{{$routes->route_id }}()">
  

 @foreach($route as $rou)
        @if($rou->user_id!=0)        
                

 <option value="{{ $rou->users->id}}" <?php if($routes->user_id == $rou->users->id  ) {echo "selected"; } ?>>{{ $rou->users->name}}</option>
 @endif

 @endforeach</select>@endif


 </td>
 <td>
  <form action="{{ route ('routeallocation.destroy',$routes->route_id ) }}" method="POST"> {{ method_field('DELETE') }}  {{ csrf_field() }}
@if($routes->user_id==0)
  <a href="{{ route('routeallocation.edit',$routes->route_id ) }}" class="btn btn-success">
                            Not allocated
                                        </a>
@else                 <a href="{{ route('routeallocation.show',$routes->route_id ) }}" class="btn btn-primary" >
                                            <i class="fa fa-pencil"></i>
                                        </a>


 <button type='submit' Onclick="return clickAlert()" class="btn btn-danger"> <i class="ft-trash-2"></i><i class="icon-cross"></i></button>
</form>

                                        @endif

    


  

                
                    

                  </td>

<script type="text/javascript">
    
 function order_change{{$routes->route_id }}()
 {
   var id = document.getElementById('order{{$routes->route_id }}').value;
   var id1 = document.getElementById('order_id{{$routes->route_id }}').value;
   

  var xhr = new XMLHttpRequest();


  xhr.open('GET', `/get-order/${id}/${id1}`, true)


  xhr.onload = function()
  {
    if(this.status == 200)
    {
     window.location.reload();
    }
  }


xhr.send();

 }


</script>  

                </tr>


                 <div class="modal fade text-left" id="large{{$routes->route_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                          aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel1">Store</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>



        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-content">
                <div class="card-body">

                  <div class="row">
                    <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                      <div class="pb-1 text-center">
                      <p class="text-muted">Shop_ID
                         
                        </p>
                      </div>                    
                    </div>
                    <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                      <div class="pb-1 text-center">
                      <p class="text-muted">Shop_Name
                          
                        </p>
                      </div>  
                    </div>


                    <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                       <div class="pb-1 text-center">
                      <p class="text-muted">Shop_Phone
                         
                        </p>
                      </div>  
                    </div>

                    <div class="col-lg-3 col-sm-12 text-center">
                      <div class="pb-1 text-center">
                      <p class="text-muted">Action
                        
                        </p>
                      </div>  
                    </div>
                  </div>


                  @foreach($routes->stores_route as $value )

                   <div class="row">
                    <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                      <div class="pb-1 text-center">
                      <p class="text-muted">{{ $value->store_id }}
                         
                        </p>
                      </div>                    
                    </div>
                    <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                      <div class="pb-1 text-center">
                      <p class="text-muted">{{  $value->store_name }}
                          
                        </p>
                      </div>  
                    </div>


                    <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                       <div class="pb-1 text-center">
                      <p class="text-muted">{{$value->store_phone}}
                         
                        </p>
                      </div>  
                    </div>

                    <div class="col-lg-3 col-sm-12 text-center">
                      <div class="pb-1 text-center">
                      <p class="text-muted">

                       <a href="{{  url('storeallocation/delete',$value->store_id )  }}" class="btn btn-primary" >
                                           <i class="ft-trash-2"></i>
   
                                        </a>
                        
                        </p>
                      </div>  
                    </div>
                  </div>



                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>




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
        </section>

<script>
  function clickAlert() {
   var result = confirm("Are you sure want to delete");
    if(result ) 
    { 
     return true;
    } 
   else
   {
    return false;
   }
}
</script>




     
@endsection