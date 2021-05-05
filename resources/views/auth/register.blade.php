@extends('Frontend.layouts.app')

@section('content')

    <section class="bg-section">
        <div class="container">
            <div class="row justify-content-center  mt-4">
                <div class="col-lg-5 col-md-6">
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-5 col-md-6 mt-4 mt-md-0">
                    <div class="form-sec">
                        <form action="{{route('register')}}" method="POST" enctype="multipart/form-data" name="formName"id="form_sample_1" class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="user_first_name"  placeholder="First Name " required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"name="user_last_name" placeholder="Last Name " required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="user_username" placeholder="UserName " required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email " required>
                            </div>
                            <div  class="form-group">
                                <input type="password" class="form-control" name="password" placeholder=" Password " required>
                            </div>

                            <div  class="form-group">
                                <input type="password" class="form-control"  placeholder=" Confirm Password " required>
                            </div>

                            <div class="form-group" id="verifyEmailCode">
                                <p id="formMsg" > </p>
                            </div>

                            <button type="submit" onmouseover="" style="cursor: pointer;" class="sub-btn"> Sign Up </button>
                        </form>
                        <p class="hv-ac"> Have an account? <a href="{{route('login')}}"> Login Now </a> </p>
                    </div><!-- /.form-sec -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.bg-section -->

@endsection
