@extends('admin.layout.app')
 

@section('main-content')
    <?php $page=1;?>  
     <section id="dom">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Employee</h4>



                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                   
                   <li>
                   <a  href="{{route('employe.create')}}" class="btn btn-info"  >
                   <i class="icon-plus mr-1"></i>Add

                   </a>

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
                  <th>Name</th>       
                  <th>Phone</th>
                
                  <th>Action</th>
                  <th>Pwd_change</th>
      
                </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
                @foreach($admins as $admin)
                <tr>
                <td>{{ $i }}
         <?php $i++;?>
                </td>
                  <td>{{$admin->name}}</td>
              
                  <td>{{$admin->phone}}</td>
                 
                  <td>


                                         <form action="{{ route ('employe.destroy',$admin->id ) }}}" method="POST">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
<?php
if($admin->status==1)
{?>
  <a href="{{ route('employe.show',$admin->id ) }}" class="btn btn-success">
                            <i class="ft-circle"></i>
                                        </a>
<?php }
else
{?>
    <a href="{{ route('employe.show',$admin->id ) }}" class="btn btn btn-warning">
                            <i class="ft-slash"></i>
                                        </a>
<?php } ?>
    
     <a href="{{ route('employe.edit',$admin->id ) }}" class="btn btn-primary" >
                                            <i class="fa fa-pencil"></i>
                                        </a>

    <button type='submit'  Onclick="return clickAlert()" class="btn btn-danger"> <i class="fa fa-trash"></i></button>
</form>

                  </td>
                  <td>
                     <a href="{{ url('employe/password',$admin->id ) }}" class="btn btn btn-success">
                            Change Password
                                        </a>

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

            <!-- Default box -->


     
@endsection