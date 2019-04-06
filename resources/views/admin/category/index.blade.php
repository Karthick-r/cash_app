@extends('admin.layout.app')
 

@section('main-content')
<?php $page=4;?> 
     <section id="dom">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Expanse Category</h4>



                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                   <li><a  href="{{route('expensive_category.create')}}" class="btn btn-info " 
            aria-haspopup="true" aria-expanded="false"><i class="icon-plus mr-1"></i>Add</a></li>
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    
                    <table class="table table-striped table-bordered zero-configuration">
                      <thead>
                         <tr>
                            <th>#</th>
                            <th>Categories</th>
                           
                            <th>Status</th> 
                            <th>Edit</th>                         
                            <th>Delete</th>
                            </tr>
                        </thead>
                         <tbody>
                <?php $i=1;?>
                @foreach($categorys as $category)
                <tr>
                  <td>{{ $i }} <?php $i++;?></td>
                  <td>
    
<a href="#" class="text-bold-600">{{$category->categories_name}}</a>

   <p class="text-muted font-small-2"><?php echo $category->categories_description;?></p>

         
                  </td>
                        
                  <td>
                        <?php    if($category->status==1) { ?>
                  <a href="{{ route('expensive_category.show',$category->categories_id ) }}"  id="type-success" class="btn btn-success">

<i class="ft-circle"></i>
                  </a>
                      <?php }  else { ?>
                  <a href="{{ route('expensive_category.show',$category->categories_id ) }}"  id="type-success" class="btn btn btn-warning">


<i class="ft-slash"></i>
                  </a>
                      <?php } ?>
                  </td>
<td>
       <a href="{{ route('expensive_category.edit',$category->categories_id ) }}" 
     class="btn btn-primary" ><i class="icon-pencil2"></i>

<i class="ft-edit"></i>
     </a>

</td>

                  <td>
                      <form action="{{ route ('expensive_category.destroy',$category->categories_id ) }}}" method="POST"> {{ method_field('DELETE') }}  {{ csrf_field() }}
                  
    


    <button type='submit' Onclick="return clickAlert()" class="btn btn-danger"> 

 <i class="ft-trash-2"></i>
    <i class="icon-cross"></i></button>
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

     
<script>
  @if(Session::has('message'))
 
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
</script>
     
              

@endsection






