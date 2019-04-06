@extends('admin.layout.app')
 

@section('main-content')

<?php $page=6;?>  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <form action="{{ route('storeallocation.store') }}" method="post" >

 {{ csrf_field() }}
     
     <section id="dom">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Store Allocation</h4>



                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                    <li>
                       <select  name="action" class="form-control" >
                                <option value="">Select Route</option>
                                @foreach($route as $route)
                                <option value="{{$route->route_id}}" >{{$route->route_name}}</option>
                         
                                 @endforeach
                               </select>

                     

                    </li>
                   
                 <li> <input type="submit" value="Save" class="btn btn-info "></li>
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                   
                    </ul>
                     @if ($errors->has('action'))
                           <span class="help-block">
                               <strong>{{ $errors->first('action') }}</strong>
                           </span>
                      @endif
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    
            


  @if ($errors->has('checked_id'))
                           <span class="help-block">
                               <strong>{{ $errors->first('checked_id') }}</strong>
                           </span>
                       @endif
                 <table  class="table table-striped table-bordered zero-configuration">
                <thead>
                <tr>
                <th><input type="checkbox" id="select_all" value=""/></th>  
                <th>#</th>
                
                  <th>Store Name</th>       
                  <th>Route Name</th>
                 
                
                  <th>Action</th>
            
      
                </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
                @foreach($store as $stores)
                <tr>
                  <td ><input type="checkbox" name="checked_id[]" class="checkbox" value="{{$stores->store_id}}"/></td> 
                <td>{{ $i }}
         <?php $i++;?>
                </td>
                  
                  <td>{{$stores->store_name}}</td>
              
                  <td>
                  @if($stores->route_id!=0)
                    {{$stores->route_store->route_name}}
                  @else
<a href="{{ route('storeallocation.edit',$stores->store_id ) }}" class="btn btn-success">
                            Not allocated
                                        </a>
                  @endif</td>
              
                 
                  <td>

  @if($stores->route_id==0)
  <a href="{{ route('storeallocation.edit',$stores->store_id ) }}" class="btn btn-success">
                            Not allocated
                                        </a>
                                        @else

    <a href="{{ route('storeallocation.show',$stores->store_id ) }}" class="btn  btn-primary">
                            <i class="fa fa-pencil"></i>
                                        </a>



   <a href="{{ url('storeallocation/delete',$stores->store_id ) }}" Onclick="return clickAlert()" class="btn btn-danger">
                            <i class="ft-trash-2"></i><i class="icon-cross"></i>
                                        </a>


 
                                        @endif


                 
                    

                  </td>

                 
                </tr>
                 @endforeach
              
              
                </tbody>
              
              </table>
              </form>  
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
 <script>
    $(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
  
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
    </script>

     
@endsection