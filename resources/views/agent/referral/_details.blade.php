<div id="breadcrumb">

	<?php
	$atab = $cactive = $bactive = $oactive = '';

	if(isset($active_tab)) {
		$atab = $active_tab;

		if($atab == 'current_status') {
			$cactive = 'active';
		}

		if($atab == 'basic') {
			$bactive = 'active';
		}

		if($atab == 'other_families') {
			$oactive = 'active';
		}
	}else{
		$bactive = 'active';
	}
	?>

	<ul class="tab-bar grey-tab">
		<li class="{{ $bactive }}">
			<a href="#basic" data-toggle="tab">
				<span class="block text-center">
					<i class="fa fa-tag fa-2x"></i>
				</span>
				Basic Info
			</a>
		</li>
		<li class="{{ $cactive }}">
			<a href="#current_status" data-toggle="tab">
				<span class="block text-center">
					<i class="fa fa-arrows fa-2x"></i>
				</span>
				Current Status & Agent Info
			</a>
		</li>
	</ul>

	<div class="padding-md">

		<div class="tab-content">
			<div class="tab-pane fade  @if($bactive) in {{ $bactive }} @endif" id="basic">
				<div class="panel-group" id="FaqBasic2">

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<span class="col-md-3"><i class="fa fa-bell red" aria-hidden="true"></i> Full Name </span> <span class="col-md-8 ucall"> : {{ $info->first_name }} {{ $info->last_name }}</span>.
							</h4>
						</div>
					</div><!-- /panel -->


					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<span class="col-md-3"><i class="fa fa-address-card full-name-icon green" aria-hidden="true"></i> ADDRESS </span> <span class="col-md-8 ucall">  : {{ ucwords($info->address) }} </span>.
							</h4>
						</div>
					</div><!-- /panel -->

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<span class="col-md-3"> <i class="fa fa-phone-square full-name-icon red" aria-hidden="true"></i> PHONE NUMBER </span> <span class="col-md-8 ucall">  : {{ $info->cell_number }}</span>.
							</h4>
						</div>
					</div><!-- /panel -->

          <div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<span class="col-md-3"> <i class="fa fa-phone-square full-name-icon red" aria-hidden="true"></i> HOME NUMBER </span> <span class="col-md-8 ucall">  : {{ $info->home_number }}</span>.
							</h4>
						</div>
					</div><!-- /panel -->


					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<span class="col-md-3"> <i class="fa fa-snowflake-o full-name-icon yellow" aria-hidden="true"></i> RELATION WITH DECEASED </span> <span class="col-md-8 ucall">  :  {{ $info->relation_with_decease }}</span>.
							</h4>
						</div>
					</div><!-- /panel -->


					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<span class="col-md-3"> <i class="fa fa-snowflake-o full-name-icon yellow" aria-hidden="true"></i> Name of Deceased </span> <span class="col-md-8 ucall">  :  {{ $info->deceased_first_name }} {{ $info->deceased_last_name }}</span>.
							</h4>
						</div>
					</div><!-- /panel -->

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<span class="col-md-3"> <i class="fa fa-snowflake-o full-name-icon yellow" aria-hidden="true"></i> Referred By </span> <span class="col-md-8 ucall">  : {{ $info->referral_first_name }} {{ $info->referral_last_name }} </span>.
							</h4>
						</div>
					</div><!-- /panel -->

				</div>
			</div><!-- /tab-pane -->


			<div class="tab-pane fade @if($cactive) in {{ $cactive }} @endif" id="current_status">
				<div class="panel-group" id="FaqLicense">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<span class="col-md-3"> <i class="fa fa-snowflake-o full-name-icon yellow" aria-hidden="true"></i> CURRENT STATUS </span> <span class="col-md-8 ">  :
                    @if($info->current_status == '')
                      Referral Added
                    @elseif(!$info->current_status == 'Apponintment Set')
											{{ ucwords( str_replace('_', ' ', $info->current_status) ) }}
										@else
										Appointment Date : {{ date('d-m-Y h:i A', strtotime($info->appointment_date)) }} / Location : {{ $info->appointment_location }} / Notes : {{ $info->appointment_notes }} <br>
									@endif
								</span>.
							</h4>
						</div>
					</div><!-- /panel -->

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<span class="col-md-3"> <i class="fa fa-snowflake-o full-name-icon yellow" aria-hidden="true"></i> ASSIGNED TO AGENT </span> <span class="col-md-8 ucall">  :
									@if($info->agent)
									{{ $info->agent->name }}
									@else
									NOT YET ASSIGNED
									@endif
								</span>.
							</h4>
						</div>
					</div><!-- /panel -->

					@if($info->assigned_to == Auth::user('agent')->id)
					@if($info->status)
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<span class="col-md-3"> <i class="fa fa-paper-plane blue" aria-hidden="true"></i> CHANGE STATUS </span> <span class="col-md-8 ucall">

									@if(isset(Auth::user('agent')->id) && Auth::user('agent')->id == $agent_id && ($info->current_status == 'Not Interested'))
										<div class="alert alert-warning">
											<h4 style="text-align:center">You have marked this lead as Not Interested</h4>
										</div>
									@elseif(isset(Auth::user('admin')->id) && ($info->current_status == 'Not Interested'))
									<a href="#" class="btn btn-sm btn-success" onclick="showmodal('{{ $info->name }}', {{ $info->id }})"> Assign Lead to other Agent</a>
									@else


									{!! Form::open(array('route' => 'update.status', 'id' => 'update_status')) !!}

									<input type="hidden" name="agent_id" value="{{ $agent_id }}" />
									<input type="hidden" name="admin_id" value="{{ $admin_id }}" />
									<input type="hidden" name="contact_id" value="{{ $info->id }}" />

									<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
										{!! Form::select('status', $all_statues, null, ['class' => 'form-control input-sm', 'id' => 'status', 'placeholder' => 'Select Status', 'autocomplete' => 'off', 'required' => 'true']) !!}
									</div>

									<div class="form-group {{ $errors->has('appointment_date') ? 'has-error' : ''}}" id="appdate" style="display:none;">
											{!! Form::text('appointment_date', null, ['class' => 'form-control input-sm col-md-12 datetimepicker', 'id' => 'appointment_date', 'placeholder' => 'Enter Appointment Date', 'autocomplete' => 'off']) !!}
									</div>
									<br><br><br>
									<div class="form-group {{ $errors->has('appointment_location') ? 'has-error' : ''}}" id="appointment_location" style="display:none;">
											{!! Form::text('appointment_location', null, ['class' => 'form-control input-sm col-md-12', 'id' => 'appointment_location_box', 'placeholder' => 'Appointment Location', 'autocomplete' => 'off']) !!}
									</div>
									<br><br>
									<div class="form-group {{ $errors->has('appointment_notes') ? 'has-error' : ''}}" id="appointment_notes" style="display:none;">
											{!! Form::text('appointment_notes', null, ['class' => 'form-control input-sm col-md-12', 'id' => 'appointment_notes_box', 'placeholder' => 'Appointment Notes', 'autocomplete' => 'off']) !!}
									</div>


									<div class="form-group {{ $errors->has('sale_amount') ? 'has-error' : ''}}" id="sale_amount_lbl" style="display:none;">
										{!! Form::number('sale_amount', null, ['class' => 'form-control input-sm col-md-6', 'step' => '0.01', 'id' => 'sale_amount', 'placeholder' => 'Enter Sale Amount', 'autocomplete' => 'off']) !!}
									</div>

									<br><br><br> <button type="submit" class="btn btn-success">Change Status</button>

									{!! Form::close() !!}

									@endif

									<br><br>
								</span>.
							</h4>
						</div>
					</div><!-- /panel -->
					@endif
					@endif

				</div><!-- /panel-group -->
			</div><!-- /tab-pane -->

		</div><!-- /tab-content -->
	</div><!-- /.padding -->
</div><!-- breadcrumb -->
