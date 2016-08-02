<div class="form-group">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    <input class="form-control" name="{{$name}}[]" type="url" id="{{$name}}" />
</div>