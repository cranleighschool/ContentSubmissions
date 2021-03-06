@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="row">
                    	<div class="col-md-4">
                    		<div class="panel panel-primary">
                    			<div class="panel-heading">Staff Bios &amp; Photos</div>
                    			<div class="panel-body">
                    				<p>Manage the staff biographies and photographs that sync to the Website.</p>
                    				<a href="https://people.cranleigh.org/" class="btn btn-sm btn-primary pull-right btn-block">Cranleigh People Manager</a>
                    			</div>
                    		</div>
                    	</div>
                    	<div class="col-md-4">
                    		<div class="panel panel-warning">
                    			<div class="panel-heading">Twitter Accounts</div>
                    			<div class="panel-body">
                    				<p>Twitter accounts management - <em>work in progress</em></p>
									<a href="#" class="btn btn-sm btn-warning pull-right btn-block">Don't Visit Yet</a>
                    			</div>
                    		</div>
                    	</div>
                    	<div class="col-md-4">
                    		<div class="panel panel-primary">
                    			<div class="panel-heading">Create Website Hero Images</div>
                    			<div class="panel-body">
                    				<p>Step by Step Instructions on how to create a hero image</p>
                    				<a href="/hero-manager" class="btn btn-sm btn-primary btn-block">Visit</a>
                    			</div>
                    		</div>
                    	</div>
					</div>
					<div class="row">
	                    <div class="col-md-4">
	                    	<div class="panel panel-success">
	                    		<div class="panel-heading">Web Friendly Asset Bank Photos</div>
	                    		<div class="panel-body">
	                    			<p>A simple form that will download you an Asset Bank photo using the Asset Bank ID. Meaning you don't have to log into Asset Bank itself!</p>
									<a href="/asset-bank-download" class="btn btn-sm btn-primary btn-block">Save me time</a>
	                    		</div>
	                    	</div>
	                    </div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
