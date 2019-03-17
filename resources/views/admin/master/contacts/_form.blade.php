<div class="col-md-6">
  <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name*', '', array('class' => '')) !!}
      {!! Form::text('name', null, ['class' => 'form-control input-sm', 'id' => 'name', 'placeholder' => 'Full Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
    {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
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

  <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : ''}}">
    {!! Form::label('cell_number*', '', array('class' => '')) !!}
      {!! Form::text('phone_number', null, ['class' => 'form-control input-sm', 'id' => 'phone_number', 'placeholder' => 'Cell Number', 'autocomplete' => 'off', 'required' => 'true']) !!}
    {!! $errors->first('phone_number', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('home_number') ? 'has-error' : ''}}">
    {!! Form::label('home_number', '', array('class' => '')) !!}
      {!! Form::text('home_number', null, ['class' => 'form-control input-sm', 'id' => 'phone_number', 'placeholder' => 'Home Number', 'autocomplete' => 'off']) !!}
    {!! $errors->first('home_number', '<span class="help-inline">:message</span>') !!}
  </div>


  <div class="form-group {{ $errors->has('notes') ? 'has-error' : ''}}">
    {!! Form::label('notes', '', array('class' => '')) !!}
      {!! Form::textarea('notes', null, ['class' => 'form-control input-sm', 'rows' => 5, 'id' => 'notes', 'placeholder' => 'Notes', 'autocomplete' => 'off']) !!}
    {!! $errors->first('notes', '<span class="help-inline">:message</span>') !!}
  </div>


</div>

<div class="col-md-6">

  <div class="form-group {{ $errors->has('relation_with_decease') ? 'has-error' : ''}}">
    {!! Form::label('relation_with_decease*', '', array('class' => '')) !!}
      {!! Form::select('relation_with_decease', $all_relations, null, ['class' => 'form-control input-sm', 'id' => 'relation_with_decease', 'placeholder' => 'Select Relation With Decease', 'autocomplete' => 'off', 'required' => 'true']) !!}
    {!! $errors->first('relation_with_decease', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('name_of_deceased') ? 'has-error' : ''}}">
    {!! Form::label('name_of_deceased*', '', array('class' => '')) !!}
      {!! Form::text('name_of_deceased', null, ['class' => 'form-control input-sm', 'id' => 'name_of_deceased', 'placeholder' => 'Full Name of Deceased', 'autocomplete' => 'off', 'required' => 'true']) !!}
    {!! $errors->first('name_of_deceased', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('deceased_dob') ? 'has-error' : ''}}">
    {!! Form::label('deceased_dob*', 'Deceased DOB*', array('class' => '')) !!}
      {!! Form::text('deceased_dob', null, ['class' => 'form-control input-sm yearpicker', 'id' => 'deceased_dob', 'placeholder' => 'DOB of Deceased', 'autocomplete' => 'off', 'required' => 'true']) !!}
    {!! $errors->first('deceased_dob', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('deceased_date_of_death') ? 'has-error' : ''}}">
    {!! Form::label('deceased_date_of_death*', 'Deceased date of Death*', array('class' => '')) !!}
      {!! Form::text('deceased_date_of_death', null, ['class' => 'form-control input-sm yearpicker', 'id' => 'deceased_date_of_death', 'placeholder' => 'Date of Death of Deceased', 'autocomplete' => 'off', 'required' => 'true']) !!}
    {!! $errors->first('deceased_date_of_death', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('deceased_wedding_anniversary_date') ? 'has-error' : ''}}">
    {!! Form::label('deceased_wedding_anniversary_date', 'Deceased Anniversary Date', array('class' => '')) !!}
      {!! Form::text('deceased_wedding_anniversary_date', null, ['class' => 'form-control input-sm yearpicker', 'id' => 'deceased_wedding_anniversary_date', 'placeholder' => 'Deceased date of Anniversary', 'autocomplete' => 'off']) !!}
    {!! $errors->first('deceased_wedding_anniversary_date', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('other_significant_celebration') ? 'has-error' : ''}}">
    {!! Form::label('other_significant_celebration', '', array('class' => '')) !!}
      {!! Form::text('other_significant_celebration', null, ['class' => 'form-control input-sm', 'id' => 'other_significant_celebration', 'placeholder' => 'Other Significant Celebration', 'autocomplete' => 'off']) !!}
    {!! $errors->first('other_significant_celebration', '<span class="help-inline">:message</span>') !!}
  </div>


</div>
