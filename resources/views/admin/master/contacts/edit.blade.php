@extends('admin.layout.master')

@section('main_content')

{!! Form::model($contact, array('route' => ['admin.contact.update', Crypt::encrypt($contact->id)], 'id' => 'admin.contact.update')) !!}
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">Create New Contact</div>
		<div class="panel-body">
      @include('admin.master.contacts._form')
		</div>
	</div><!-- /panel -->
</div><!-- /.col -->


<div class="col-md-12 familym" id="family_member">
	<div class="panel panel-default">
		<div class="panel-heading">Add Other Family Members</div>
		<div class="panel-body">
      @foreach($additional_families as $k => $v)
      <?php
        $additional_names = $v->name;
        $address          = $v->address;
        $email            = $v->email;
        $phone_number     = $v->phone_number;
        $relation_with_decease     = $v->relation_with_decease;
      ?>
			<input type="hidden" name="additional_family_ids[]" value="{{ $v->id }}">
      @include('admin.master.contacts._other_family_form')
      <?php
        $activities = DB::table('contact_additional_family_activities')->where('contact_additional_family_id', $v->id)->get();
      ?>
      @foreach($activities as $k1 => $v1)
      <?php
        $activity = $v1->activity;
      ?>

			<input type="hidden" name="activity_ids[]" value="{{ $v1->id }}">
      @include('admin.master.contacts._other_family_activities')
      @endforeach


      @endforeach


		</div>
	</div><!-- /panel -->
</div><!-- /.col -->

<hr>

<button type="submit" class="btn btn-primary">
	<i class="fa fa-shield"></i> Update</button>
{!! Form::close() !!}
@endsection

@section('pageCss')
<style>
.noshow { display: none; }
.yeshow { display: block; }
</style>
@stop
