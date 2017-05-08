@extends('layouts.app')
@section('title', 'Asset Bank Photo Download')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @if(Session::has('message'))
			<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
		@endif
			<div class="panel panel-{{$panel}}">
				<div class="panel-heading clearfix">
					<h2 class="panel-title" style="padding-top:7.5px;">Asset Bank Photo Download</h2>
                </div>
                <div class="panel-body">
                	

                	@if ($output->code == 200)
                		<h2>{{$output->title}}</h2>
                		<div class="row">
                			<div class="col-md-4">
	                			<img src="{{$output->photo}}/400" class="img-responsive" />
							</div>
							<div class="col-md-8">
								<dl class="dl-horizontal">
									<dt>Description</dt>
									<dd>{{$output->description}}</dd>
									<dt>Photographer</dt>
									<dd>{{$output->photographer}}</dd>
									<dt>Tags</dt>
									<dd><span class="label label-default">{!! implode($output->tags, "</span> <span class=\"label label-default\">") !!}</span></dd>
									<dt>Download</dt>
									<dd><a href="{{$output->photo}}/800" target="_blank">Website Quality Photo</a></dd>
									<dt>Hero Download</dt>
									<dd><a href="{{$output->photo}}/2880" target="_blank">Hero Image Quality Photo</a></dd>
								</dl>
							</div>
                		</div>
                		
                	@else
                		@if ($output->code==404)
	                		<p class="text-danger">The asset ID you were searching for could not be found. Please ensure you are typing it correctly. If this error persists, double check on Asset Bank then report the error to <a href="mailto:frb@cranleigh.org">frb@cranleigh.org</a>.</p>                		
                		@else
                    		<p class="text-danger">Unknown Error: {{$output->code}}. Please report this to <a href="mailto:frb@cranleigh.org">frb@cranleigh.org</a>.</p>            		
                		@endif

                	@endif
                	<hr />
                	<h3>Go again?</h3>
					<form class="form-inline" method="post" name="asset-bank-download-form" id="asset-bank-download-form">
					    {{ csrf_field() }}

						<div class="form-group form-group-lg">
							<label class="col-sm-12 control-label" for="asset-bank-id">Asset Bank ID</label>
							<div class="col-sm-12">
								<input type="text" name="asset-bank-id" id="asset-bank-id" class="form-control" />
								<button type="submit" form="asset-bank-download-form" class="btn btn-primary btn-lg" value="Download">Download</button>
							</div>
						</div>

					</form>
					
                </div> <!-- .panel-body -->
            </div> <!-- .panel-default -->
        </div><!-- .col -->
    </div> <!-- .row -->
</div> <!-- .container -->
@endsection
@section('footer-scripts')
	
	
@endsection