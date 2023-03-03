<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tbllinks;

class TbllinksController extends Controller
{
    public function index()
    {
        $tbllinks = Tbllinks::all();
		return response()->json($tbllinks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newtbllinks = new Tbllinks([
            'Description' => $request->get('Description'),
            'Teamleader' => $request->get('Teamleader'),
            'url' => $request->get('url'),
            'EnterDate' => $request->get('EnterDate'),
            'Msg' => $request->get('Msg'),
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
            'Description' =>'required',
            'Teamleader' => 'required',
            'url' =>'required',
            'EnterDate' => 'required',
            'Msg' => 'required',
            'updatedby' => 'required',
            'updationDate' => 'required'
		]);

		$newtbllinks = new Tbllinks([
            'Description' => $request->get('Description'),
            'Teamleader' => $request->get('Teamleader'),
            'url' => $request->get('url'),
            'EnterDate' => $request->get('EnterDate'),
            'Msg' => $request->get('Msg'),
            'updatedby' => $request->get('updatedby'),
            'updationDate' => $request->get('updationDate')
		]);

		$newtbllinks->save();

		return response()->json($newTbllinks);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID)
    {
        $tbllinks = Tbllinks::findOrFail($ID);
		return response()->json($tbllinks);
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
        // $Crm = Crm::findOrFail($id);

		// $request->validate([
		// 	'slug' => 'slug',
		// 	'teamname' => 'teamname'
		// ]);

		// $Crm->slug = $request->get('slug');
		// $Crm->teamname = $request->get('teamname');

		// $Crm->save();

		// return response()->json($Crm);

        $tbllinks = Tbllinks::findOrFail($ID);
		
		$tbllinks = Tbllinks::find($ID);
        $tbllinks->update($request->all());
        return $tbllinks;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        $tbllinks = Tbllinks::findOrFail($ID);
		$tbllinks->delete();

		return response()->json($Tbllinks::all());
    }
}
