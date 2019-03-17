<div class="col-md-12">
  <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
    {!! Form::label('who_referred_them*', '', array('class' => '')) !!}
      {!! Form::text('first_name', null, ['class' => 'form-control input-sm', 'id' => 'name', 'placeholder' => 'First Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
    {!! $errors->first('first_name', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
      {!! Form::text('last_name', null, ['class' => 'form-control input-sm', 'id' => 'last_name', 'placeholder' => 'Last Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
    {!! $errors->first('last_name', '<span class="help-inline">:message</span>') !!}
  </div>


  <div class="form-group {{ $errors->has('deceased_first_name') ? 'has-error' : ''}}">
    {!! Form::label('Name of Deceased*', '', array('class' => '')) !!}
      {!! Form::text('deceased_first_name', null, ['class' => 'form-control input-sm', 'id' => 'deceased_first_name', 'placeholder' => 'First Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
    {!! $errors->first('deceased_first_name', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('deceased_last_name') ? 'has-error' : ''}}">
      {!! Form::text('deceased_last_name', null, ['class' => 'form-control input-sm', 'id' => 'deceased_last_name', 'placeholder' => 'Last Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
    {!! $errors->first('deceased_last_name', '<span class="help-inline">:message</span>') !!}
  </div>


  <div class="form-group {{ $errors->has('referral_first_name') ? 'has-error' : ''}}">
    {!! Form::label('Referral  *', '', array('class' => '')) !!}
      {!! Form::text('referral_first_name', null, ['class' => 'form-control input-sm', 'id' => 'referral_first_name', 'placeholder' => 'First Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
    {!! $errors->first('referral_first_name', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('referral_last_name') ? 'has-error' : ''}}">
      {!! Form::text('referral_last_name', null, ['class' => 'form-control input-sm', 'id' => 'referral_last_name', 'placeholder' => 'Last Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
    {!! $errors->first('referral_last_name', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('relation_with_decease') ? 'has-error' : ''}}">
    {!! Form::label('customer\'s_relation_with_decease*', '', array('class' => '')) !!}
      {!! Form::select('relation_with_decease', $all_relations, null, ['class' => 'form-control input-sm', 'id' => 'relation_with_decease', 'placeholder' => 'Select Relationship to the Decease', 'autocomplete' => 'off', 'required' => 'true']) !!}
    {!! $errors->first('relation_with_decease', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('address*', '', array('class' => '')) !!}
      {!! Form::textarea('address', null, ['class' => 'form-control input-sm', 'rows' => 5, 'id' => 'address', 'placeholder' => 'Address', 'autocomplete' => 'off', 'required' => 'true']) !!}
    {!! $errors->first('address', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email*', '', array('class' => '')) !!}
      {!! Form::email('email', null, ['class' => 'form-control input-sm', 'id' => 'email', 'placeholder' => 'Email', 'autocomplete' => 'off', 'required' => 'true']) !!}
    {!! $errors->first('email', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('cell_number') ? 'has-error' : ''}}">
    {!! Form::label('cell_number*', '', array('class' => '')) !!}
      {!! Form::text('cell_number', null, ['class' => 'form-control input-sm', 'id' => 'cell_number', 'placeholder' => 'Cell Number', 'autocomplete' => 'off', 'required' => 'true']) !!}
    {!! $errors->first('cell_number', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('home_number') ? 'has-error' : ''}}">
    {!! Form::label('home_number', '', array('class' => '')) !!}
      {!! Form::text('home_number', null, ['class' => 'form-control input-sm', 'id' => 'phone_number', 'placeholder' => 'Home Number', 'autocomplete' => 'off']) !!}
    {!! $errors->first('home_number', '<span class="help-inline">:message</span>') !!}
  </div>


</div>
