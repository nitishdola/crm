@extends('admin.layout.master')

@section('pageCss')
<style>
.red { color: #f44242 }
.blue { color: #4741f4 }
.yellow { #ebf441 }
.pink { #8c0583 }
.green { #228c04 }
.ucall { text-transform: uppercase;}
.hide{ display: none;}
</style>
@stop


@section('main_content')

@if(!$info->status)
<div class="alert alert-danger">
  <p style="text-align:center"><strong>This Lead was Moved to Recycle Bin <i class="fa fa-trash-o" aria-hidden="true"></i></strong></p>
</div>
@endif

@include('admin.master.contacts._details')

<div class="modal fade" id="modalAssignForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Lead : <span id="contact"></span></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Select Agent</label>
          {!! Form::select('agent_id', $all_agents, null, ['class' => 'form-control input-sm', 'id' => 'agent_id', 'placeholder' => 'Select Agent', 'autocomplete' => 'off', 'required' => 'true']) !!}
        </div>

        <input type="hidden" id="contact_id" value="" />
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default" id="assign">Assign</button>
      </div>
    </div>
  </div>
</div>

@stop

@section('pageJs')
<script>
showmodal = function(cname, cid) {

  $('#contact').text(cname);
  $('#contact_id').val(cid);

  $('#modalAssignForm').modal('show');
}

$('#status').change(function() {
  $sts = $(this).val();

//  if($sts == )
});

$('#assign').click(function(e) {
  agent_id = $('#agent_id').val();
  contact_id = $('#contact_id').val();

  data = '';
  url  = '';

  data = '&agent_id='+agent_id+'&contact_id='+contact_id;
  url  = "{{ route('admin.api.assign.contact') }}";
  redirect = "{{ route('admin.contacts.info', Crypt::encrypt($info->id) ) }}?active_tab=current_status";

  $.blockUI({ message: '<h1> Assignig.....</h1>' });
  console.log(url+data);
  $.ajax({
    data : data,
    url  : url,
    type : 'get',
    dataType: "json",
    error : function(resp) {
      $.unblockUI();
      $('#modalAssignForm').modal('toggle');
      alert('something went wrong !');
      console.log(resp);
    },

    success : function(resp) {
      window.location = redirect;
    }
  });

})
</script>
@stop
