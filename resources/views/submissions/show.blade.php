@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
         @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                	<h2 class="panel-title pull-left" style="padding-top:7.5px;">Submissions</h2>
                	<div class="btn-group pull-right">
                		<a href="{{route('submissions.edit', ['school'=>$school->slug, 'id'=>$submission->id])}}" class="btn btn-sm btn-info">Edit</a>
                	</div>
                </div>

                <div class="panel-body">
                	<div class="row">
                		<div class="col-md-8">
			                <h3>{{$submission->title}}</h3>
				                {!! $submission->content !!}
                		</div>
                		<div class="col-md-4">	
							<h4>Supplementary Links</h4>
							{{$submission->links}}
							
							<h4>Photos</h4>
							<div class="row">
							
							@foreach ($submission->photos as $photo)
							<div class="col-md-6"><a target="_blank" href="{{$photo}}">
								<img src="{{$photo}}" class="img-responsive" />
							</a></div>
							@endforeach
							</div>			
							<h4>Author</h4>
							{{($submission->author->name)}}
                		</div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
