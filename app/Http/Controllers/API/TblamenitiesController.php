<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\tblamenities;
use DB;

class TblamenitiesController extends Controller
{
    public function index()
    {
        $tblamenities = tblamenities::all();
		return response()->json($tblamenities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newtblamenities = new tblamenities([
			//'slug' => $request->get('slug'),
			'PropertyID' => $request->get('PropertyID'),
            'source' => $request->get('source'),
            'Title' => $request->get('Title'),
            'Amenitiesimage' => $request->get('Amenitiesimage'),
            'ListingDate' => $request->get('ListingDate'),
            'status' => $request->get('status'),
            'updatedby' => $request->get('updatedby'),
            'updationDate' => $request->get('updationDate'),
            
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
            'source'  =>  '',
            'Title'  =>  '',
            'Amenitiesimage'=>'',
            'ListingDate' => '',
            'status' => '',
            'updatedby' => '',
            'updationDate' => ''
		]);

		$newtblamenities = new tblamenities([
			//'slug' => $request->get('slug'),
			'PropertyID' => $request->get('PropertyID'),
            'source' => $request->get('source'),
            'Title' => $request->get('Title'),
           // 'Amenitiesimage' => $request->get('Amenitiesimage'),
            'ListingDate' => $request->get('ListingDate'),
            'status' => $request->get('status'),
            'updatedby' => $request->get('updatedby'),
            'updationDate' => $request->get('updationDate')
		]);

		$newtblamenities->save();

		return response()->json($newtblamenities);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID)
    {
        // $tblamenities = tblamenities::findOrFail($team_id);
		// return response()->json($tblamenities);
        $tblamenities = DB::table('tblamenities')->where('PropertyID','=',$ID)->get();
        //Tblrera::findOrFail($ID);
		return response()->json($tblamenities);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($team_id)
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
    public function update(Request $request, $team_id)
    {
        // $tblamenities = tblamenities::findOrFail($id);

		// $request->validate([
		// 	'slug' => 'slug',
		// 	'teamname' => 'teamname'
		// ]);

		// $tblamenities->slug = $request->get('slug');
		// $tblamenities->teamname = $request->get('teamname');

		// $tblamenities->save();

		// return response()->json($tblamenities);

        $tblamenities = tblamenities::findOrFail($team_id);
		
		$tblamenities = tblamenities::find($team_id);
        $tblamenities->update($request->all());
        return $tblamenities;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($team_id)
    {
        $tblamenities = tblamenities::findOrFail($team_id);
		$tblamenities->delete();

		return response()->json($tblamenities::all());
    }
}
