@extends('agent.layout.master')

@section('main_content')

<div class="row">
  <div class="col-lg-12">
  	<div class="panel panel-default">
  		<div class="panel-heading clearfix">
  			<span class="pull-left">Referrals</span>
  			<ul class="tool-bar">
  				<li><a href="#feedList" data-toggle="collapse"><i class="fa fa-arrows-v"></i></a></li>
  			</ul>
  		</div>
  		<ul class="list-group collapse in" id="feedList">
        @if(count($results))
        @foreach($results as $k => $v)

  			<li class="list-group-item clearfix">
  				<div class="activity-icon bg-info small">
  					<a href=""><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
  				</div>
  				<div class=" m-left-sm">

            <div class="col-md-4">
  					<span><a href="{{ route('agent.contacts.info', Crypt::encrypt($v->id) ) }}">{{ $v->first_name }} {{ $v->last_name }}<a/></span><br/>
  					<small class="text-muted"><i class="fa fa-envelope-open-o" aria-hidden="true"></i> {{ $v->email }}</small>

            | <small class="text-muted"><i class="fa fa-phone-square" aria-hidden="true"></i> {{ $v->cell_number }}</small>
          </div>

            <div class="col-md-4">
              <a href="javascript:void(0)" class="btn btn-danger btn-sm"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $v->address }}</a>
            </div>

            <div class="col-md-2">
              <!--
              <a href="{{ route('agent.contacts.info', Crypt::encrypt($v->id)) }}" class="btn btn-sm btn-info" title="Contact Details">Contact Info</a>
              !-->
              <!--
              <a href="{{ route('agent.contacts.info', Crypt::encrypt($v->id) ) }}?active_tab=current_status"  class="btn btn-info btn-sm">
                  <i class="fa fa-info-circle" aria-hidden="true"></i> Info {{ ucwords(str_replace('_', ' ', $v->current_status)) }}
              </a>

              <br><br>!-->
              <a href="{{ route('agent.referral.info', Crypt::encrypt($v->id) ) }}"  class="btn btn-primary btn-sm"><i class="fa fa-location-arrow" aria-hidden="true"></i> Details</a>
            </div>

  				</div>
  			</li>
        @endforeach
        @else
        <br><br>
        <div class="alert alert-warning">
          <strong>No Referrals !</strong>
        </div>
        @endif

  		</ul><!-- /list-group -->
  		<div class="loading-overlay">
  			<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
  		</div>
  	</div><!-- /panel -->
  </div><!-- /.col -->
</div><!-- ./row -->

@endsection
