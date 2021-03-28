<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">

   <style>
      .custom-margin {
         margin-top: 20vh;
      }
      /* If you add background image it will look like transparent form*/
       body {
         background-image: url('assets/img/bgimage.jpg');
         background-repeat: no-repeat;
         width: 100%;
         height: 100%;
      }
      a:hover {
  background-color: #FFF;
}
   </style>
   <title>تسجيل الدخول </title>
</head>

<body>
   <div class="container-fluid">
      <div class="row justify-content-center custom-margin">
         <div class="col-sm-6 col-md-4">
            <!-- Add bg-primary in form tag if want form background color-->
            <!--text-white if want text color white-->
            <form class="shadow-lg p-4 text-white" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @csrf
               <div class="form-group" dir="rtl">
                  <i class="fas fa-user"></i>
                  <label for="email" class="pl-2 font-weight-bold text-center" >رقم التعريف الوضنية</label>
                   <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                  <!--Add text-white below if want text color white-->
                  <small class="form-text">
                     @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('email') }}</strong>
                        </span>
                     @endif
                  </small>
               </div>
               <div class="form-group" dir="rtl">
                  <i class="fas fa-key"></i>
                  <label for="pass" class="pl-2 font-weight-bold">الرمز السري</label>
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                  <small class="form-text">
                     @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('password') }}</strong>
                        </span>
                     @endif
                  </small>
               </div>
                  <div class="form-check" dir="rtl">
                     <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember" dir="rtl">
                           {{ __('تذكرني') }}
                        </label>
                        </div>
               <button type="submit" class="btn btn-outline-success mt-3 btn-block shadow-sm font-weight-bold">تسجيل الدخول</button>
                                       <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                          

                                <a class="btn btn-link" href="{{ route('password.request') }}" style="color: #28a745;">
                                    <b>{{ __(' لقد نسيت كلمة المرور') }}</b>
                                </a>
                            </div>
                        </div>
            </form>
         </div>
      </div>
   </div>


   <!-- JQuery Popper Bootstrap -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"></script>
</body>

</html>
