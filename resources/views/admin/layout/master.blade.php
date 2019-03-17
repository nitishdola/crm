<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CRM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('admin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="{{ asset('admin/css/font-awesome.min.css') }}" rel="stylesheet">

	<!-- Pace -->
	<link href="{{ asset('admin/css/pace.css') }}" rel="stylesheet">

	<!-- Color box -->
	<link href="{{ asset('admin/css/colorbox/colorbox.css') }}" rel="stylesheet">

	<!-- Morris -->
	<link href="{{ asset('admin/css/morris.css') }}" rel="stylesheet"/>

  <link href="{{ asset('admin/datepicker-master/dist/datepicker.css') }}" rel="stylesheet"/>

  <link href="{{ asset('admin/datetimepicker-2.5.20/jquery.datetimepicker.css') }}" rel="stylesheet"/>


	<!-- Perfect -->
	<link href="{{ asset('admin/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('admin/css/app-skin.css') }}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.12/css/default/zebra_datepicker.min.css" rel="stylesheet">
  <link href="{{ asset('admin/css/master.css') }}" rel="stylesheet">

  <style>
  span#loading {
    text-align: center;
    margin-top: 40px;
    margin-left: 50px;
    margin-bottom: 40px;
  }
  </style>
  @yield('pageCss')
  <!-- Developed and Designed by : Nitish Dolakasharia, nitish.dola@gmail.com, +91-9706125041 -->
  </head>

  <body class="overflow-hidden">
	<!-- Overlay Div -->
	<div id="overlay" class="transparent"></div>

	<div id="wrapper" class="preload">
		<div id="top-nav" class="fixed skin-6">
			<a href="#" class="brand">
				<span class="text-toggle"> {{ config('app.name') }}: Admin</span>
			</a><!-- /brand -->
			<button type="button" class="navbar-toggle pull-left" id="sidebarToggle">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<button type="button" class="navbar-toggle pull-left hide-menu" id="menuToggle">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<ul class="nav-notification clearfix">
			 <li class="dropdown">
					<a class="dropdown-toggle" href="{{ route('admin.contact.create') }}">
						<i class="fa fa-rss" aria-hidden="true"></i> Lead
					</a>
				</li>
        <li class="dropdown">
 					<a class="dropdown-toggle"  href="{{ route('admin.contacts.all', ['view_assigned_leads' => 'yes']) }}">
 						<i class="fa fa-reply-all" aria-hidden="true"></i> Assigned Leads
 					</a>
 				</li>

        <li class="dropdown">
 					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
 						<i class="fa fa-share" aria-hidden="true"></i> Referrals
 					</a>
 				</li>


        <li class="dropdown">
 					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
 						<i class="fa fa-bullhorn" aria-hidden="true"></i> Events
 					</a>
 				</li>


        <li class="dropdown">
 					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
 						<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Reports
 					</a>
 				</li>

        <!--
        <li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-plus-square fa-2x" aria-hidden="true"></i>
					</a>
					<ul class="dropdown-menu message dropdown-1">
						<li><a>GLOBAL ACTIONS</a></li>
						<li>
							<a class="clearfix" href="#">
								<div class="col-md-2"><i class="fa fa-calendar fa-2x red" aria-hidden="true"></i></div>
								<div class="col-md-10">
                  <div class="detail">
  									<strong>New Event</strong>
  								</div>
                </div>
							</a>
						</li>
            <li>
							<a class="clearfix" href="#">
								<div class="col-md-2"><i class="fa fa-list-alt fa-2x green" aria-hidden="true"></i></div>
								<div class="col-md-10">
                  <div class="detail">
  									<strong>New Task</strong>
  								</div>
                </div>
							</a>
						</li>
            <li>
							<a class="clearfix" href="#">
								<div class="col-md-2"><i class="fa fa-address-card fa-2x blue" aria-hidden="true"></i></div>
								<div class="col-md-10">
                  <div class="detail">
  									<strong>New Contact</strong>
  								</div>
                </div>
							</a>
						</li>
            <li>
							<a class="clearfix" href="#">
								<div class="col-md-2"><i class="fa fa-suitcase fa-2x yellow" aria-hidden="true"></i></div>
								<div class="col-md-10">
                  <div class="detail">
  									<strong>New Case</strong>
  								</div>
                </div>
							</a>
						</li>
					</ul>
				</li>
      -->
				<li class="profile dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<strong>{{ Auth::user()->name }}</strong>
						<span><i class="fa fa-chevron-down"></i></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a class="clearfix" href="#">
								<i class="fa fa-user-circle-o fa-lg" aria-hidden="true"></i>
								<div class="detail">
									<strong>{{ Auth::user()->name }}</strong>
									<p class="grey">{{ Auth::user()->email }}</p>
								</div>
							</a>
						</li>
						<!--<li><a tabindex="-1" href="profile.html" class="main-link"><i class="fa fa-edit fa-lg"></i> Edit profile</a></li>
						<li><a tabindex="-1" href="gallery.html" class="main-link"><i class="fa fa-picture-o fa-lg"></i> Photo Gallery</a></li>
						<li><a tabindex="-1" href="#" class="theme-setting"><i class="fa fa-cog fa-lg"></i> Setting</a></li>
						<li class="divider"></li>-->
						<li><a tabindex="-1" class="main-link logoutConfirm_open" href="#logoutConfirm"><i class="fa fa-lock fa-lg"></i> Log out</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /top-nav-->

		<aside class="fixed skin-6">
			@include('admin.layout.common.sidebar_nav')
		</aside>

		<div id="main-container">
			<div id="breadcrumb">
				<ul class="breadcrumb">
					 <li><i class="fa fa-home"></i><a href="index-2.html"> Home</a></li>
					 <li class="active">Dashboard</li>
				</ul>
			</div><!-- /breadcrumb-->

			<div class="padding-md">

        @if(Session::has('message'))
        <div class="row">
           <div class="col-lg-12">
                 <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
                       <button type="button" class="close" data-dismiss="alert">×</button>
                       {!! Session::get('message') !!}
                 </div>
              </div>
        </div>
        @endif

				@yield('main_content')
			</div><!-- /.padding-md -->
		</div><!-- /main-container -->
		<!-- Footer
		================================================== -->
		<footer>
			<div class="row">
				<div class="col-sm-6">
					<span class="footer-brand">
						<strong class="text-danger"></strong>CRM Admin
					</span>
					<p class="no-margin">
						&copy; {{ date('Y') }} <strong>CRM Admin</strong>. ALL Rights Reserved.
					</p>
				</div><!-- /.col -->
			</div><!-- /.row-->
		</footer>


	<a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>

	<!-- Logout confirmation -->
	<div class="custom-popup width-100" id="logoutConfirm">
		<div class="padding-md">
			<h4 class="m-top-none"> Do you want to logout?</h4>
		</div>

		<div class="text-center">
			<a class="btn btn-success m-right-sm" href="{{ route('admin.logout') }}">Logout</a>
			<a class="btn btn-danger logoutConfirm_close">Cancel</a>
		</div>
	</div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

	<!-- Jquery -->
	<script src="{{ asset('admin/js/jquery-1.10.2.min.js') }}"></script>

	<!-- Bootstrap -->
    <script src="{{ asset('admin/bootstrap/js/bootstrap.js') }}"></script>

	<!-- Flot -->

	<!-- Morris -->
	<script src="{{ asset('admin/js/rapheal.min.js') }}"></script>
	<script src="{{ asset('admin/js/morris.min.js') }}"></script>

	<!-- Colorbox -->
	<script src="{{ asset('admin/js/jquery.colorbox.min.js') }}"></script>

	<!-- Sparkline -->
	<script src="{{ asset('admin/js/jquery.sparkline.min.js') }}"></script>

	<!-- Pace -->
	<script src="{{ asset('admin/js/uncompressed/pace.js') }}"></script>

	<!-- Popup Overlay -->
	<script src="{{ asset('admin/js/jquery.popupoverlay.min.js') }}"></script>

	<!-- Slimscroll -->
	<script src="{{ asset('admin/js/jquery.slimscroll.min.js') }}"></script>

	<!-- Modernizr -->
	<script src="{{ asset('admin/js/modernizr.min.js') }}"></script>

	<!-- Cookie -->
	<script src="{{ asset('admin/js/jquery.cookie.min.js') }}"></script>

  <script src="{{ asset('admin/datepicker-master/dist/datepciker.min.js') }}"></script>

  <script src="{{ asset('admin/datetimepicker-2.5.20/jquery.datetimepicker.js') }}"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.12/zebra_datepicker.min.js"></script>
	<!-- Perfect -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
	<script src="{{ asset('admin/js/app/app_dashboard.js') }}"></script>
	<script src="{{ asset('admin/js/app/app.js') }}"></script>

  <script>
      $('.datepicker').Zebra_DatePicker({
        format: 'd-m-Y'
      });

      $('.datetimepicker').Zebra_DatePicker({
        format: 'd-m-Y h:i'
      });

      /*$('.datetimepicker_mask').datetimepicker({
        timepicker:false,
        mask:true, // '9999/19/39 29:59' - digit is the maximum possible for a cell
      });
    */

      $('.datepicker2').datepicker({
        format: 'dd-mm-yyyy'
      });

      $('.yearpicker').Zebra_DatePicker({
        view: 'years',
        format: 'd-m-Y'
      });

      //recent items
      url = data = '';

      url += "{{ route('admin.api.recent_items') }}";

      $.ajax({
        url  : url,
        data : data,
        type : 'GET',
        dataType: 'json',

        error : function(resp) {
          $('#loading').hide();
          console.log(resp);
        },

        success : function(resp) { console.log(resp);
          $('#loading').hide();
          html = '';
          base = "{{ url('/') }}";

          $.each(resp, function(k,v) {
            id = v.id;

            complete_url = '';
            complete_url += base+"/admin/contact/info/"+id;

            html += '<li><a href="'+complete_url+'" target="_blank"><span class="submenu-label"><i class="fa fa-adjust" aria-hidden="true"></i> '+v.name+'</span></a></li>'
          });

          $('#recent_items').html(html);
        }

      });
  </script>

  @yield('pageJs')
  </body>

</html>
