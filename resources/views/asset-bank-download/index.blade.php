@extends('layouts.app')
@section('title', 'Asset Bank Photo Download')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @if(Session::has('message'))
			<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
		@endif
			<div class="panel panel-default">
				<div class="panel-heading clearfix">
					<h2 class="panel-title" style="padding-top:7.5px;">Asset Bank Photo Download</h2>
                </div>
                <div class="panel-body">
                	
                	@include('asset-bank-download.search')
					
                </div> <!-- .panel-body -->
            </div> <!-- .panel-default -->
        </div><!-- .col -->
    </div> <!-- .row -->
</div> <!-- .container -->
@endsection
@section('footer-scripts')
	
	
@endsection