@extends('admin.layout.master')

@section('main_content')

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default table-responsive">
          <div class="panel-heading">
            <strong>All Trash Leads</strong>

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

                  <td width="20%">

                    <a href="{{ route('admin.contacts.info', Crypt::encrypt($v->id) ) }}" target="_blank" class="btn btn-sm btn-primary"> View Details</a>
                    @if($v->agent)
                    <br><br><span class="btn btn-danger btn-sm" id="assign_msg_{{$v->id}}">Assigned to {{ $v->agent->name }} </span>
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


@endsection
