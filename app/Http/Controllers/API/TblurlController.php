<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tblurl;
use DB;

class TblurlController extends Controller
{
    public function index()
    {
        $tblurl = Tblurl::all();
		return response()->json($tblurl);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newTblurl = new Tblurl([
			//'slug' => $request->get('slug'),
			'PropertyID' => $request->get('PropertyID'),
            'URL' => $request->get('URL'),
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
			'PropertyID' => 'required|unique:tblurl,PropertyID',
            'URL' => 'required',
            'ListingDate' => '',
            'updatedby' => '',
            'updationDate' => ''
		]);

		$newTblurl = new Tblurl([
			//'slug' => $request->get('slug'),
			'PropertyID' => $request->get('PropertyID'),
            'URL' => $request->get('URL'),
            'ListingDate' => $request->get('ListingDate'),
            'updatedby' => $request->get('updatedby'),
            'updationDate' => $request->get('updationDate')
		]);

		$newTblurl->save();

		return response()->json($newTblurl);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID)
    {
        // $tblurl = Tblurl::findOrFail($ID);
        $tblurl = DB::table('tblurl')->where('PropertyID','=',$ID)->get();
		return response()->json($tblurl);
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

        $tblurl = Tblurl::findOrFail($ID);
		
		$tblurl = Tblurl::find($ID);
        $tblurl->update($request->all());
        return $tblurl;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        $tblurl = Tblurl::findOrFail($ID);
		$tblurl->delete();

		return response()->json($tblurl::all());
    }
}
