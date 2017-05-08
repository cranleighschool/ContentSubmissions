<p>Just pop in the Asset Bank ID number that you would like to find, and hit &quot;Search&quot;.</p>
<form class="form-inline" method="post" name="asset-bank-download-form" id="asset-bank-download-form">
    {{ csrf_field() }}

	<div class="form-group form-group-lg">
		<label class="col-sm-12 control-label" for="asset-bank-id">Asset Bank ID</label>
		<div class="col-sm-12">
			<input type="text" name="asset-bank-id" id="asset-bank-id" class="form-control" />
			<button type="submit" form="asset-bank-download-form" class="btn btn-primary btn-lg" value="Search">Search</button>
		</div>
	</div>

</form>