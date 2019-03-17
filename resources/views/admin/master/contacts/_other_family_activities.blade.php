<div class="col-md-12">
  <div class="form-group {{ $errors->has('activity') ? 'has-error' : ''}}">
    {!! Form::label('activity', '', array('class' => '')) !!}
    {!! Form::text('activities[]', $activity, ['class' => 'form-control input-sm', 'id' => 'activity', 'placeholder' => 'Activity', 'autocomplete' => 'off']) !!}
    {!! $errors->first('activity', '<span class="help-inline">:message</span>') !!}
  </div>
</div>
