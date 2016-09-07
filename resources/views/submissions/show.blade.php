@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
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
							<ul>
							<li>{{$submission->photo_one}}</li>
							<li>{{$submission->photo_two}}</li>
							<li>{{$submission->photo_three}}</li>
							</ul>			
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
