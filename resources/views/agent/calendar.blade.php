@extends('agent.layout.master')

@section('pageCss')
<link href="{{ asset('admin/fullcalendar/fullcalendar.css') }}" rel="stylesheet">
@stop

@section('pageJs')
<script src="{{ asset('admin/fullcalendar/lib/moment.min.js') }}"></script>
<script src="{{ asset('admin/fullcalendar/fullcalendar.js') }}"></script>

<script>
auth_id = "{{ $auth_id }}";
base_url = "{{ url('/') }}";

data = url = '';
url = "{{ route('agent.api.all_events') }}";
data = '&assigned_to='+auth_id;
$.ajax({
  data : data,
  url  : url,
  type : 'GET',
  dataType : 'JSON',
  error : function(resp) {
    alert('eoorr !');
  },

  success : function(resp) {
    //console.log(resp);
    $('#calendar').fullCalendar({
      defaultDate: "{{ date('Y-m-d') }}",
      editable: true,
      eventLimit: true,
      events: resp,
      defaultView: 'listMonth',
      eventClick: function(event) {
        //console.log(event);
        full_contact_url = base_url+'/agent/contact/info/'+event.contact_id;
        window.open(full_contact_url,'_blank');
      }
    });
  }
});


</script>
@stop

@section('main_content')
<div id='calendar'></div>
@stop
