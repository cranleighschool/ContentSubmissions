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
					<h3>Know the AssetBank Number?</h3>
					<p>You can use the Asset Bank API to get the image you want, without having to touch Asset Bank - if you already know the Asset Bank ID of the photo you require!</p>
					<form method="post" class="form-inline" target="_blank">
						{{ csrf_field() }}
						<div class="form-group">
							<label class="sr-only" for="asset-bank-id">Asset Bank ID</label>
							<input type="number" class="form-control" name="asset-bank-id" id="asset-bank-id" placeholder="Asset Bank ID" />
						</div>
						<input value="Show Photo" type="submit" class="btn btn-primary" />
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
