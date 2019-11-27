<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} {{ ucfirst(config('multiauth.prefix')) }}</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset('global_assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/imgareaselect.css') }}">
    <!-- /global stylesheets -->

</head>

<body>

		<!-- Main navbar -->
        <div class="navbar navbar-expand-md navbar-dark">
            <div class="navbar-brand">
                <a href="{{ route('admin.home') }}" class="d-inline-block">
                    <img src="{{ asset('global_assets/images/logo_light.png') }}" alt="">
                </a>
            </div>
            <div class="d-md-none">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                    <i class="icon-tree5"></i>
                </button>
                <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                    <i class="icon-paragraph-justify3"></i>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                            <i class="icon-paragraph-justify3"></i>
                        </a>
                    </li>
                </ul>
                <span class="navbar-text ml-md-3 mr-md-auto">
                    <span class="badge bg-success">Online</span>
                </span>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown dropdown-user">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif

                        @else
                        <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                            @if (!empty(Auth::user()->profile))
                                <img src="{{ asset('images/profiles/'.Auth::user()->profile ) }}"  class="rounded-circle" alt="">
                            @else
                                <img src="{{ asset('images/avatar.png') }}" class="rounded-circle" alt="" >
                            @endif

                            <span>{{ Auth::user()->name }} </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            @if (!empty(Auth::user()->profile))
                            <a href="" class="dropdown-item"><i class="icon-user-plus"></i> Edit Profile</a>
                            @else
                            <a href="" class="dropdown-item"><i class="icon-user-plus"></i> Add Profile</a>
                            @endif

                            <div class="dropdown-divider"></div>
                            <a href="" class="dropdown-item"><i class="icon-cog5"></i> View Profile</a>

                            <a href="#" class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-switch2"></i> {{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        @endguest
                    </li>
                </ul>
            </div>
        </div>
        <!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">
            <!-- Sidebar mobile toggler -->
            <div class="sidebar-mobile-toggler text-center">
                <a href="#" class="sidebar-mobile-main-toggle">
                    <i class="icon-arrow-left8"></i>
                </a>
                Navigation
                <a href="#" class="sidebar-mobile-expand">
                    <i class="icon-screen-full"></i>
                    <i class="icon-screen-normal"></i>
                </a>
            </div>
            <!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
                <div class="sidebar-user">
                    <div class="card-body">
                        <div class="media">
                            <div class="mr-3">
                                <a href="#">
                                    @if (!empty(Auth::user()->profile))
                                        <img src="{{ asset('images/profiles/'.Auth::user()->profile ) }}" width="38" height="38" class="rounded-circle" alt="">
                                    @else
                                        <img id="preview" src="{{ asset('images/avatar.png') }}" class="rounded-circle" alt="" width="38" height="38">
                                    @endif
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="media-title font-weight-semibold">{{ Auth::user()->name }}</div>
                                <div class="font-size-xs opacity-50">
                                    @if (!empty(Auth::user()->city))
                                        <i class="icon-pin font-size-sm"></i> &nbsp;{{ Auth::user()->city }}
                                    @else
                                    <i class="icon-pin font-size-sm"></i> &nbsp; Sample Location
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
						<li class="nav-item">
							<a href="{{ route('admin.home') }}" class="nav-link active">
								<i class="icon-home4"></i>
								<span>
									Dashboard
								</span>
							</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.roles') }}" class="nav-link"><i class="icon-user-lock"></i> <span>Admin Roles</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.show') }}" class="nav-link"><i class="icon-user-plus"></i> <span>Admins</span></a>
                        </li>
                        {{-- <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-stack"></i><span>Blog posts</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="JSON forms">
                                <li class="nav-item"><a href="{{ route('admin.post') }}" class="nav-link">Blog Posts Grid View</a></li>
                                <li class="nav-item"><a href="{{ route('admin.post.bloglist') }}" class="nav-link">Blog Posts List View</a></li>
                                <li class="nav-item"><a href="{{ route('admin.post.create') }}" class="nav-link">Create New Blog Post</a></li>
                            </ul>
                        </li> --}}
						{{-- <li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-stack"></i> <span>Blog Essentials</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Starter kit">
								<li class="nav-item nav-item-submenu">
									<a href="#" class="nav-link">Category</a>
									<ul class="nav nav-group-sub">
										<li class="nav-item"><a href="{{ route('admin.category') }}" class="nav-link">All Categories</a></li>
										<li class="nav-item"><a href="{{ route('admin.category.create') }}" class="nav-link">Create New category</a></li>
									</ul>
								</li>
								<li class="nav-item nav-item-submenu">
									<a href="#" class="nav-link">Sub Category</a>
									<ul class="nav nav-group-sub">
										<li class="nav-item"><a href="{{ route('admin.sub_category') }}" class="nav-link">All Sub Categories</a></li>
										<li class="nav-item"><a href="{{ route('admin.sub_category.create') }}" class="nav-link">Add New Sub Category</a></li>
									</ul>
								</li>
								<li class="nav-item nav-item-submenu">
									<a href="#" class="nav-link">Tags</a>
									<ul class="nav nav-group-sub">
										<li class="nav-item"><a href="{{ route('admin.tag') }}" class="nav-link">All Tags</a></li>
										<li class="nav-item"><a href="{{ route('admin.tag.create') }}" class="nav-link">Create New Tag</a></li>
									</ul>
                                </li>
							</ul>
						</li> --}}




					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->

		</div>
		<!-- /main sidebar -->

        @section('main-content')

        @show

	</div>
    <!-- /page content -->



    <!-- Core JS files -->
	<script src="{{ asset('global_assets/js/main/jquery.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ asset('global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>

	<script src="{{ asset('assets/js/app.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_pages/dashboard.js') }}"></script>
    <!-- /theme JS files -->

	<!-- Theme JS files -->
	<script src="{{ asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/tables/datatables/extensions/responsive.min.js')}}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>

    <script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_pages/form_inputs.js') }}"></script>


	<script src="{{ asset('global_assets/js/demo_pages/datatables_responsive.js') }}"></script>
    <!-- /theme JS files -->

    <script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/forms/styling/switch.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/form_checkboxes_radios.js') }}"></script>

    <!-- Theme JS files -->
	<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/notifications/pnotify.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/form_multiselect.js') }}"></script>


    <script src="{{ asset('global_assets/js/plugins/editors/ckeditor/ckeditor.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>


    <script src="{{ asset('js/jquery.imgareaselect.min.js') }}"></script>

    @section('scripts')

    @show



</body>
</html>
