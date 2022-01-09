<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Register</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Register Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                   
                 
                  <div id="failed-alert">
                    
                  </div>
                    
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                  </div>
                  <form action="/register" id="myForm" method="POST" enctype="multipart/form-data"> 
                    @csrf

                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" id="fname" name="name" value="{{old('fname')}}" placeholder="Enter Name">
                      @error('name')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                      <div id="fnameError" class="text-danger errobox">
                        
                      </div>
                    </div>
                    

                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" aria-describedby="emailHelp"
                        placeholder="Enter Email Address">
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div id="emailError" class="text-danger errobox">
                        
                        </div>
                    </div>
                    

                    <div class="form-group">
                      <label>Phone</label>
                      <input type="number" class="form-control" id="phone" name="phone" value="{{old('phone')}}" aria-describedby="emailHelp"
                        placeholder="Enter Phone">
                        @error('phone')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div id="phoneError" class="text-danger errobox">
                        
                        </div>
                    </div>

                    <div class="form-group">
                      <label>Photo</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="photo" id="photo">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                      @error('photo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div id="phoneError" class="text-danger errobox">
                        
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="select2Single">Select State</label>
                      <select class="select2-single form-control" onchange="stateChange(this.value)" name="state" id="state">
                        @foreach ($states as $state)
                          <option value="{{$state}}">{{$state}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="select2Single">City</label>
                      <select class="select2-single form-control" name="city_id" id="city">
                          <option value="">select</option>
                      </select>
                      @error('city')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div id="phoneError" class="text-danger errobox">
                        
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="address" >Address</label>
                      <textarea class="form-control"  id="address" name="address" rows="3">{{old('address')}}</textarea>
                      @error('address')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div id="phoneError" class="text-danger errobox">
                        
                        </div>
                    </div>

                    <div class="form-group">
                      <label>Post Code</label>
                      <input type="number" class="form-control" id="post_code" name="post_code" value="{{old('post_code')}}" aria-describedby="emailHelp"
                        placeholder="Enter Post Code">
                        @error('phone')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div id="phoneError" class="text-danger errobox">
                        
                        </div>
                    </div>

                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" id="password" name="password"  placeholder="Password">
                      @error('password')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                      <div id="passwordError" class="text-danger errobox">
                        
                      </div>
                    </div>
                    

                    <div class="form-group">
                      <label>Repeat Password</label>
                      <input type="password" class="form-control" id="cpassword" name="cpassword"  placeholder="Repeat Password">
                      @error('cpassword')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                      <div id="cpasswordError" class="text-danger errobox">
                        
                      </div>
                    </div>
                    

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>

                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="/login">Already have an account?</a>
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

  
  <!-- Register Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>

  <script type="text/javascript">

    let city = document.getElementById('city');

    function stateChange(state){
      // console.log(state)
      city.innerHTML = '<option value="">Loading......</option';
      $.ajax({
        url: '/getCities/' + state,  
        type: "GET",
        success:function(response){
          html = '';
          response.forEach(element => {
            html += `<option value='${element.id}'>${element.city_name}</option>`;
          });
          city.innerHTML = html;
        },
      })
    }

    

    // $('#myForm').on('submit',function(e){
    //     e.preventDefault();
        
    //     $.ajax({
    //         url: '/addUser',  
    //         type: "POST",
    //         data:{
    //             "_token": "{{ csrf_token() }}",
    //             fname: $('#fname').val(),
    //             lname: $('#lname').val(),
    //             email: $('#email').val(),
    //             phone: $('#phone').val(),
    //             password: $('#password').val(),
    //             cpassword: $('#cpassword').val()
    //         },
    //         success:function(response){

    //             if(response.success){
    //                 window.location.replace("/login");  
    //             }
                
    //         },
    //         error : function(error){
    //             $('#failed-alert').html(`<div class="alert alert-danger fade show" id="failed-alert" role="alert">
    //                                         User not Registered.
    //                                      </div>`);
    //             let spare = error.responseJSON.errors;
    //             let errorsboxes = document.querySelectorAll('.errobox');
                
    //             errorsboxes.forEach(function(element) {
    //               element.innerHTML = '';
    //             });

    //             $('#fnameError').html(spare.fname);
    //             $('#lnameError').html(spare.lname);
    //             $('#emailError').html(spare.email);
    //             $('#phoneError').html(spare.phone);
    //             $('#passwordError').html(spare.password);
    //             $('#cpasswordError').html(spare.cpassword);
               
                
    //         }
    //     });
    // });

</script>

</body>

</html>