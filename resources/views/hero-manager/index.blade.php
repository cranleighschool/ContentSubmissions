@extends('layouts.app')

@section('content')
<div class="hero" style="background-image: url('https://frbdev.cranleigh.org/wp-content/uploads/2016/05/2880-2880x999.jpeg');" data-hero-large-url="https://frbdev.cranleigh.org/wp-content/uploads/2016/05/2880-1600x555.jpeg" data-hero-xl-url="https://frbdev.cranleigh.org/wp-content/uploads/2016/05/2880-2048x710.jpeg" data-hero-huge-url="https://frbdev.cranleigh.org/wp-content/uploads/2016/05/2880-2880x999.jpeg"></div>                

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Hero Manager</div>
				
				
				<div class="panel-body">
					<h3>Dimensions</h3>
					<ul>
						<li>The dimensions for the main hero images are <code>2880px X 999px</code></li>
						<li>The dimensions for the slim hero images (used on Department pages) are <code>?px X ?px</code></li>
					</ul>
					<h3>Using Photoshop</h3>
					<p>Please use Photoshop to crop the image in the right place and export to the exact dimensions listed above. <em class="text-danger">We don't want to upload 5000px photos to the website!</em></p>
					<h4>Tips for Cropping</h4>
					<p>Crop the photo so that the main subject of the image is in the dead centre of your crop. The website (on some screen sizes) will not show content at the top and bottom or left and right.</p>
					<div class="well well-sm"><center>
					<h3>Test an Image Out</h3>
					<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#test-image">Launch Hero Tester</button></center></div>
					<div class="modal fade" id="test-image" tabindex="-1" role="dialog">
						<div class="modal-dialog" role="document">
															<form method="post" action="{{route('insitupost', ['cranleigh'])}}" class="form-inline" target="_blank"  enctype="multipart/form-data">

							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title">Test a Hero Image</h4>
									</div>
								<div class="modal-body">
									<p>There's a couple of options here depending on what data you have to hand...</p>
										{{ csrf_field() }}
										<div class="row">
											<div class="col-sm-12">
																				<h4>1. Know the AssetBank Number?</h4>
									<p>You can use the Asset Bank API to get the image you want, without having to touch Asset Bank - if you already know the Asset Bank ID of the photo you require!</p>

										<div class="form-group">
											<label class="sr-only" for="asset-bank-id">Asset Bank ID</label>
											<input type="number" class="form-control" name="asset-bank-id" id="asset-bank-id" placeholder="Asset Bank ID" />
										</div>
											</div>
											<div class="col-sm-12">
												<h4>2. From an external URL</h4>
									<p>If you have an external URL somewhere else on the internet that you want to test as a Hero Image, pop in the full url here.</p>

										<div class="form-group">
											<label class="sr-only" for="url">URL</label>
											<input type="url" class="form-control" name="url" id="url" placeholder="Full url" />
										</div>
											</div>
											<div class="col-sm-12">
												<h4>3. Upload an image</h4>
									<p>If you have an image on yoru computer, you can upload it here to test what it would look like as a Hero Image</p>

										<div class="form-group">
											<label class="sr-only" for="photo">File</label>
											<input type="file" class="form-control" name="photo" id="photo" placeholder="Image File" />
										</div>
											</div>
										</div>
										<hr />
										<p>Would you like to test against the normal sized Hero or the slim sized version?<br /><small>The Slim Sized one is used on Department pages and sports pages, the large one is largely (pun intended) used everywhere else!</small></p>
										<div class="form-group">
											<label class="sr-only" for="hero_type">Hero Type</label>
											<select class="form-control" name="hero_type" id="hero_type" placeholder="Asset Bank ID">
												<option value="normal">Normal</option>
												<option value="slim">Slim</option>
											</select>
										</div>
										
										
								</div>
								<div class="modal-footer">
										
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Show as Hero Image</button>
								</div>
							</div><!-- /.modal-content -->
															</form>
						</div><!-- /.modal-dialog -->
						
					</div><!-- /.modal -->
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
