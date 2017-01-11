@extends('layouts.app')
@section('title', 'Add New Biography')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        @if(Session::has('message'))
			<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
		@endif
			<div class="panel panel-default">
				<div class="panel-heading clearfix">
					<h2 class="panel-title pull-left" style="padding-top:7.5px;">Staff Biographies</h2>
                	<div class="btn-group pull-right">
                		<a href="{{route('staff-biographies.index', ['school'=>'cranleigh'])}}" class="btn btn-sm btn-success">Back to List</a>
                	</div>
                </div>
                <div class="panel-body">
                
                	<h3>New Biography</h3>
                	<div id="createBox">
						{{ Form::open(array('files'=>false, 'route'=>array('staff-biographies.store','cranleigh')))}}
						{{ Form::bsText('username', null, ["description"=>"Please ensure this is the user's username. No spaces or special characters."]) }}
						{{ Form::wysiwyg('biography', '', array("class"=>"wysiwyg form-control")) }}
						{{ Form::submit('Create', array('class'=>'btn btn-lg btn-primary'))}}
						{{ Form::close() }}
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer-scripts')
@endsection