<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TwitterAPI;
use Thujohn\Twitter\Facades\Twitter;

class TwitterAccountsController extends Controller
{
	public function __construct() {
		$this->twitter = new TwitterAPI();
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($school)
    {
//	    $creds = Twitter::getCredentials(['include_email'=>'true']);
//		$creds = Twitter::get("users/show", ["screen_name"=>"cranleighprep"]);
//	    dump($creds);
		//return Twitter::getMentionsTimeline(['count' => 20, 'format' => 'json']);
		$accounts = \App\TwitterAccounts::all();
        return view("twitteraccounts.index", ['accounts'=>$accounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($school)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    }
}
