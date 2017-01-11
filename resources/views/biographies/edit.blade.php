@extends('layouts.app')
@section('title', "Edit Biography")
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
                
                	<h3>Username: {{strtoupper($user->username)}}</h3>
                	<div class="well well-sm show-biography">{!!$user->biography!!}</div>
                	<button class="btn btn-lg btn-info" id="edit-link">Edit Biography</button>
                	<div id="editBox" style="display:none;">
						{{ Form::open(array('files'=>false,'method'=>'PUT', 'route'=>array('staff-biographies.update','cranleigh', $user->id)))}}
						{{ Form::hidden('username', $user->username) }}
						{{ Form::wysiwyg('biography', $user->biography, array("class"=>"wysiwyg form-control")) }}
						{{ Form::submit('Update', array('class'=>'btn btn-lg btn-primary'))}}
						{{ Form::close() }}
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer-scripts')
	<script type="text/javascript">
		jQuery("#edit-link").click(function() {
			$(this).slideUp();
			$("#editBox").slideDown();
		});
	</script>
@endsection