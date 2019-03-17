@extends('admin.layout.master')

@section('main_content')

<?php
	$additional_names = null;
	$address          = null;
	$email            = null;
	$phone_number     = null;
	$relation_with_decease     = null;
	$activity 				= null;
?>

{!! Form::open(array('route' => 'admin.contact.store', 'id' => 'admin.contact.store')) !!}
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
      @include('admin.master.contacts._other_family_form')

			@include('admin.master.contacts._other_family_activities')
		</div>
	</div><!-- /panel -->
</div><!-- /.col -->
<hr>
<a href="javascript:void(0)" class="addNewFamily btn btn-sm btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Family Member</a>
<a href="javascript:void(0)" class="removeNewFamily btn btn-sm btn-danger noshow"><i class="fa fa-minus-circle" aria-hidden="true"></i> Remove Family Member</a>

<hr>
<button type="submit" class="btn btn-sm btn-primary">
	<i class="fa fa-dot-circle-o"></i> SAVE</button>
{!! Form::close() !!}
@endsection

@section('pageJs')
<script>
$cnt = 0;

$('.addNewFamily').click(function() {
	$clone = $('#family_member').clone();
	$last_class = $('.familym:last');

	$($last_class).after($clone);
	$cnt++;
	showhideButton($cnt);
});

$('.removeNewFamily').click(function() {
	$('div.familym:last').fadeOut(300, function(){
    $(this).remove();
	});

	$cnt--;
	showhideButton($cnt);
});


showhideButton = function(c) {
	if(c>0) {
		$('.removeNewFamily').removeClass('noshow');
		$('.removeNewFamily').addClass('yesshow');
	}else{
		$('.removeNewFamily').removeClass('yesshow');
		$('.removeNewFamily').addClass('noshow');
	}
}
</script>
@stop

@section('pageCss')
<style>
.noshow { display: none; }
.yeshow { display: block; }
</style>
@stop
