<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('admin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="{{ asset('admin/css/font-awesome.min.css') }}" rel="stylesheet">

	<!-- Perfect -->
	<link href="{{ asset('admin/css/app.min.css') }}" rel="stylesheet">

  <link href="{{ asset('admin/css/master.css') }}" rel="stylesheet">
  </head>

  <?php $bgimg = asset('admin/images/login_bg.png'); ?>
  <body class="login_bg" style="background-image:url('{{ $bgimg }}')" >
	<div class="login-wrapper">
		<div class="text-center">
			<h2 class="fadeInUp animation-delay8" style="font-weight:bold">
				<span class="text-success">CRM</span> <span style="color:#ccc; text-shadow:0 1px #fff">Admin</span>
			</h2>
		</div>
		<div class="login-widget animation-delay1">
			<div class="panel panel-default">
				<div class="panel-heading clearfix">
					<div class="pull-left">
						<i class="fa fa-lock fa-lg"></i> Login
					</div>


				</div>
				<div class="panel-body">

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
          
					@yield('content')
				</div>
			</div><!-- /panel -->
		</div><!-- /login-widget -->
	</div><!-- /login-wrapper -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- Jquery -->
	<script src="{{ asset('admin/js/jquery-1.10.2.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('admin/bootstrap/js/bootstrap.min.js') }}"></script>

	<!-- Modernizr -->
	<script src="{{ asset('admin/js/modernizr.min.js') }}"></script>

    <!-- Pace -->
	<script src="{{ asset('admin/js/pace.min.js') }}"></script>

	<!-- Popup Overlay -->
	<script src="{{ asset('admin/js/jquery.popupoverlay.min.js') }}"></script>

    <!-- Slimscroll -->
	<script src="{{ asset('admin/js/jquery.slimscroll.min.js') }}"></script>

	<!-- Cookie -->
	<script src="{{ asset('admin/js/jquery.cookie.min.js') }}"></script>

	<!-- Perfect -->
	<script src="{{ asset('admin/js/app/app.js') }}"></script>
  </body>

</html>
