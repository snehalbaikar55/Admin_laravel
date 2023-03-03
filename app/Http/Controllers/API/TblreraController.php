<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tblrera;
use DB;

class TblreraController extends Controller
{
    
    public function index()
    {
        
        $tblrera = Tblrera::all();
		return response()->json($tblrera);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newTblrera = new Tblrera([
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
            'Rera' => 'required|unique:tblrera,Rera',
            'updatedby' => '',
            'updationDate' => '',
            'EnterDate' => ''
		]);

		$newTblrera = new Tblrera([
			//'slug' => $request->get('slug'),
			'PropertyID' => $request->get('PropertyID'),
            'Rera' => $request->get('Rera'),
            'updatedby' => $request->get('updatedby'),
            'updationDate' => $request->get('updationDate'),
            'EnterDate' => $request->get('EnterDate')
		]);

		$newTblrera->save();

		return response()->json($newTblrera);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID)
    {
        $tblrera = DB::table('Tblrera')->where('PropertyID','=',$ID)->get();
        //Tblrera::findOrFail($ID);
		return response()->json($tblrera);
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

		$request->validate([
			'PropertyID' => 'required',
            'Rera' => 'required|unique:tblrera,Rera',
            'updatedby' => '',
            'updationDate' => '',
            'EnterDate' => ''
		]);

		// $Leads->slug = $request->get('slug');
		// $Leads->teamname = $request->get('teamname');

		// $Leads->save();

		// return response()->json($Leads);

        $tblrera = Tblrera::findOrFail($ID);
		
		$tblrera = Tblrera::find($ID);
        $tblrera->update($request->all());
        return $tblrera;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        $tblrera = Tblrera::findOrFail($ID);
		$tblrera->delete();

		return response()->json($tblrera::all());
    }
}
