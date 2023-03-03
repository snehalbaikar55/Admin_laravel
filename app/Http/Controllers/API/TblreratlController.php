<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tblreratl;

class TblreratlController extends Controller
{
    public function index()
    {
        $tblreratl = Tblreratl::all();
		return response()->json($tblreratl);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newTblreratl = new Tblreratl([
			//'slug' => $request->get('slug'),
			'PropertyID' => $request->get('PropertyID'),
            'Rera' => $request->get('Rera'),
            'updatedby' => $request->get('updatedby'),
            'updationDate' => $request->get('updationDate'),
            'EnterDate' => $request->get('EnterDate')
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
			'PropertyID' => 'required',
            'Rera' => 'required',
            'updatedby' => 'required',
            'updationDate' => 'required',
            'EnterDate' => 'required'
		]);

		$newTblreratl = new Tblreratl([
			//'slug' => $request->get('slug'),
			'PropertyID' => $request->get('PropertyID'),
            'Rera' => $request->get('Rera'),
            'updatedby' => $request->get('updatedby'),
            'updationDate' => $request->get('updationDate'),
            'EnterDate' => $request->get('EnterDate')
		]);

		$newTblreratl->save();

		return response()->json($newTblreratl);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID)
    {
        $tblreratl = Tblreratl::findOrFail($ID);
		return response()->json($tblreratl);
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

        $tblreratl = Tblreratl::findOrFail($ID);
		
		$tblreratl = Tblreratl::find($ID);
        $tblreratl->update($request->all());
        return $tblreratl;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        $tblreratl = Tblreratl::findOrFail($ID);
		$tblreratl->delete();

		return response()->json($tblreratl::all());
    }
}
