@extends('admin.layout.master')

@section('main_content')

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default table-responsive">
          <div class="panel-heading">
            <strong>Leads</strong> All

          </div>
          <div class="padding-md clearfix">
            <?php $count = 1; ?>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Relationship With Decease</th>
                  <th>Name of Decease</th>
                  <th>Edit</th>
                  <th>Details</th>
                </tr>
              </thead>
              <tbody>
                @foreach($all_contacts as $k => $v)
                <tr>
                  <td>{{ (($all_contacts->currentPage() - 1 ) * $all_contacts->perPage() ) + $count + $k }}</td>
                  <td class="cname">{{ $v->name }}</td>
                  <td>{{ $v->address }}</td>
                  <td>{{ $v->email }}</td>
                  <td>{{ $v->phone_number }}</td>
                  <td>{{ $v->relation_with_decease }}</td>
                  <td>{{ $v->name_of_deceased }}</td>
                  <td>
                    <a href="{{ route('admin.contact.edit', Crypt::encrypt($v->id))}}" class="btn btn-info btn-xs"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Lead</a>
                    <br><br> <a href="{{ route('admin.contact.delete', Crypt::encrypt($v->id)) }}" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o" aria-hidden="true"></i> Remove Lead</a>
                  </td>
                  <td width="20%">

                    <a href="{{ route('admin.contacts.info', Crypt::encrypt($v->id) ) }}" class="btn btn-sm btn-primary"> View Details</a>
                    @if($v->agent)
                    <br><br><span class="btn btn-danger btn-sm" id="assign_msg_{{$v->id}}">Assigned to {{ $v->agent->name }} </span>
                    @else
                    <span id="assign_{{$v->id}}">
                      | <a href="#" class="btn btn-sm btn-success" onclick="showmodal('{{ $v->name }}', {{ $v->id }})"> Assign Lead</a>
                    </span>

                    <br><br><span class="btn btn-danger btn-sm" id="assign_msg_{{$v->id}}" style="display:none;"> </span>
                    @endif
                  </td>
                </tr>

                @endforeach
              </tbody>
            </table>

            <div class="pagination">
      			     {!! $all_contacts->render() !!}
      			</div>
          </div><!-- /.padding-md -->
        </div><!-- /panel -->
  </div><!-- /.col -->
</div><!-- ./row -->


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
@endsection

@section('pageJs')
<script>
showmodal = function(cname, cid) {

  $('#contact').text(cname);
  $('#contact_id').val(cid);

  $('#modalAssignForm').modal('show');
}


$('#assign').click(function(e) {
  agent_id = $('#agent_id').val();
  contact_id = $('#contact_id').val();

  data = '';
  url  = '';

  data = '&agent_id='+agent_id+'&contact_id='+contact_id;
  url  = "{{ route('admin.api.assign.contact') }}";
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
      $.unblockUI();
      $('#assign_'+resp.contact_id).hide();
      $('#assign_msg_'+resp.contact_id).text('Assigned to '+resp.agent);
      $('#assign_msg_'+resp.contact_id).show();
      $('#modalAssignForm').modal('toggle');
      console.log(resp);
    }
  });

})
</script>
@stop
