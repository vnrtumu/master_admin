{{-- @extends('multiauth::layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit this Role</div>

                <div class="card-body">
                    <form action="{{ route('admin.role.update', $role->id) }}" method="post">
                        @csrf @method('patch')
                        <div class="form-group">
                            <label for="role">Role Name</label>
                            <input type="text" value="{{ $role->name }}" name="name" class="form-control" id="role">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Change</button>
                        <a href="{{ route('admin.roles') }}" class="btn btn-danger btn-sm float-right">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}



@extends('multiauth::layouts.master')

@section('breadcrum')
    Edit {{ $role->name }}
@endsection

@section('main-content')
    <!-- Main content -->
	<div class="content-wrapper">
                <!-- Content area -->
                <div class="content">

                    <!-- Form inputs -->
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Edit {{ $role->name }}</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                </div>
                            </div>
                        </div>
                        @include('multiauth::message')
                        <div class="card-body">
                            <form action="{{ route('admin.role.update', $role->id) }}" method="post">
                                @csrf @method('patch')
                                <fieldset class="mb-3">
                                    {{-- <legend class="text-uppercase font-size-sm font-weight-bold">Field options</legend> --}}
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">New Role</label>
                                        <div class="col-md-10">
                                            <input type="text"value="{{ $role->name }}" name="name" class="form-control rounded-round" id="role" required>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="row d-flex justify-content-between">
                                    <div class="text-left">
                                        <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                                    </div>
                                    <div class="text-right">
                                        <a href="{{ route('admin.roles') }}" class="btn btn-dark">Back <i class="icon-backward2 ml-2 "></i></a>
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


