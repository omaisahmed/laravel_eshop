@extends('dashboard.layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Add User</h4>
                            <p class="card-category">Add your user here</p>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>
                                                {{ $error }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('user.create.submit') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 my-3">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Name</label>
                                            <input id="name" type="text"
                                                class="form-control" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-3">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Email</label>
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 my-3">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Password</label>
                                            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-3">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Confirm Password
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 my-3">
                                        <div class="form-group bmd-form-group">
                                            <select name="roles" class="form-control">
                                                <option value="" selected disabled hidden>Role</option>
                                                <option value="1" name="1">Admin</option>
                                                <option value="2" name="2">User</option>                
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
