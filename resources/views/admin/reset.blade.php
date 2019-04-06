
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
@include('admin.layout.head')
<body class="vertical-layout vertical-menu 1-column   menu-expanded blank-page blank-page"
 data-open="click" data-menu="vertical-menu" data-col="1-column">
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                <div class="card-header border-0 pb-0">
                  <div class="card-title text-center">
                    <img src="{{asset('logos/logo.jpeg') }}" width='120px'alt="branding logo">
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>We will send you a link to reset password.</span>
                  </h6>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('admin.password.request') }}"
                        novalidate>  {{ csrf_field() }}
                          <input type="hidden" name="token" value="{{ $token }}">
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="email" class="form-control form-control-lg input-lg" 
                        name="email" value="{{ $email or old('email') }}"id="user-email"
                        placeholder="Your Email Address" required>
                        <div class="form-control-position">
                          <i class="ft-mail"></i>
                        </div>
                        
                      </fieldset>
                       @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                        <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" name="password" class="form-control" id="user-password" placeholder="Enter Password"
                        required>
                        <div class="form-control-position">
                          <i class="fa fa-key"></i>
                        </div>

                      </fieldset>
 @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                        <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" name="password_confirmation" class="form-control" id="user-password" placeholder="Enter Password"
                        required>
                        <div class="form-control-position">
                          <i class="fa fa-key"></i>
                        </div>
                      </fieldset>


                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                      <button type="submit" class="btn btn-outline-info btn-lg btn-block"><i class="ft-unlock"></i>Reset Password</button>
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

