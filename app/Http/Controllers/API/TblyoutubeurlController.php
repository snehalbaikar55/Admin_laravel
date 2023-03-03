<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tblyoutubeurl;
use DB;

class TblyoutubeurlController extends Controller
{
    public function index()
    {
        $tblyoutubeurl = Tblyoutubeurl::all();
		return response()->json($tblyoutubeurl);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newTblyoutubeurl = new Tblyoutubeurl([
			//'slug' => $request->get('slug'),
			'PropertyID' => $request->get('PropertyID'),
            'youtubeURL' => $request->get('youtubeURL'),
            'ListingDate' => $request->get('ListingDate'),
            'updatedby' => $request->get('updatedby'),
            'updationDate' => $request->get('updationDate')
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
			//'slug' => 'required',
			'PropertyID' => '',
            'youtubeURL' => 'required',
            'ListingDate' => '',
            'updatedby' => '',
            'updationDate' => ''
		]);

		$newTblyoutubeurl = new Tblyoutubeurl([
			//'slug' => $request->get('slug'),
			'PropertyID' => $request->get('PropertyID'),
            'youtubeURL' => $request->get('youtubeURL'),
            'ListingDate' => $request->get('ListingDate'),
            'updatedby' => $request->get('updatedby'),
            'updationDate' => $request->get('updationDate')
		]);

		$newTblyoutubeurl->save();

		return response()->json($newTblyoutubeurl);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID)
    {
        // $tblyoutubeurl = Tblyoutubeurl::findOrFail($ID);
		// return response()->json($tblyoutubeurl);

        $tblyoutubeurl =  DB::table('tblyoutubeurl')->whereIn('PropertyID', [$ID])->get();
		return response()->json($tblyoutubeurl);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ID)
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
    public function update(Request $request, $ID)
    {
        // $Leads = Leads::findOrFail($id);

		// $request->validate([
		// 	'slug' => 'slug',
		// 	'teamname' => 'teamname'
		// ]);

		// $Leads->slug = $request->get('slug');
		// $Leads->teamname = $request->get('teamname');

		// $Leads->save();

		// return response()->json($Leads);

        $tblyoutubeurl = Tblyoutubeurl::findOrFail($ID);
		
		$tblyoutubeurl = Tblyoutubeurl::find($ID);
        $tblyoutubeurl->update($request->all());
        return $tblyoutubeurl;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        $tblyoutubeurl = Tblyoutubeurl::findOrFail($ID);
		$tblyoutubeurl->delete();

		return response()->json($tblyoutubeurl::all());
    }
}