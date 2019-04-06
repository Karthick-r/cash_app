




<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
@include('admin.layout.head')

<!--bg-full-screen-image---->
<body class="vertical-layout vertical-menu 1-column   menu-expanded blank-page blank-page"
 data-open="click" data-menu="vertical-menu" data-col="1-column">
  

  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <img src="{{asset('logos/fav.png') }}" width='190px' alt="branding logo">
                  </div>
                
                </div>
                <div class="card-content">
                 
                  <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
                    <span> Using Account Details</span>
                  </p>
                  <div class="card-body">
                    <form class="form-horizontal" action="{{ route('login')}}" method="post" novalidate>
                     {{ csrf_field() }} 
                      <fieldset class="form-group position-relative has-icon-left {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="text" name="email" class="form-control" id="user-name"  value="{{ old('email') }}" placeholder="Your Username"
                        required>
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>

                         @if ($errors->has('email'))
                                    <span class="error-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" name="password" class="form-control" id="user-password" placeholder="Enter Password"
                        required>
                        <div class="form-control-position">
                          <i class="fa fa-key"></i>
                        </div>
                         @if ($errors->has('password'))
                                    <span class="error-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                      </fieldset>
                      <div class="form-group row">
                        <div class="col-md-6 col-12 text-center text-sm-left">
                          <fieldset>
                            <input type="checkbox" id="remember-me" class="chk-remember">
                            <label for="remember-me"> Remember Me</label>
                          </fieldset>
                        </div>
                        <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="{{ route('password.request') }}" class="card-link">Forgot Password?</a></div>
                      </div>
                      <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> Login</button>
                    </form>
                  </div>
                
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

@include('admin.layout.script')
</body>
</html>
