@extends('admin.layout.app')
 @section('header-content')
    <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Cash App</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a>
                </li>
                <li class="breadcrumb-item active">Store
                </li>
              
              </ol>
            </div>
          </div>
        </div>

        <div class="content-header-right col-md-4 col-12">
          <div class="btn-group float-md-right">
            
       
            <a href="{{route('store.index')}}"   class="btn btn-info ">
<i class="icon-plus mr-1"></i>
            Back</a>
       
          </div>
        </div>
        @stop
@section('main-content')
 <?php $page=2;?>
     
  <section id="horizontal-form-layouts">      
      




<div class="row justify-content-md-center">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="basic-layout-card-center">Add New Store</h4>
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
                <div class="card-content collapse show">
                  <div class="card-body">
                    <div class="card-text">
                
                    </div>
               <form action="{{ route('store.store') }}" method="post" >
                     {{ csrf_field() }}
                     

                      <div class="form-body">
                      
               <div class="form-group col-12 mb-2{{ $errors->has('name') ? ' has-error' : '' }}">
                   <label for="eventRegInput2"> Store Name</label>

                   
                       <input id="fname" type="text" class="form-control" name="name" value="{{ old('name') }}"
                        placeholder="Enter Store Name">

                       @if ($errors->has('name'))
                           <span class="help-block">
                               <strong>{{ $errors->first('name') }}</strong>
                           </span>
                       @endif
          
                        </div>
                          <div class="form-group col-12 mb-2{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="password-confirm">Phone Number *</label>
               
                <input type="text" value="<?php echo old("phone");?>"  id="phone" name="phone" class="form-control" placeholder="Enter Phone Number">
                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
            </div>
                      
               <div class="form-group col-12 mb-2{{ $errors->has('address') ? ' has-error' : '' }}">
                   <label for="address" >Address</label>

                       <textarea class="form-control" name="address" value="{{ old('address') }}"  placeholder="Enter address" rows="5">{{ old('address') }}</textarea>  

                       @if ($errors->has('address'))
                           <span class="help-block">
                               <strong>{{ $errors->first('address') }}</strong>
                           </span>
                       @endif
                   </div>



<div class="form-group col-12 mb-2">
<a class="btn btn-success"onclick="myFunction()">Add First Reading</a>
                   
                   </div>


<div id="myDIV">

   <div class="form-group col-12 mb-2">
                   <label for="address" >Water Reading</label>

                       <input type="number" id="userinput1" class="form-control " placeholder="Water Reading" name="waterreading">

                      
                   </div>

                      <div class="form-group col-12 mb-2">
                   <label for="address" >Bottle Reading</label>

                     <input type="number" id="userinput1" class="form-control "   placeholder="Bottle Reading" name="bottlereading"> 

                     
                   </div>

              
          
    
         

</div>

<script>
var y = document.getElementById("myDIV");
y.style.display = "none";
function myFunction() 
{
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") 
    {
        x.style.display = "block";
    } 
    else 
    {
        x.style.display = "none";
    }
}
</script>
                      
                    
                      </div>
                      <div class="form-actions center">
                        <button type="reset" class="btn btn-warning mr-1">
                          <i class="ft-x"></i>Reset
                        </button>
                        <button type="submit" class="btn btn-primary">
                          <i class="fa fa-check-square-o"></i>Save
                        </button>
                      </div>
                    </form>


                  </div>
                </div>
              </div>
            </div>
          </div>


        </section>
            
@endsection
