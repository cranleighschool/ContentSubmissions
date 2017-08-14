@extends('layouts.app')
@section('title', 'Staff Biographies')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        @if(Session::has('message'))
			<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
		@endif
			<div class="panel panel-default">
				<div class="panel-heading clearfix">
				<div class="btn-group pull-right">
                	<a href="{{route('staff-biographies.create', ['school'=>'cranleigh'])}}" class="btn btn-sm btn-success">Add New</a>
                </div>
				
				<h2 class="panel-title" style="padding-top:7.5px;">Staff Biographies</h2>

                	
                </div>
                <div class="panel-body">
					<span class="label label-info">{{count($biographies)}} Biographies</span>

                	<table class="table table-hover table-condensed">
                		<thead>
                			<th>User</th>
							<th>Deleted At</th>
							<th>#</th>
                		</thead>
                		<tbody>
                    @foreach($biographies->sortByDesc("updated_at") as $account)
                    		<tr>
                    			<td>
                    				<a href="{{route('staff-biographies.edit', ['school'=>get_domain(), 'id'=>$account->id])}}">{{strtoupper($account->username)}}</a>
								</td>
								<td>{{$account->deleted_at}}</td>
								<td>
									<a href="{{route('staff-biographies.restore', ["id" => $account, "school" => get_domain()])}}" onclick="event.preventDefault(); document.getElementById('restore_id_{{$account->id}}').submit();" class="btn btn-xs btn-danger">Restore</a>
									<form id="restore_id_{{$account->id}}" action="{{route('staff-biographies.restore', ["id" => $account, "school" => get_domain()])}}" method="POST" style="display: none;">
										{{csrf_field()}}
										<input type="hidden" name="account_id" value="{{$account->id}}" />
										<input type="submit" value="restore" style="display: none;">
									</form>
								</td>
                    		</tr>
                    @endforeach
                		</tbody>
                	</table>
                </div> <!-- .panel-body -->
            </div> <!-- .panel-default -->
        </div><!-- .col -->
    </div> <!-- .row -->
</div> <!-- .container -->
@endsection
@section('footer-scripts')
	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery('[data-toggle="tooltip"]').tooltip();
		});
	</script>
@endsection