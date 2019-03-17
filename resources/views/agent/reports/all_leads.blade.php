@extends('agent.layout.master')

@section('pageCss')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.default.min.css">
@stop

@section('pageJs')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/selectize.min.js"></script>

<script>
$('.selectize').selectize({
    sortField: 'text'
});
</script>
@stop


@section('main_content')

<div class="row">

  {!! Form::open(array('route' => 'agent.report.all_leads', 'id' => 'agent.report.all_leads', 'method' => 'GET')) !!}

  <div class="col-md-4">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
      {!! Form::label('name', '', array('class' => '')) !!}
        {!! Form::text('name', null, ['class' => 'form-control input-sm', 'id' => 'name', 'placeholder' => 'Full Name', 'autocomplete' => 'off']) !!}
      {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : ''}}">
      {!! Form::label('phone_number', '', array('class' => '')) !!}
        {!! Form::text('phone_number', null, ['class' => 'form-control input-sm', 'id' => 'phone_number', 'placeholder' => 'Phone Number', 'autocomplete' => 'off']) !!}
      {!! $errors->first('phone_number', '<span class="help-inline">:message</span>') !!}
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group {{ $errors->has('current_status') ? 'has-error' : ''}}">
      {!! Form::label('current_status', '', array('class' => '')) !!}
        {!! Form::select('current_status', $all_statuses, null, ['class' => 'form-control input-sm', 'id' => 'current_status', 'placeholder' => 'Select Current Status', 'autocomplete' => 'off']) !!}
      {!! $errors->first('current_status', '<span class="help-inline">:message</span>') !!}
    </div>
  </div>


  <div class="col-md-4">
    <div class="form-group {{ $errors->has('current_status') ? 'has-error' : ''}}">
      {!! Form::label('', '', array('class' => '')) !!}
      <button type="submit" class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i> SEARCH</button>
    </div>
  </div>
  {!! Form::close() !!}
</div>


<div class="row">
  <div class="col-lg-12">
  	<div class="panel panel-default">
  		<div class="panel-heading clearfix">
  			<span class="pull-left">Leads Assigned</span>
  			<ul class="tool-bar">
  				<li><a href="#feedList" data-toggle="collapse"><i class="fa fa-arrows-v"></i></a></li>
  			</ul>
  		</div>
      <?php $count = 1; ?>
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Sl No</th>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Relationship with Decease</th>
            <th>Current Status</th>
            <th>Details</th>
          </tr>
        </thead>

        <tbody>
          @foreach($all_contacts as $k => $v)
            <tr>
              <td>{{ (($all_contacts->currentPage() - 1 ) * $all_contacts->perPage() ) + $count + $k }} </td>
              <td>{{ $v->name }}</td>
              <td>{{ $v->address }}</td>
              <td>{{ $v->email }}</td>
              <td>{{ $v->phone_number }}</td>
              <td>{{ $v->relation_with_decease }}</td>
              <td>{{ ucwords(str_replace('_', ' ', $v->current_status)) }}</td>
              <td><a href="{{ route('agent.contacts.info', Crypt::encrypt($v->id)) }}" class="btn btn-sm btn-info" title="Contact Details">Contact Info</a></td>
            </tr>
           @endforeach
        </tbody>
      </table>
      <div class="pagination">
                {!! $all_contacts->render() !!}
        </div>
  		<ul class="list-group collapse in" id="feedList">
        @if(count($all_contacts))
        @foreach($all_contacts as $k => $v)

  			
        @endforeach
        @else
        <br><br>
        <div class="alert alert-warning">
          <strong>No Contacts Assigned !</strong>
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

