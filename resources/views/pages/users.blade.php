@extends('app')


@section('content')
    <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">All Users</h1>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
          <!-- Simple Tables -->
          <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Simple Tables</h6>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Role</th>
                    <th>City</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($users) > 0)
                        @foreach ($users as $user)
                            <tr>
                                <td><a href="#">{{$user->id}}</a></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{!! $user->status == 1 ? '<span class="badge badge-success">Activated</span>' : '<span class="badge badge-danger">Deactivated</span>' !!}</td>
                                <td>{{ $user->roles->role_name }}</td>
                                <td>{{ $user->cities != null ? $user->cities->city_name : 'NAN'}}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
              </table>
            </div>
            <div class="card-footer"></div>
          </div>
        </div>
      </div>
    
  </div>
  <!---Container Fluid-->
@endsection

