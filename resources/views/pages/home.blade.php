@extends('app')


@section('content')
    <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="text-center">
      <form action="/update" id="myForm" method="POST" enctype="multipart/form-data"> 
        @csrf

        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" id="fname" name="name" value="{{$user->name}}" placeholder="Enter Name">
          @error('name')
          <span class="text-danger">{{$message}}</span>
          @enderror
          <div id="fnameError" class="text-danger errobox">
            
          </div>
        </div>
        

        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" aria-describedby="emailHelp"
            placeholder="Enter Email Address">
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div id="emailError" class="text-danger errobox">
            
            </div>
        </div>
        

        <div class="form-group">
          <label>Phone</label>
          <input type="number" class="form-control" id="phone" name="phone" value="{{$user->phone}}" aria-describedby="emailHelp"
            placeholder="Enter Phone">
            @error('phone')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div id="phoneError" class="text-danger errobox">
            
            </div>
        </div>

      <div class="ml-1 d-flex">
        <img src="{{asset('storage/profile/' . $user->photo)}}" width="100px" alt="sdsd">
      </div>

        <div class="form-group" style="width:300px">
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
          <textarea class="form-control" id="address" name="address" rows="3">{{$user->address}}</textarea>
          @error('address')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div id="phoneError" class="text-danger errobox">
            
            </div>
        </div>

        <div class="form-group">
          <label>Post Code</label>
          <input type="number" class="form-control" id="post_code" name="post_code" value="{{$user->post_code}}" aria-describedby="emailHelp"
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
          <button type="submit" class="btn btn-primary btn-block">Update</button>
        </div>

      </form>
    </div>
  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script type="text/javascript">

    let state = document.getElementById('state');
    let city = document.getElementById('city');

    let user = @json($user);
    let cities = @json($cities);
    console.log(user);

    cities.forEach(function(e){
      if(e.id == user.city_id){
        state.value = e.city_state;
        stateChange(e.city_state);

      }else{
        return;
      }
    })

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
          cities.forEach(function(ele){
          if(ele.id == user.city_id){
            city.value = ele.id;
            $('city').prop('selectedIndex', 3);
          }
        })
        },
      })
    }

    </script>

  <!---Container Fluid-->
@endsection

