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
                    			<div class="panel-heading">Staff Biographies</div>
                    			<div class="panel-body">
                    				<p>Manage the staff biographies to syncronise to iSAMS and the Website.</p>
                    				<a href="/staff-biographies" class="btn btn-sm btn-primary pull-right btn-block">Visit</a>
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
                    				<a href="/hero-manager" class="btn btn-sm btn-default btn-block">Coming Soon</a>
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
