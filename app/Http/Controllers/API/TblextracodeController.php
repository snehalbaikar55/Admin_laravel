<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tblextracode;
use DB;

class TblextracodeController extends Controller
{
    public function index()
    {
        $tblextracode = Tblextracode::all();
		return response()->json($tblextracode);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newtblextracode = new Tblextracode([
            'PropertyID' => $request->get('PropertyID'),
            'code1' => $request->get('code1'),
            'code2' => $request->get('code2'),
            'code3' => $request->get('code3'),
            'code4' => $request->get('code4'),
            'ListingDate' => $request->get('ListingDate'),
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
			'PropertyID' => 'required',
            'code1' => 'required',
            'code2' => 'required',
            'code3' => '',
            'code4' => '',
            'ListingDate' => '',
            'Msg' => '',
            'updatedby' => '',
            'updationDate' => ''
		]);

		$newtblextracode = new Tblextracode([
			'PropertyID' => $request->get('PropertyID'),
            'code1' => $request->get('code1'),
            'code2' => $request->get('code2'),
            'code3' => $request->get('code3'),
            'code4' => $request->get('code4'),
            'ListingDate' => $request->get('ListingDate'),
            'Msg' => $request->get('Msg'),
            'updatedby' => $request->get('updatedby'),
            'updationDate' => $request->get('updationDate')
		]);

		$newtblextracode->save();

		return response()->json($newtblextracode);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID)
    {
        $tblextracode = DB::table('tblextracode')->where('PropertyID','=',$ID)->get();
        // $tblextracode = Tblextracode::findOrFail($ID);
		return response()->json($tblextracode);
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
        $tblextracode = DB::table('tblextracode')
        ->where('ID', $ID)
        ->update($request->all());
        return $tblextracode;

        // $tblextracode = Tblextracode::findOrFail($ID);
		
		// $tblextracode = Tblextracode::find($ID);
        // $tblextracode->update($request->all());
        // return $tblextracode;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $ID)
    {
        $tblextracode = Tblextracode::findOrFail($ID);
		$tblextracode->delete();
		return response()->json($Tblextracode::all());
    }
}
