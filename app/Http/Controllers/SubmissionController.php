<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Input;
use Validator;
use App\Submissions;
use App\Schools;

class SubmissionController extends Controller
{
	protected $school = false;
	public function __construct() {
		//	var_dump(\Route::current()->parameters());
		
		$this->middleware('auth');

		$this->get_school(\Route::current()->parameters()['school']);
		if ($this->school == false):
			abort(404);
		endif;
	}
	
	protected function get_school($school) {
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
        

		return view('submissions/list', ['school'=>$this->school, 'submissions'=>Submissions::where('school', $this->school->id)->get()]);

    }

	public function errors($array) {
		return response()->json($array, 400);
	}
	
	protected function rules() {
		return array(
			'photo_one' => 'required|image',
			'photo_two' => 'required|image',
			'photo_three' => 'required|image',
			'title' => 'required',
			'links' => 'required',
			'content' => 'required',
		);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = Input::file('photo_one');
     
        
        $validator = Validator::make($request->all(), $this->rules());
        if ($validator->fails()) {
	        return \Redirect::back()->withErrors($validator)->withInput();
        }
        $destinationPath = \Storage::disk('public');
		$images = array();
		$images['one'] = $request->photo_one;
		$images['two'] = $request->photo_two;
		$images['three'] = $request->photo_three;
		$s_images = array(); // ready for the new array
		foreach ($images as $key => $image):
			$time = time();
			$filename = 'user_'.$request->user.'/'.time().'/'.sha1($key).'_'.$image->getClientOriginalName();
			$s_images[] = $filename;
//			$request->{"photo_".$key} = $filename;
			$destinationPath->put($filename, file_get_contents($image->getRealPath()));
			unset($request->{"photo_".$key});
		endforeach;
		$request->except(['photo_one']);
		
	
		$request->photos = serialize($s_images);
		$submission = new Submissions();
					
		$save = $submission->create($request->all());
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
        $submissions = Submissions::where([
        	['id', '=' ,$id],
        	['school', '=', $this->school->id]
        ])->firstOrFail();

        $submissions->author = \App\User::find($submissions->user);
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
        $submissions = Submissions::where([
        	['id', '=' ,$id],
        	['school', '=', $this->school->id]
        ])->firstOrFail();

        return view('submissions/edit', ['school'=>$this->school, 'submission'=>$submissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($school, $id)
    {
        //
        
        $entry = Submissions::find($id);
        $entry->delete();
		\Request::session()->flash("message", "Deleted: &quot;".$entry->title."&quot;");

		return redirect(route('{school}.submissions.index', ['school'=>$this->school->slug]));

        
    }
}
