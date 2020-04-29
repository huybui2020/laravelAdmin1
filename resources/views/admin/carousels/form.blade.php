<div class="form-group{{ $errors->has('image_name') ? 'has-error' : ''}}">
    {!! Form::label('image_name', 'Image Name', ['class' => 'control-label']) !!}
    {!! Form::file('image_name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('image_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('active') ? 'has-error' : ''}}">
    {!! Form::label('active', 'Active', ['class' => 'control-label']) !!}
    <div class="checkbox">
    <label>{!! Form::radio('%1$s', '1') !!} Yes</label>
</div>
<div class="checkbox">
    <label>{!! Form::radio('%1$s', '0', true) !!} No</label>
</div>
    {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
