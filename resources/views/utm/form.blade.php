<form>
    <div class="form-group input-group-lg">
        <label for="url">URL to Share:</label>
        <input type="text" name="url" class="form-control" id="url">
        <p class="help-block">The URL of the site you are wanting to share...</p>
    </div>
    <div class="form-group input-group-lg">
        <label for="source">Source:</label>
        <select name="source" class="form-control">
            <option value="">--- Select ---</option>
            @foreach(\App\Http\Controllers\UTMController::getSources() as $source)
                <option value="{{$source}}">{{$source}}</option>
            @endforeach
        </select>
        <p class="help-block">Select a source, where are is the link being placed?</p>

    </div>
    <div class="form-group input-group-lg">
        <label for="medium">Medium:</label>
        <input type="text" name="medium" class="form-control" id="medium">
        <p class="help-block">The Marketing medium (e.g. <code>cpc</code>,<code>banner</code>,<code>email</code>)</p>
    </div>
    <div class="form-group input-group-lg">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control" id="name">
        <p class="help-block">Product, promo code, slogan (e.g. <code>post_open_day_follow_up</code>)</p>
    </div>
    <div class="toggle-content" style="display: none;">
        <div class="form-group input-group-lg">
            <label for="Term">Term:</label>
            <input type="text" name="term" class="form-control" id="term">
        </div>
        <div class="form-group input-group-lg">
            <label for="content">Content:</label>
            <input type="text" name="content" class="form-control" id="content">
        </div>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
<hr />

<textarea style="background:#f7ecb5;" class="form-control input-group-lg" id="copyLink"></textarea>