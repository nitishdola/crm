@extends('admin.layout.master')

@section('main_content')
<div class="row">
  <div class="col-sm-6 col-md-3">
    <div class="panel-stat3 bg-danger">
      <h2 class="m-top-none" id="userCount">{{ $agents_count }}</h2>
      <h5>Registered Agents</h5>
      <div class="stat-icon">
        <i class="fa fa-user fa-3x"></i>
      </div>
      <div class="refresh-button">
        <i class="fa fa-refresh"></i>
      </div>
      <div class="loading-overlay">
        <i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
      </div>
    </div>
  </div><!-- /.col -->
  <div class="col-sm-6 col-md-3">
    <div class="panel-stat3 bg-info">
      <h2 class="m-top-none"><span id="serverloadCount">{{ $contacts_count }}</span></h2>
      <h5>Active Leads </h5>
      <div class="stat-icon">
        <i class="fa fa-hdd-o fa-3x"></i>
      </div>
      <div class="refresh-button">
        <i class="fa fa-refresh"></i>
      </div>
      <div class="loading-overlay">
        <i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
      </div>
    </div>
  </div><!-- /.col -->
  <div class="col-sm-6 col-md-3">
    <div class="panel-stat3 bg-warning">
      <h2 class="m-top-none" id="orderCount">{{ $assigned_contact_count }}</h2>
      <h5>Assigned Leads</h5>
      <div class="stat-icon">
        <i class="fa fa-shopping-cart fa-3x"></i>
      </div>
      <div class="refresh-button">
        <i class="fa fa-refresh"></i>
      </div>
      <div class="loading-overlay">
        <i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
      </div>
    </div>
  </div><!-- /.col -->
  <div class="col-sm-6 col-md-3">
    <div class="panel-stat3 bg-success">
      <h2 class="m-top-none" id="visitorCount">{{ $fresh_contact_count }}</h2>
      <h5>Fresh Leads</h5>
      <div class="stat-icon">
        <i class="fa fa-bar-chart-o fa-3x"></i>
      </div>
      <div class="refresh-button">
        <i class="fa fa-refresh"></i>
      </div>
      <div class="loading-overlay">
        <i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
      </div>
    </div>
  </div><!-- /.col -->
</div>

@if(count($not_interested_leads))
<div class="row">
  <div class="col-lg-12">
  	<div class="panel panel-default">
      <p style="padding:10px">
        <strong>Leads declined by Agents</strong>
      </p>

      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Address</th>
            <th>Assigned To</th>
            <th>Current Status</th>
            <th>Details</th>
          </tr>
        </thead>
      @foreach($not_interested_leads as $k => $v)
        <tbody>
          <tr>
            <td>{{ $k+1 }}</td>
            <td>{{ ucwords($v->name) }}</td>
            <td>{{ $v->address }}</td>
            <td>{{ $v->agent->name }}</td>
            <td>{{ ucwords(str_replace('_', ' ', $v->current_status)) }}</td>
            <td><a href="{{ route('admin.contacts.info', Crypt::encrypt($v->id)) }}" class="btn btn-xs btn-success">Details</a></td>
          </tr>
      @endforeach
    </table>
    </div>
  </div>
</div>
@endif

@if(count($all_contacts))
<div class="row">
  <div class="col-lg-12">
  	<div class="panel panel-default">
  		<div class="panel-heading clearfix">
  			<span class="pull-left">Recent Leads</span>
  			<ul class="tool-bar">
  				<li><a href="#feedList" data-toggle="collapse"><i class="fa fa-arrows-v"></i></a></li>
  			</ul>
  		</div>
  		<ul class="list-group collapse in" id="feedList">

        @foreach($all_contacts as $k => $v)
  			<li class="list-group-item clearfix">
  				<div class="activity-icon bg-info small">
  					<i class="fa fa-user-circle-o" aria-hidden="true"></i>
  				</div>
  				<div class=" m-left-sm">
            <a href="{{ route('admin.contacts.info', Crypt::encrypt($v->id)) }}">
              <div class="col-md-4">
    					<span>{{ $v->name }}</span><br/>
    					<small class="text-muted"><i class="fa fa-envelope-open-o" aria-hidden="true"></i> {{ $v->email }}</small>

              | <small class="text-muted"><i class="fa fa-phone-square" aria-hidden="true"></i> {{ $v->phone_number }} </small>
              </div>
            </a>

            <div class="col-md-4">
              <i class="fa fa-map-marker" aria-hidden="true"></i> {{ $v->address }}
            </div>

            <div class="col-md-2">
              @if($v->agent == null)
              <a href="javascript:void(0)" class="btn btn-primary btn-sm"><i class="fa fa-location-arrow" aria-hidden="true"></i> Assign</a>
              @else
              Assigned to {{ ucwords($v->agent->name) }}
              @endif
            </div>

  				</div>
  			</li>
        @endforeach

  		</ul><!-- /list-group -->
  		<div class="loading-overlay">
  			<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
  		</div>
  	</div><!-- /panel -->
  </div><!-- /.col -->
</div><!-- ./row -->
@endif
@endsection
