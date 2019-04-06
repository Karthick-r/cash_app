@extends('admin.layout.app')
 

@section('main-content')
 <?php $page=12;?> 
   

  <section id="dom">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title"> Today Expanse  Amount {{$date}}-{{$expanse}}</h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements" style="top:11px;">
                    <ul class="list-inline mb-0">
                     <li> 
                        <form method="post" action="{{ route('expanse.store') }}">

                          {{ csrf_field() }}


                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <span class="fa fa-calendar-o"></span>
                            </span>
                          </div>
                          <input type='text' class="form-control pickadate" name="date" placeholder="{{$date}}" value="{{$date}}"
                          />

                           <input type="submit" value="Filter"   style="margin-left: 25px" class="btn btn-info">
                        
                        </div>
                       </form>
                      </li>
                      
                    
                    </ul>
                  </div>
                </div>
                </div>
                </div>
                </div>
                </section>


  


     
     <section id="dom">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Daily Report </h4>


                     

                 
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                   
                      <li>
 

                       </li>
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                     
                    
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    
                <div class="table-responsive">
            
                 <table  class="table table-striped table-bordered  dataex-html5-export">
                <thead>

                  <tr>
                <th>#</th>
               <th>Route_Id</th>
               <th>Route_name</th>
               <th>Amount</th>
               <th>Action</th>
                
            
                </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
         @foreach($route as $reading)
                
                
                <tr>

                <td>{{ $i }}
         <?php $i++;?>
                </td>

          <td><a href="" >RI-#{{$reading->route_id}} </a></td>
          <td> <a href=""> {{$reading->route_name}}  </a></td>
         

 <td><a href="">{{ $reading->expan_route->sum('amount')}}</a></td>  


<td>
  

                  
    


                    <form class="form form-horizontal" action="{{ route ('expanse.update', 
                    $reading->route_id) }}" method="post">
            
          <input name="_method" type="hidden" value="PUT">


                 {{ csrf_field() }}

                  <input type="hidden"   name="date1" value="{{$date}}">


    <button type='submit'  class="btn btn-info"> 
 
 <i class="icon-cross"></i> view</button>
</form>

</td>
    
                 
                </tr>
          

 
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



