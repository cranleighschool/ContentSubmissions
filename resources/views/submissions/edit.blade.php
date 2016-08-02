@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Submission: &quot;{{$submission->title}}&quot;</div>

                <div class="panel-body">
	                {{ Form::open(array('files'=>true,'method'=>'PUT', 'route'=>array('{school}.submissions.update', $school->slug, $submission->id)))}}
					{{ Form::hidden('user', $submission->user) }}
	                {{ Form::hidden('school', $submission->school) }}
	                {{ Form::bsText('title', $submission->title) }}
	                {{ Form::wysiwyg('content', $submission->content, array("class"=>"wysiwyg form-control")) }}
	              
	                {{ Form::bsTextarea('links', $submission->links, array('rows'=>3), "Any website URLs to supplement your story? Or where I can find more information? Please write one link per line.") }}
	              
	                <h3>Photos</h3>
	                <p class="help-block">Please upload three photos to supplement your story. Please upload large, photos. (Photos less than 300px wide are too small!)</p>
	                <div class="row">
	                	<div class="col-md-4">
	                		{{ Form::bsFile('photo_one', null, array(), "Upload a Photo") }}
	                	</div>
	                	<div class="col-md-4">
							{{ Form::bsFile('photo_two', null, array(), "Upload a Photo") }}
	                	</div>
	                	<div class="col-md-4">
							{{ Form::bsFile('photo_three', null, array(), "Upload a Photo") }}
	                	</div>
	                </div>
	                {{ Form::submit('Update', array('class'=>'btn btn-primary'))}}
	
	                {{ Form::close() }}
	    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
