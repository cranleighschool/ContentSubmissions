@extends('layouts.app')
@section('title', 'List Submissions')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        @if(Session::has('message'))
			<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
		@endif
			    
                	<div class="alert alert-info text-center">
                		<p>A biography for that user doesn't exist... yet!</p>
                		<p><a class="btn btn-info btn-lg" href="{{route('staff-biographies.create', ['school'=>'cranleigh'])}}">Add Now</a></p>
                	</div>
            
        </div>
    </div>
</div>
@endsection
