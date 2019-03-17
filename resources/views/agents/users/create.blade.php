@extends('admin.layout.master')

@section('main_content')

<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading">Create New Agent</div>
		<div class="panel-body">
			{!! Form::open(array('route' => 'admin.agent.store', 'id' => 'admin.agent.store')) !!}

      @include('agents.users._create')

      <button type="submit" class="btn btn-sm btn-primary">
        <i class="fa fa-dot-circle-o"></i> Submit</button>
      <button type="reset" class="btn btn-sm btn-danger">
        <i class="fa fa-ban"></i> Reset</button>
			{!! Form::close() !!}
		</div>
	</div><!-- /panel -->
</div><!-- /.col -->

@endsection
