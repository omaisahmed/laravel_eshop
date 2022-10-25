@extends('dashboard.layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Create Coupon</h4>
                            <p class="card-category">Create your coupon here</p>
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
                            <form action="{{ route('coupon.create.submit') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 my-3">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Code</label>
                                            <input type="text" class="form-control" name="code">
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-3">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Discount</label>
                                            <input type="text" class="form-control" name="percent" maxlength="3" max='100'>
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
