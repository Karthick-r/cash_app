@extends('admin.layout.app')
 @section('header-content')
    <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Cash_app</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a>
                </li>
                <li class="breadcrumb-item active">Expansive Category
                </li>
              
              </ol>
            </div>
          </div>
        </div>

        <div class="content-header-right col-md-4 col-12">
          <div class="btn-group float-md-right">
            
            <a  href="{{route('expensive_category.index')}}" class="btn btn-info "  
            aria-haspopup="true" aria-expanded="false"><i class="fa fa-backward"> </i>Back</a>
       
          </div>
        </div>
        @stop
@section('main-content')
     

   <?php $page=4;?>                

                  
            
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="horz-layout-colored-controls"></h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collpase show">
                  <div class="card-body">
                  
                 <form class="form form-horizontal" action="{{ route('expensive_category.store') }}" method="post" 
                    enctype="multipart/form-data">
        


                 {{ csrf_field() }}
                
                      
                        <div class="row">


                   

                          <div class="col-md-6 offset-md-3">
                          <div class="">
                           <h4 style="text-align:center"> Add New Expense categories</h4>
                           </div>.
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput1">Expansive category</label>
                              <div class="col-md-9">
                                <input type="text" id="eventRegInput1" class="form-control" placeholder="Expansive Category Name"  name="name" value="{{ old('name') }}">
                             

                                       @if ($errors->has('name'))
                           <span class="help-block">
                               <strong>{{ $errors->first('name') }}</strong>
                           </span>
                       @endif
                              </div>
                            </div>
                          </div>
                         

                     
                  



                      </div>

                      <div class="row" style="text-align:right">
                        <div class="col-md-6 offset-md-3 ">
                        <button type="reset" class="btn btn-warning mr-1">
                          <i class="ft-x"></i> Reset
                        </button>
                        <button type="submit" class="btn btn-primary">
                          <i class="fa fa-check-square-o"></i> Save
                        </button>
                      </div>
                      </div>


                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection






