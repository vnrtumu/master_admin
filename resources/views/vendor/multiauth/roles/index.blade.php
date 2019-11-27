@extends('multiauth::layouts.master')

@section('main-content')
    <!-- Main content -->
	<div class="content-wrapper">
        	<!-- Page header -->
			<div class="page-header page-header-light">
                <div class="page-header-content header-elements-md-inline">
                    <div class="page-title d-flex">
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span> - </h4>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>
                </div>
                <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="{{ route('admin.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <a href="task_manager_detailed.html" class="breadcrumb-item"></a>
                            <span class="breadcrumb-item active"></span>
                        </div>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>
                </div>
            </div>
            <!-- /page header -->
        <!-- Content area -->
        <div class="content">
            <!-- Basic responsive configuration -->
            <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Roles Tables</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="btn btn-primary" href="{{ route('admin.role.create') }}" >Add New Role</a>
                                </div>
                            </div>
                        </div>
                        @include('multiauth::message')
                        <div class="card-body">
                            The <b>Roles</b> will specify the responsibility of the Admins.
                        </div>


                        <table class="table datatable-responsive">
                            <thead>
                                <tr>
                                    <th>S. No</th>
                                    <th>Role</th>
                                    <th>Job</th>
                                    <th>Created</th>
                                    <th>No of Admins</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>1</td>
                                    <td>{{ $role->name }}</td>
                                    <td>Example work</td>
                                    <td>{{ $role->created_at }}</td>
                                    <td><span class="badge badge-success">{{ $role->admins->count() }} {{ ucfirst(config('multiauth.prefix')) }}</span></td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();"><i class="icon-bin mr-3 icon"></i>Delete</a>
                                                    <form id="delete-form-{{ $role->id }}" action="{{ route('admin.role.delete',$role->id) }}" method="POST" style="display: none;">
                                                        @csrf @method('delete')
                                                    </form>
                                                    <a href="{{ route('admin.role.edit',$role->id) }}" class="dropdown-item"><i class="icon-pencil5 mr-3 icon"></i>Edit</a>
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

