@extends('agent.layout.login')

@section('content')

<form class="form-login" role="form" method="POST" action="{{ url('/agent/login') }}">
  {{ csrf_field() }}
  <div class="form-group">
    <label>Email</label>
    <input type="text" name="email" placeholder="Email" class="form-control input-sm bounceIn animation-delay2" >
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" placeholder="Password" class="form-control input-sm bounceIn animation-delay4">
  </div>

  <div class="seperator"></div>
  <div class="form-group">
    Forgot your password?<br/>
    Click <a href="#">here</a> to reset your password
  </div>

  <hr/>
  <button class="btn btn-success btn-sm" type="submit"> <i class="fa fa-sign-in"></i> Sign in </button>
</form>
@endsection
