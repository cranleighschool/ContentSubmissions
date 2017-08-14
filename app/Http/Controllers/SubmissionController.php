<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Input;
use Validator;
use App\Submissions;
use App\Schools;
use Imageupload;
use Illuminate\Support\Facades\Log;

class SubmissionController extends Controller
{
    protected $school = false;
    protected $filenames = array();
    public function __construct()
    {
        //	var_dump(\Route::current()->parameters());
        
        $this->middleware('auth');

//        $this->get_school(\Route::current()->parameters()['school']);
//        if ($this->school == false) :
//            abort(404);
//        endif;
    }
    
    protected function get_school($school)
    {
	    // Perhaps try this with whereStrict() instead of where() and see what happens?
        $find_school = Schools::where('slug', $school)->first();
        $this->school = $find_school;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($school)
    {
        
	    // Perhaps try this with whereStrict() instead of where() and see what happens?
        return view('submissions/list', ['school'=>$this->school, 'submissions'=>Submissions::where('school', $this->school->id)->get()]);
    }

    public function errors($array)
    {
        return response()->json($array, 400);
    }
    
    protected function rules()
    {
        return [
	    //    'photos' => 'required|image',
//            'photo_one' => 'required|image',
  //          'photo_two' => 'required|image',
    //        'photo_three' => 'required|image',
            'title' => 'required',
            'links' => 'required',
            'content' => 'required',
        ];
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($school)
    {
        //
        return view('submissions/create', ['school'=>$this->school]);
    }

	protected function multiple_upload() {
		$files = Input::file("photos");
		$file_count = count($files);
		
		$uploadcount = 0;

		foreach($files as $file):
			$rules = array("file" => "required|mimes:png,gif,jpeg");
			$validator = Validator::make(array('file'=>$file),$rules);
			if($validator->passes()) {
				$result = Imageupload::upload($file, $file->getClientOriginalName()."_".sha1(time()), $this->school->slug);
				$filepath = explode(public_path(), $result['original_filepath']);
				Log::info($filepath);
				$this->filenames[] = $filepath[1];
				$uploadcount++;
			}
		endforeach;
		if ($uploadcount==$file_count) {
			\Session::flash('success', $uploadcount." files uploaded successfully.");
		}
	}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$image = Input::file('photo_one');
		$this->multiple_upload();
      
        $validator = Validator::make($request->all(), $this->rules());
        if ($validator->fails()) {
            return \Redirect::back()->withErrors($validator)->withInput();
        }

        $submission = new Submissions();

		Input::merge(array("photos"=>"test_value"));


        $save = $submission->create($request->except('photos'));
        Log::info($save);
		$edit = Submissions::find($save->id);
		$edit->photos = serialize($this->filenames);
		$edit->save();
        $request->session()->flash("message", "New Submission Submitted!");
        return redirect(route('submissions.index', ['school'=>$this->school->slug]));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($school, $id)
    {

        //
        	    // Perhaps try this with whereStrict() instead of where() and see what happens?
        $submissions = Submissions::where([
            ['id', '=' ,$id],
            ['school', '=', $this->school->id]
        ])->firstOrFail();

        $submissions->author = \App\User::find($submissions->user);
        $submissions->photos = unserialize($submissions->photos);
        return view('submissions/show', ['school'=>$this->school, 'submission'=>$submissions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($school, $id)
    { 
        //
        	    // Perhaps try this with whereStrict() instead of where() and see what happens?
        $submissions = Submissions::where([
            ['id', '=' ,$id],
            ['school', '=', $this->school->id]
        ])->firstOrFail();
        $submissions->photos = unserialize($submissions->photos);

        return view('submissions/edit', ['school'=>$this->school, 'submission'=>$submissions]);
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $school, $id)
    {
        $submission = Submissions::find($id);
        $submission->title = $request->title;
        $submission->content = $request->content;
        $submission->links = $request->links;
        $submission->save();

        \Request::session()->flash("message", "Updated: &quot;".$submission->title."&quot;");

        return redirect(route('submissions.show', ['school'=>$this->school->slug, 'submission' => $submission]));
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($school, $id)
    {
        $entry = Submissions::find($id);
        $entry->delete();
        \Request::session()->flash("message", "Deleted: &quot;".$entry->title."&quot;");

        return redirect(route('submissions.index', ['school'=>$this->school->slug]));
    }
}
