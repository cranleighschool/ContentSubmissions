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
								</dl>
								<div class="row">
									<div class="col-sm-6">
										<a class="btn btn-sm btn-success" href="{{$output->photo}}/800" target="_blank">Download Website Quality Photo</a>
									</div>
									<div class="col-sm-6">
										<a class="btn btn-sm btn-info" href="{{$output->photo}}/2880" target="_blank">Download Hero Image Quality Photo</a>
									</div>
								</div>
								</dl>
							</div>
                		</div>
                		
                	@else
                		<div class="alert alert-{{$panel}}"
                		@if ($output->code==403)
	                		<p><strong>Error 403: {{$output->error}}</strong></p>
							<p class="text-danger">The image you were trying to access is not accessible due to rules from the Asset Bank API. This normally means that the image isn't marked as "Suitable for Publication" or doesn't meet website quality criteria in some other way. This is all a work in progress and if you feel something is wrong please email: <a href="mailto:frb@cranleigh.org">frb@cranleigh.org</a>.</p>                		

                		@elseif ($output->code==404)
	                		<p class="text-danger">The asset ID you were searching for could not be found. Please ensure you are typing it correctly. If this error persists, double check on Asset Bank then report the error to <a href="mailto:frb@cranleigh.org">frb@cranleigh.org</a>.</p>                		
                		@else
                    		<p class="text-danger">Unknown Error: {{$output->code}}. Please report this to <a href="mailto:frb@cranleigh.org">frb@cranleigh.org</a>.</p>            		
                		@endif
						</div>
                	@endif
                	<hr />
                	<h3>Go again?</h3>
					@include('asset-bank-download.search')
					
                </div> <!-- .panel-body -->
            </div> <!-- .panel-default -->
        </div><!-- .col -->
    </div> <!-- .row -->
</div> <!-- .container -->
@endsection
@section('footer-scripts')
	
	
@endsection