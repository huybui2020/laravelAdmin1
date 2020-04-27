<div class="form-group{{ $errors->has('image_name') ? 'has-error' : ''}}">
    {!! Form::label('image_name', 'Image Name', ['class' => 'control-label']) !!}
    {!! Form::file('image_name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('image_name', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
