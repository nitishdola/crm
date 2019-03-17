<div class="col-md-6">
  <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', '', array('class' => '')) !!}
      {!! Form::text('additional_names[]', $additional_names, ['class' => 'form-control input-sm', 'id' => 'name', 'placeholder' => 'Full Name', 'autocomplete' => 'off']) !!}
    {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('address', '', array('class' => '')) !!}
      {!! Form::textarea('additional_addresses[]', $address, ['class' => 'form-control input-sm', 'rows' => 5, 'id' => 'address', 'placeholder' => 'Address', 'autocomplete' => 'off']) !!}
    {!! $errors->first('address', '<span class="help-inline">:message</span>') !!}
  </div>


</div>
<div class="col-md-6">

  <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', '', array('class' => '')) !!}
      {!! Form::email('additional_emails[]', $email, ['class' => 'form-control input-sm', 'id' => 'email', 'placeholder' => 'Email', 'autocomplete' => 'off']) !!}
    {!! $errors->first('email', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : ''}}">
    {!! Form::label('phone_number', '', array('class' => '')) !!}
      {!! Form::text('additional_phone_numbers[]', $phone_number, ['class' => 'form-control input-sm', 'id' => 'phone_number', 'placeholder' => 'Phone Number', 'autocomplete' => 'off']) !!}
    {!! $errors->first('phone_number', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('relation_with_decease') ? 'has-error' : ''}}">
    {!! Form::label('relation_with_decease', '', array('class' => '')) !!}
      {!! Form::select('additional_relation_with_deceases[]', $all_relations, $relation_with_decease, ['class' => 'form-control input-sm', 'id' => 'relation_with_decease', 'placeholder' => 'Select Relation With Decease', 'autocomplete' => 'off']) !!}
    {!! $errors->first('relation_with_decease', '<span class="help-inline">:message</span>') !!}
  </div>
</div>
