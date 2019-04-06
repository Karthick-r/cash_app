@extends('admin.layout.app')
 

@section('main-content')
      <?php $page=8;?>   
     <section id="dom">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Maintain Reading</h4>

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
                  <th>Name</th>       
                  <th>WaterFirstReading</th>
                  <th>BottleFirstReading</th>    
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
                @foreach($store1 as $stores)
                <tr>
                <td>{{ $i }}
         <?php $i++;?>
                </td>
                <td>{{$stores->store_name}}</td>
              <td>
              <a> {{$stores->water_reading}}  </a>
           
              </td>
            
              <td>            
               <a>{{$stores->bottle_reading}}  </a>
             
              </td>
                 
                  <td>    
      <a href="{{ route('firstreading.edit',$stores->store_id ) }}" class="btn btn-primary" >
      <i class="fa fa-pencil"></i>
      </a>

 <a href="{{ route('firstreading.show',$stores->store_id ) }}"  id="type-success" class="btn btn-success">

Not Start
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


            <!-- Default box -->


     
@endsection