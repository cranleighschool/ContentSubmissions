@extends('layouts.app')
@section('title', 'List Submissions')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        @if(Session::has('message'))
			<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
		@endif
			<div class="panel panel-default">
				<div class="panel-heading clearfix">
					<h2 class="panel-title pull-left" style="padding-top:7.5px;">Twitter Accounts</h2>
                	<div class="btn-group pull-right">
                	{{--	<a href="{{route('submissions.create', ['school'=>$school->slug])}}" class="btn btn-sm btn-success">Add New</a> --}}
                	</div>
                </div>
                <div class="panel-body">
                
                	<table class="table table-hover table-condensed">
                		<thead>
                			<th>Title</th>
                			<th>Date Created</th>
                		</thead>
                    @foreach($accounts as $account)
                    	<tbody>
                    		<tr>

                    			<td>
                    				<a href="{{route('twitter.edit', ['school'=>get_domain(), 'twitter'=>$account->id])}}">{{$account->screen_name}}</a>
								</td>
                    			<td>{{$account->updated_at}}</td>
                    		</tr>
                    	</tbody>
                    @endforeach
                	</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
