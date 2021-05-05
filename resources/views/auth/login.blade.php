@extends('Frontend.layouts.app')


@section('content')


    <section class="bg-section">
        <div class="container">
            <div class="row justify-content-center  mt-4">
                <div class="col-lg-5 col-md-6">
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-5 col-md-6 mt-4 mt-md-0">
                    <div class="form-sec">
                        @if (session()->has('message'))
                            <span class="error_color" style="color: #ff2714;">{{session()->get('message')}}</span>
                        @endif
                        <form action="{{route('login')}}" method="POST"  name="formName"id="form_sample_2" class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email " required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder=" Password " required>
                            </div>
                            <button type="submit" class="sub-btn"> Sign In </button>
                        </form>
                        <a href="{{route('register')}}" class="create-btn mt-4"> Create New Account </a>
                    </div><!-- /.form-sec -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.bg-section -->

    {{Session::forget('user_status')}}
@endsection
