@extends('admin.layout.master')

@section('main_content')

<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">All Sales Agents</div>
		<div class="panel-body">
			<table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Full Name </th>
            <th>Email</th>
          </tr>
        </thead>

        <tbody>
          @foreach($results as $k => $v)
            <tr>
              <td>{{ $k+1 }}</td>
              <td>{{ $v->name }}</td>
              <td>{{ $v->email }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
		</div>
	</div><!-- /panel -->
</div><!-- /.col -->

@endsection
