@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Submission: &quot;{{$submission->title}}&quot;</div>

                <div class="panel-body">
	                {{ Form::open(array('files'=>true,'method'=>'PUT', 'route'=>array('submissions.update', $school->slug, $submission->id)))}}
					{{ Form::hidden('user', $submission->user) }}
	                {{ Form::hidden('school', $submission->school) }}
	                {{ Form::bsText('title', $submission->title) }}
	                {{ Form::wysiwyg('content', $submission->content, array("class"=>"wysiwyg form-control")) }}
	              
	                {{ Form::bsTextarea('links', $submission->links, array('rows'=>3), "Any website URLs to supplement your story? Or where I can find more information? Please write one link per line.") }}
	              
	                <h3>Photos</h3>
                <p class="text-danger">Unfortuneately this application currently doesn't allow you to edit your photo uploads. However the photo(s) you uploaded when you created this item are shown below.</p>
                <div class="row">
                	<div class="col-md-12">
                		<div class="row">
                	@foreach ($submission->photos as $photo)
					<div class="col-md-4">
						<a target="_blank" href="{{$photo}}">
							<img src="{{$photo}}" class="img-responsive" />
						</a>
					</div>
					@endforeach
                		</div>
                	</div><br />&nbsp;<br />{{--
                	<div class="col-md-12">
						<div class="form-group{{ $errors->has('photos') ? ' has-error' : '' }}">
						    <input id="photos" type="file" multiple="multiple" value="{{ old('photos') }}" class="form-control" name="photos[]">

                                @if ($errors->has('photos'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photos') }}</strong>
                                    </span>
                                @endif
						</div>
                	</div> --}}
                </div>
                <div class="row">
                <div class="col-md-12">
	                {{ Form::submit('Update', array('class'=>'btn btn-primary'))}}
                </div>
                </div>
	                {{ Form::close() }}
	    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
