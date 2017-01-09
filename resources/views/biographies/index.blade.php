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
					<h2 class="panel-title pull-left" style="padding-top:7.5px;">Staff Biographies</h2>
                	<div class="btn-group pull-right">
                	<a href="{{route('staff-biographies.create', ['school'=>'cranleigh'])}}" class="btn btn-sm btn-success">Add New</a>
                	</div>
                </div>
                <div class="panel-body">
                
                	<table class="table table-hover table-condensed">
                		<thead>
                			<th>User</th>
                			<th>Biography</th>
                			<th><i class="fa fa-fw fa-circle-o"></i><span class="sr-only">Status</span></th>
                			<th>Last Updated</th>
                			<th>Updated By</th>
                		</thead>
                    @foreach($biographies as $account)
                    	<tbody>
                    		<tr>
                    			<td>
                    				<a href="{{route('staff-biographies.edit', ['school'=>get_domain(), 'id'=>$account->id])}}">{{strtoupper($account->username)}}</a>
								</td>
								<td>{{substr(strip_tags($account->biography), 0, 70)}}</td>
								<td>{!!$account->get_status()!!}</td>
                    			<td>{{$account->updated_at}}</td>
                    			<td>{{$account->updater_user['name']}}</td>
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
@section('footer-scripts')
	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery('[data-toggle="tooltip"]').tooltip();
		});
	</script>
@endsection