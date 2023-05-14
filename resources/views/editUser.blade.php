@extends('layouts.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Update password</div>

            <div class="card-body">
                @if(session('msg'))
                    <div class="alert alert-success my-2">
                        {{ session('msg') }}
                    </div>
                @endif
                <form method="POST" action="{{route('user.updatePass')}}">
                    @csrf
                    <div class="md-3 mb-2">
                        <label for="password" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="password" name="current_password" autocomplete="off">

                        @if (isset($errors) && $errors->has('current_password'))
                            <div class="alert alert-danger mt-1">
                                {{ $errors->first('current_password') }}
                            </div>
                        @endif
                    </div>

                    <div class="md-3 mb-2">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="password" name="new_password" autocomplete="off">

                        @if (isset($errors) && $errors->has('new_password'))
                            <div class="alert alert-danger mt-1">
                                {{ $errors->first('new_password') }}
                            </div>
                        @endif
                    </div>

                    <div class="md-3 mb-2">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="cpassword" name="new_password_confirmation" autocomplete="off">

                        @if (isset($errors) && $errors->has('new_password_confirmation'))
                            <div class="alert alert-danger mt-1">
                                {{ $errors->first('new_password_confirmation') }}
                            </div>
                        @endif
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        <input type="submit" name="action" value="Change" class="btn btn-primary" />
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
@endsection