@extends('agent.layout.master')

@section('main_content')

@if($errors)

	@foreach($errors as $error)
		<div class="alert alert-danger">
			<h4>{{ $error }}</h4>
		</div>
	@endforeach
@endif

{!! Form::open(array('route' => 'agent.referral.save', 'id' => 'agent.referral.save')) !!}
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">Create New Referrals</div>
		<div class="panel-body">
      @include('agent.referral._form')
		</div>
	</div><!-- /panel -->
</div><!-- /.col -->
<hr>
<button type="submit" class="btn btn-sm btn-primary">
	<i class="fa fa-dot-circle-o"></i> SAVE</button>
{!! Form::close() !!}
@endsection
