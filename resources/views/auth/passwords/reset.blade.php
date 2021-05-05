@extends('Frontend.layouts.app')


@section('content')


    <section class="bg-section">
        <div class="container">
            <div class="row justify-content-center  mt-4">
                <div class="col-lg-5 col-md-6">
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-5 col-md-6 mt-4 mt-md-0">
                    <div class="form-sec">
                            <span class="error_color" style="color: #ff2714;">Your Password has been expired, Please reset Password</span>
                            <form method="POST" action="{{ route('admin.edit-password.update', $user->id) }}">
                                @csrf
                                @method('PUT')
                            <div class="form-group">
                                <input id="password" type="password"
                                       class="form-control @error('old_password') is-invalid @enderror"
                                       name="old_password" placeholder="Old Password" required autocomplete="old-password">
                            </div>
                            <div class="form-group">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required placeholder="New Password" autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                            </div>
                            <button type="submit" class="sub-btn"> Change Password </button>
                        </form>
                        <div class="act-sec mt-1">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="">Keep Loged in
                                </label>
                            </div>
                            <div class="forget">
                                {{--                                <a href="{{route('userReset')}}">Forget Password? </a>--}}
                            </div><!-- /.forget -->
                        </div><!-- /.act-sec -->
                        <a href="{{route('register')}}" class="create-btn mt-4"> Create New Account </a>
                    </div><!-- /.form-sec -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.bg-section -->
@endsection
