<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Login</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                    @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>    
                    @endif
                    @if (Session::has('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>    
                    @endif
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <div id="message" class="text-danger">
                    
                  </div>
                  <form action="/checkUser" id="myForm" method="POST">
                    @csrf

                    <div class="form-group">
                      <input type="email" class="form-control" id="email" value="{{old('email')}}" name="email" aria-describedby="emailHelp"
                        placeholder="Enter Email Address">
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        
                        @enderror
                        <div id="emailError" class="text-danger errobox">
                        
                        </div>
                    </div>

                    <div class="form-group">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        @error('password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div id="passwordError" class="text-danger errobox">
                        
                        </div>
                    </div>
                    
                    <div class="form-group">
                      {{-- <input type="submit" class="btn btn-primary btn-block" value="Submit"> --}}
                      <button class="btn btn-danger" id="login">Login</button>
                    </div>
                   
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="/register">Create an Account!</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Login Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>

  <script type="text/javascript">

    $(document).ready(function() {
      $('#login').on('click',function(e){
        e.preventDefault();
        // console.log('submitted')
        $('#failed-alert').html('')
        $.ajax({
            url: '/checkUser',  
            type: "POST",
            data:{
                "_token": "{{ csrf_token() }}",
                email: $('#email').val(),
                password: $('#password').val(),
            },
            success:function(response){

                if(response.success){
                    window.location.replace("/");  
                }
              
            },
            error : function(error){
                $('#failed-alert').html(`<div class="alert alert-danger fade show" id="failed-alert" role="alert">
                                            User not Registered.
                                         </div>`);
                let spare = error.responseJSON.errors;
                let errorsboxes = document.querySelectorAll('.errobox');
                
                errorsboxes.forEach(function(element) {
                  element.innerHTML = '';
                });
                console.log(error.responseJSON.fail)
                $('#message').html('');

                if(error.responseJSON.fail){
                $('#message').html(`<div class="alert alert-danger">
                                      ${error.responseJSON.fail}
                                    </div>`);
                }
                                    
                $('#emailError').html(spare.email);
                $('#passwordError').html(spare.password);

            }
        });
    });
    });

  </script>
</body>

</html>