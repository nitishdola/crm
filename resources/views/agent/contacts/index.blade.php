@extends('agent.layout.master')

@section('main_content')

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default table-responsive">
          <div class="panel-heading">
            <div class="row">
              <div class="col-md-3">All Leads</div>
              <div class="col-md-7"></div>
              <div class="col-md-2 pull-right">
                <a href="{{ route('agent.contacts.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Lead</a>
              </div>
            </div>

          </div>
          <div class="padding-md clearfix">
            @if(count($all_contacts))
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
                  <th>Added By</th>
                  <th>Details</th>
                  <th>Current Status</th>
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
                    {{ $v->addingAgent->name }}
                  </td>
                  <td width="10%">

                    <a href="{{ route('agent.contacts.info', Crypt::encrypt($v->id) ) }}" class="btn btn-sm btn-primary"> View Details</a>

                  </td>

                  <td>@if($v->agent)
                    <span class="btn btn-danger btn-sm" id="assign_msg_{{$v->id}}">Assigned to {{ $v->agent->name }} </span>

                  @else
                  <span class="btn btn-danger btn-sm">{{ ucwords(str_replace('_', ' ', $v->current_status)) }} </span>
                  @endif
                </td>
                </tr>

                @endforeach
              </tbody>
            </table>

            <div class="pagination">
      			     {!! $all_contacts->render() !!}
      			</div>
            @else

            <div class="alert alert-warning">
              <h2> NO LEADS CREATED !</h2>
            </div>
            @endif
          </div><!-- /.padding-md -->
        </div><!-- /panel -->
  </div><!-- /.col -->
</div><!-- ./row -->


@stop
