@extends('admin.layout.app')
 

@section('main-content')
 <?php $page=12;?> 


 <section id="dom">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">{{ $route->route_name}} {{$date}}-{{$amount}}</h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements" style="top:11px;">
                    <ul class="list-inline mb-0">
                     <li> 
                       

            <a href="{{route('expanse.index')}}"   class="btn btn-info ">
<i class="icon-plus mr-1"></i>
            Back</a>

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
                  <h4 class="card-title">Daily Report</h4>


                     

                 
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
                <th>Employee name</th>
          
               <th>Category</th>
               <th>Amount</th>
                
            
                </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
         @foreach($expanses as $expanses1)
                
                
                <tr>

                <td>{{ $i }}
         <?php $i++;?>
                </td>
                <td>{{$expanses1->employee}}</td>

    
          <td> <a href=""> {{$expanses1->category}}  </a></td>
         

 <td>{{$expanses1->amount}}</td>  



    
                 
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



