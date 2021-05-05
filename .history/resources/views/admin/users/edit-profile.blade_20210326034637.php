@extends('layouts.dashboard')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <h2>Edit User Information</h2>
                    <!-- Horizontal Form -->
                    <div class="card card-pink">
                        <div class="card-header">
                            <h3 class="card-title">Edit Profile</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            @if (session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            @endif
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('admin.edit-profile.update', $user->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="form-group row">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ $user->name }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                               
                                <div class="form-group row">
                                    <label for="phone_number1"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Phone Number 1') }}</label>

                                    <div class="col-md-6">
                                        <input type="number" id="phone_number1" class="form-control" name="phone_number1" 
                                        autocomplete="phone_number1" autofocus value="{{ $user->phone_number }}">

                                        @error('phone_number1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone_number2"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Phone Number 2') }}</label>

                                    <div class="col-md-6">
                                        <input type="number" id="phone_number2" class="form-control" name="phone_number2"
                                            autocomplete="phone_number2" autofocus value="{{ $user->phone_number }}">

                                        @error('phone_number2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="address" class="form-control" name="address"
                                            autocomplete="address" autofocus>{{ $user->address }}</textarea>

                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="paid_at"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Paid At') }}</label>

                                    <div class="col-md-6">
                                        <input type="date" id="paid_at" class="form-control" name="paid_at"
                                            autocomplete="paid_at" autofocus value="{{ $user->paid_at }}">

                                        @error('paid_at')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="paid"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Paid') }}</label>

                                    <div class="col-md-6">
                                        <input type="number" id="paid" class="form-control" name="paid"
                                            autocomplete="paid" autofocus value="{{ $user->paid }}">

                                        @error('paid')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                             
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update Profile') }}
                                        </button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
