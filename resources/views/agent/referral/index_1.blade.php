@extends('agent.layout.master')

@section('main_content')

<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
      <div class="row">
        <div class="col-md-3">All Referrals</div>
        <div class="col-md-7"></div>
        <div class="col-md-2 pull-right">
          <a href="{{ route('agent.referral.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Referrals</a>
        </div>
      </div>
    </div>
		<div class="panel-body">
      @if(count($results))
			<table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>First Name </th>
            <th>Last Name </th>
            <th>Deceased First Name </th>
            <th>Deceased Last Name </th>
            <th>Referral First Name </th>
            <th>Referral Last Name </th>
            <th>Relation </th>
            <th>Address </th>
            <th>Email </th>
            <th>Cell Number </th>
            <th>Home Number </th>
          </tr>
        </thead>

        <tbody>
          @foreach($results as $k => $v)
            <tr>
              <td>{{ $k+1 }}</td>
              <td>{{ $v->first_name }}</td>
              <td>{{ $v->last_name }}</td>
              <td>{{ $v->deceased_first_name }}</td>
              <td>{{ $v->deceased_last_name }}</td>
              <td>{{ $v->referral_first_name }}</td>
              <td>{{ $v->referral_last_name }}</td>
              <td>{{ $v->relation_with_decease }}</td>
              <td>{{ $v->address }}</td>
              <td>{{ $v->email }}</td>
              <td>{{ $v->cell_number }}</td>
              <td>{{ $v->home_number }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      @else
      <div class="alert alert-danger">
        <h3>NO RESULTS FOUND !</h3>
      </div>
      @endif
		</div>
	</div><!-- /panel -->
</div><!-- /.col -->

@endsection
