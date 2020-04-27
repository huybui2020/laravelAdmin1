<div class="form-group{{ $errors->has('cateId') ? 'has-error' : ''}}">
    {!! Form::label('cateId', 'Category', ['class' => 'control-label']) !!}
    {!! Form::select('cateId', $cates, null, ['class' => 'form-control  col-md-6']) !!}
    {!! $errors->first('post_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('post_title') ? 'has-error' : ''}}">
    {!! Form::label('post_title', 'Post Title', ['class' => 'control-label']) !!}
    {!! Form::text('post_title', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('post_title', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('post_teaser') ? 'has-error' : ''}}">
    {!! Form::label('post_teaser', 'Post Teaser', ['class' => 'control-label']) !!}
    {!! Form::textarea('post_teaser', null, ['class' => 'form-control ckeditor', 'id' => 'post_teaser']) !!}
    {!! $errors->first('post_teaser', '<p class="help-block">:message</p>') !!}
</div>
<script>
    CKEDITOR.replace( 'post_teaser' );
  </script>
<div class="form-group{{ $errors->has('post_content') ? 'has-error' : ''}}">
    {!! Form::label('post_content', 'Post Content', ['class' => 'control-label']) !!}
    {!! Form::textarea('post_content', null, ['class' => 'form-control ckeditor', 'id' => 'post_content']) !!}
    {!! $errors->first('post_content', '<p class="help-block">:message</p>') !!}
</div>
<script>
    CKEDITOR.replace( 'post_content' );
  </script>
<div class="form-group{{ $errors->has('post_image') ? 'has-error' : ''}}">
    {!! Form::label('post_image', 'Post Image', ['class' => 'control-label']) !!}
    {!! Form::file('post_image', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('post_image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('post_image_desc') ? 'has-error' : ''}}">
    {!! Form::label('post_image_desc', 'Post Image Desc', ['class' => 'control-label']) !!}
    {!! Form::text('post_image_desc', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('post_image_desc', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="/ckeditor/ckeditor.js"></script>
