

@extends('multiauth::layouts.master')
@section('breadcrum')
    Edit details of {{$admin->name}}
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
                            <form action="{{route('admin.update',[$admin->id])}}" method="post">
                                @csrf @method('patch')
                                <fieldset class="mb-3">
                                    {{-- <legend class="text-uppercase font-size-sm font-weight-bold">Color options</legend> --}}
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Admin Name</label>
                                        <div class="col-lg-10">
                                            <input type="text" value="{{ $admin->name }}" name="name" class="form-control" id="name">
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                                        <label class="col-form-label col-lg-2">Admin Email</label>
                                        <div class="col-lg-10">
                                            <input type="text" value="{{ $admin->email }}" name="email" class="form-control" id="role">
                                        </div>
                                    </div>

								    <div class="form-group row">
                                        <label for="role_id" class="col-form-label col-lg-2">Assign Role</label>
                                        <div class="col-lg-10">
                                            <select name="role_id[]" id="role_id" class="form-control {{ $errors->has('role_id') ? ' is-invalid' : '' }} multiselect" multiple>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}"
                                                        @if (in_array($role->id,$admin->roles->pluck('id')->toArray()))
                                                            selected
                                                        @endif >{{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('role_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('role_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Activate</label>
                                        <div class="col-lg-10">
                                            <input type="checkbox" value="1" {{ $admin->active ? 'checked':'' }} class="form-check-input-styled-primary" name="activation" id="active" checked data-fouc>
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

