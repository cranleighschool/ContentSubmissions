<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;


class BiographiesController extends Controller
{
	public $allowed_users = ['JRC', 'FRB', 'LAC'];
	public function __construct()
    {
        //	var_dump(\Route::current()->parameters());
        
        $this->middleware('auth');

}
	
	public function search($school, $username){
		try {
			$person = \App\StaffBiographies::where('username', $username)->firstOrFail();
			$id = $person->id;
			return redirect(route('staff-biographies.edit', ['school'=>$school, 'id'=>$id]));
		} catch(Exception $e) {
			\Request::session()->flash("message", "That User's Biography could not be found.");
			return redirect(route('staff-biographies.index', ['school'=>$school]));
		}
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($school)
    {
        $biographies = \App\StaffBiographies::all();
        return view("biographies.index", ['biographies'=>$biographies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($school)
    {
	    
        if (!in_array(strtoupper(\Auth::user()->email), $this->allowed_users))
	        abort(403);
	        
	        
        return view("biographies.create", ['school'=>$school]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $school)
    {
        //
        Validator::extend('without_spaces', function($attr, $value){
	        return preg_match('/^\S*$/u', $value);
        });
        
        $validator = Validator::make($request->all(), $this->rules());
        if ($validator->fails()) {
            return \Redirect::back()->withErrors($validator)->withInput();
        }

		$bio = new \App\StaffBiographies;
		$bio->username = $request->username;
		$bio->biography = $request->biography;
		$bio->save();
		
		\Request::session()->flash("message", "Biography has been added for: &quot;".$request->username."&quot;.");
		return redirect(route('staff-biographies.index', ['school'=>$school]));
    }
    
    protected function rules()
    {
        return [
            'biography' => 'required',
            'username' => 'required|alpha|unique:staff_biographies,username',
        ];
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
        return redirect(route('staff-biographies.edit', ['school'=>$school, 'id'=>$id]));
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
        $bio = \App\StaffBiographies::findOrFail($id);
        return view("biographies.edit", ['user'=>$bio]);

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
	    if (!in_array(strtoupper(\Auth::user()->email), $this->allowed_users))
	        abort(403);
	        
		$bio = \App\StaffBiographies::findOrFail($id);
		$bio->biography = $request->biography;
		$bio->save();

        \Request::session()->flash("message", "Updated: ".$request->username."'s Biography");

        return redirect(route('staff-biographies.edit', ['school'=>$school, 'id' => $id]));

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
    }
}
