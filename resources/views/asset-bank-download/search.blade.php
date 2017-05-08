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