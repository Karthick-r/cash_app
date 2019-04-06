@extends('admin.layout.app')
 

@section('main-content')
     
   <?php $page=7;?>    
     <section id="dom">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Price</h4>



                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                    @if($price=='')
                     <li><a  href="{{route('price.create')}}" class="btn btn-info " 
            aria-haspopup="true" aria-expanded="false"><i class="icon-plus mr-1"></i>Add</a></li>
            @else
             <li><a  href="{{url('/price1/view')}}" class="btn btn-info " 
            aria-haspopup="true" aria-expanded="false"><i class="icon-plus mr-1"></i>View</a></li>

             @endif
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
                  <th>Price-Bottle</th> 
                  <th>Price-Water</th>                       
                  <th>Action</th>
                
      
                </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
               @if($price!='')
                <tr>
                <td>{{ $i }}
         <?php $i++;?>
                </td>
                  <td>{{$price->bottle_price}}</td>
                  <td>{{$price->water_price}}</td>
              
                
                  <td>


    

    
     <a href="{{ route('price.edit',$price->price_id ) }}" class="btn btn-primary" >
                                            <i class="fa fa-pencil"></i>
                                        </a>

    

                
                    

                  </td>

                 
                </tr>
               @endif
              
              
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

            <!-- Default box -->


     
@endsection