@extends('admin.layout.login')

@section('content')

<form class="form-login" role="form" method="POST" action="{{ url('/admin/login') }}">
  {{ csrf_field() }}
  <div class="form-group">
    <label>Email</label>
    <input type="text" name="email" autocomplete="off" autofocus placeholder="Email" class="form-control input-sm bounceIn animation-delay2" >
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" autocomplete="off" placeholder="Password" class="form-control input-sm bounceIn animation-delay4">
  </div>

  <div class="seperator"></div>
  <!--<div class="form-group">
    Forgot your password?<br/>
    Click <a href="#">here</a> to reset your password
  </div>-->

  <div class="form-group">
    Are you Agent ?<br/>
    Click <a href="{{ route('agent.login')}}" title="Agent Login Click Here">here</a> to login as Agent
  </div>

  <hr/>
  <button class="btn btn-success btn-sm" type="submit"> <i class="fa fa-sign-in"></i> Sign in </button>
</form>
@endsection
