<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
  {!! Form::label('name', '', array('class' => '')) !!}
    {!! Form::text('name', null, ['class' => 'form-control input-sm', 'id' => 'name', 'placeholder' => 'Full Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
  {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
  {!! Form::label('email', '', array('class' => '')) !!}
    {!! Form::email('email', null, ['class' => 'form-control input-sm', 'id' => 'name', 'placeholder' => 'Email', 'autocomplete' => 'off', 'required' => 'true']) !!}
  {!! $errors->first('email', '<span class="help-inline">:message</span>') !!}
</div>
