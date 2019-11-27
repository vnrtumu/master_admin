{{-- @extends('multiauth::layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register New {{ ucfirst(config('multiauth.prefix')) }}</div>
                <div class="card-body">
    @include('multiauth::message')
                    <form method="POST" action="{{ route('admin.register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                                    required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                    required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' text-danger' : '' }} row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role_id" class="col-md-4 col-form-label text-md-right">Assign Role</label>

                            <div class="col-md-6">
                                <select name="role_id[]" id="role_id" class="form-control {{ $errors->has('role_id') ? ' is-invalid' : '' }}" multiple>
                                    <option selected disabled>Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    Register
                                </button>

                                <a href="{{ route('admin.show') }}" class="btn btn-danger btn-sm float-right">
                                    Back
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('multiauth::layouts.master')

@section('breadcrum')
    Register New Admin
@endsection

@section('main-content')
    	<!-- Main content -->
		<div class="content-wrapper">
                <!-- Content area -->
                <div class="content">

                    <!-- Form inputs -->
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Register New  {{ ucfirst(config('multiauth.prefix')) }}</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            {{-- <p class="mb-4">Examples of standard form controls supported in an example form layout. Individual form controls automatically receive some global styling. All textual <code>&lt;input></code>, <code>&lt;textarea></code>, and <code>&lt;select></code> elements with <code>.form-control</code> are set to <code>width: 100%;</code> by default. Wrap labels and controls in <code>.form-group</code> for optimum spacing. Labels in horizontal form require <code>.col-form-label</code> class.</p> --}}
                            @include('multiauth::message')
                            <form method="POST" action="{{ route('admin.register') }}">
                                @csrf
                                <fieldset class="mb-3">
                                    {{-- <legend class="text-uppercase font-size-sm font-weight-bold">Color options</legend> --}}
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Admin Name</label>
                                        <div class="col-lg-10">
                                            <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                                            required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                                        <label class="col-form-label col-lg-2">Admin Email</label>
                                        <div class="col-lg-10">
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' text-danger' : '' }} row">
                                        <label class="col-form-label col-lg-2">Password</label>
                                        <div class="col-lg-10">
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Confirm Password</label>
                                        <div class="col-lg-10">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>

								    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Assign Role</label>
                                        <div class="col-lg-10">
                                            <select name="role_id[]" id="role_id" class="form-control {{ $errors->has('role_id') ? ' is-invalid' : '' }} multiselect" multiple="multiple" data-fouc>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="row d-flex justify-content-between">
                                    <div class="text-left">
                                        <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                                    </div>
                                    <div class="text-right">
                                        <a href="{{ route('admin.show') }}" class="btn btn-dark">Back <i class="icon-backward2 ml-2 "></i></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form inputs -->

                </div>
                <!-- /content area -->
                <!-- Footer -->
             <div class="navbar navbar-expand-lg navbar-light">
                <div class="text-center d-lg-none w-100">
                    <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                        <i class="icon-unfold mr-2"></i>
                        Footer
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbar-footer">
                    <span class="navbar-text">
                        &copy; {{ date('Y') }}. <a href="#">Biriyani Bucket</a> by <a href="" target="_blank">SS Unisoft</a>
                    </span>
                </div>
            </div>
            <!-- /footer -->
            </div>
            <!-- /main content -->
@endsection


