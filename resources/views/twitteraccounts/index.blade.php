@extends('layouts.app')
@section('title', 'List Submissions')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
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
                	<div class="table-responsive">
	                	<table class="table table-hover table-condensed">
	                		<thead>
	                			<th>Username</th>
	                			<th>Owner</th>
	                			<th>Followers</th>
	                			<th>Date Created</th>
	                		</thead>
	                    @foreach($accounts as $account)
	                    	<tbody>
	                    		<tr>
	
	                    			<td>
	                    				<a href="{{route('twitter.edit', ['school'=>get_domain(), 'twitter'=>$account->id])}}">{{$account->atname}}</a>
									</td>
									<td>{{$account->owner}}</td>
									<td>{{$account->latestfollower['followers']}}</td>
	                    			<td>{{($account->twitter->description)}}</td>
	                    		</tr>
	                    	</tbody>
	                    @endforeach
	                	</table>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
