@extends('dashboard.layouts.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <a href="{{route('user.create')}}" type="button" class="btn btn-warning pull-left"><i class="fa fa-plus my-auto" style="font-size: 0.9rem;"></i> Add User</a>
        </div>
    </div>
      <div class="row">
         <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Users</h4>
                <p class="card-category"> All Users</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    @if(Session::has('delete_user'))
                    <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                      </button>
                      <span>
                        {{Session::get('delete_user')}}
                      </span>
                    </div>
                    @endif
                    @if(Session::has('create_user'))
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <i class="material-icons">close</i>
                        </button>
                      <span>
                         {{Session::get('create_user')}}
                      </span>
                      </div>
                    @endif
                    @if(Session::has('edit_user'))
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <i class="material-icons">close</i>
                        </button>
                      <span>
                         {{Session::get('edit_user')}}
                      </span>
                      </div>
                    @endif
                    <thead class="text-primary">
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            @if ($user->roles == 1)
                            <td>Admin</td>
                            @elseif ($user->roles == 2)
                            <td>User</td>
                            @endif
                            <td class="td-actions">
                              <a href="{{route('user.edit',$user->id)}}" type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit User">
                                <i class="material-icons">edit</i>
                              </a>
                              <a href="{{route('user.delete',$user->id)}}" type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove User">
                                <i class="material-icons">close</i>
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
    </div>
  </div>

  @endsection