@extends('agent.layout.master')
@section('pageCss')
<style>

.Zebra_DatePicker_Icon_Wrapper {
  width: 400px !important;
}
</style>
@stop
@section('pageJs')
<script type="text/javascript"> function showMyModalSetTitle(myTitle, contact_id, appdate, applocation, appnotes) {

   /*
    * '#myModayTitle' and '#myModalBody' refer to the 'id' of the HTML tags in
    * the modal HTML code that hold the title and body respectively. These id's
    * can be named anything, just make sure they are added as necessary.
    *
    */

   $('#appModalTitle').html(myTitle);
   $('#contact_id').val(contact_id);

   $('#appointment_date').val(appdate);
   $('#appointment_location_box').val(applocation);
   $('#appointment_notes_box').val(appnotes);

   $('#appModal').modal('show');
}</script>
@stop

@section('main_content')

<div class="row">
  <div class="col-lg-12">
  	<div class="panel panel-default">
  		<div class="panel-heading clearfix">
  			<span class="pull-left">Leads Assigned</span>
  			<ul class="tool-bar">
  				<li><a href="#feedList" data-toggle="collapse"><i class="fa fa-arrows-v"></i></a></li>
  			</ul>
  		</div>
  		<ul class="list-group collapse in" id="feedList">
        @if(count($all_assigned))
        @foreach($all_assigned as $k => $v)

  			<li class="list-group-item clearfix">
  				<div class="activity-icon bg-info small">
  					<a href=""><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
  				</div>
  				<div class=" m-left-sm">

            <div class="col-md-4">
  					<span><a href="{{ route('agent.contacts.info', Crypt::encrypt($v->id) ) }}">{{ $v->name }}<a/></span><br/>
  					<small class="text-muted"><i class="fa fa-envelope-open-o" aria-hidden="true"></i> {{ $v->email }}</small>

            | <small class="text-muted"><i class="fa fa-phone-square" aria-hidden="true"></i> {{ $v->phone_number }}</small>

            <br>| Current Status : @if(!$v->current_status == 'Apponintment Set')
                                      {{ ucwords( str_replace('_', ' ', $info->current_status) ) }}
                                    @else
                                    Appointment Date : {{ date('d-m-Y h:i A', strtotime($v->appointment_date)) }} / Location : {{ $v->appointment_location }} / Notes : {{ $v->appointment_notes }} <br>
                                  @endif
            <br><br> <a href="javascript:void(0)" onClick="javascript:showMyModalSetTitle('{{ $v->name }}', {{ $v->id}}, '{{ date('d-m-Y h:i A', strtotime($v->appointment_date)) }}', '{{ $v->appointment_location }}', '{{ $v->appointment_notes }}')"  class="btn btn-xs btn-warning">Edit Apponintment</a>
          </div>

            <div class="col-md-4">
              <a href="javascript:void(0)" class="btn btn-danger btn-sm"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $v->address }}</a>
            </div>

            <div class="col-md-2">
              <!--
              <a href="{{ route('agent.contacts.info', Crypt::encrypt($v->id)) }}" class="btn btn-sm btn-info" title="Contact Details">Contact Info</a>
              !-->

              <a href="#"  class="btn btn-info btn-xs"><i class="fa fa-info-circle" aria-hidden="true"></i> Current Status : <strong>{{ $v->current_status }}</strong></a>
              <br><br><a href="{{ route('agent.contacts.info', Crypt::encrypt($v->id) ) }}"  class="btn btn-primary btn-sm"><i class="fa fa-location-arrow" aria-hidden="true"></i> Details</a>
              <br><br><a href="javascript:void(0)" onClick="javascript:showMyModalSetTitle('{{ $v->name }}', {{ $v->id}}, '', '', '')"  class="btn btn-success btn-sm"><i class="fa fa-location-arrow" aria-hidden="true"></i> Set Appointment</a>
            </div>

  				</div>
  			</li>
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


<div id="appModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><span id="appModalTitle"> </span>: Set Appointment</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(array('route' => 'set.appointment', 'id' => 'set.appointment')) !!}

        <input type="hidden" name="contact_id" id="contact_id" />

        <div class="form-group {{ $errors->has('appointment_date') ? 'has-error' : ''}}">
            {!! Form::text('appointment_date', null, ['class' => 'form-control input-sm col-md-12 datetimepicker', 'id' => 'appointment_date', 'placeholder' => 'Enter Appointment Date', 'autocomplete' => 'off']) !!}
        </div>
        <br><br><br>
        <div class="form-group {{ $errors->has('appointment_location') ? 'has-error' : ''}}">
            {!! Form::text('appointment_location', null, ['class' => 'form-control input-sm col-md-12', 'id' => 'appointment_location_box', 'placeholder' => 'Appointment Location', 'autocomplete' => 'off']) !!}
        </div>
        <br><br>
        <div class="form-group {{ $errors->has('appointment_notes') ? 'has-error' : ''}}">
            {!! Form::textarea('appointment_notes', null, ['class' => 'form-control input-sm col-md-12', 'rows' => 4, 'id' => 'appointment_notes_box', 'placeholder' => 'Appointment Notes', 'autocomplete' => 'off']) !!}
        </div>

        <br><br><br><br><br><br> <button type="submit" class="btn btn-success">Change Status</button>

        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endsection
