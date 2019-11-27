{{-- @extends('multiauth::layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ ucfirst(config('multiauth.prefix')) }} List
                    <span class="float-right">
                        <a href="{{route('admin.register')}}" class="btn btn-sm btn-success">New {{ ucfirst(config('multiauth.prefix')) }}</a>
                    </span>
                </div>
                <div class="card-body">
    @include('multiauth::message')
                    <ul class="list-group">
                        @foreach ($admins as $admin)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $admin->name }}
                            <span class="badge">
                                    @foreach ($admin->roles as $role)
                                        <span class="badge-warning badge-pill ml-2">
                                            {{ $role->name }}
                                        </span> @endforeach
                            </span>
                            {{ $admin->active? 'Active' : 'Inactive' }}
                            <div class="float-right">
                                <a href="#" class="btn btn-sm btn-secondary mr-3" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit();">Delete</a>
                                <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.delete',[$admin->id]) }}" method="POST" style="display: none;">
                                    @csrf @method('delete')
                                </form>

                                <a href="{{route('admin.edit',[$admin->id])}}" class="btn btn-sm btn-primary mr-3">Edit</a>
                            </div>
                        </li>
                        @endforeach @if($admins->count()==0)
                        <p>No {{ config('multiauth.prefix') }} created Yet, only super {{ config('multiauth.prefix') }} is available.</p>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('multiauth::layouts.master')

@section('breadcrum')
    Roles
@endsection

@section('main-content')
    <!-- Main content -->
	<div class="content-wrapper">
        <!-- Content area -->
        <div class="content">
            <!-- Basic responsive configuration -->
            <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Roles Tables</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="btn btn-primary" href="{{ route('admin.register') }}">Add New Admin</a>
                                </div>
                            </div>
                        </div>
                        @include('multiauth::message')
                        <div class="card-body">
                            The <b>Admins</b> will have the responsibility of the Admins.
                        </div>
                        <table class="table datatable-responsive">
                            <thead>
                                <tr>
                                    <th>Admin Name</th>
                                    <th>Admin Email</th>
                                    <th>Roles</th>
                                    <th>Created</th>
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                <tr>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>
                                        <span class="badge">
                                            @foreach ($admin->roles as $role)
                                            <span class="badge-info badge-pill ml-2">
                                                {{ $role->name }}
                                            </span>
                                             @endforeach
                                        </span>
                                    </td>
                                    <td>{{ $admin->created_at }}</td>
                                    <td><span class="badge {{ $admin->active? 'badge-success' : 'badge-danger' }}">{{ $admin->active? 'Active' : 'Inactive' }}</span></td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit();"><i class="icon-bin mr-3 icon"></i>Delete</a>
                                                    <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.delete',[$admin->id]) }}" method="POST" style="display: none;">
                                                        @csrf @method('delete')
                                                    </form>
                                                    <a href="{{route('admin.edit',[$admin->id])}}" class="dropdown-item"><i class="icon-pencil5 mr-3 icon"></i>Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                </div>
                <!-- /basic responsive configuration -->
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



