<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tblform;
use DB;

class TblformController extends Controller
{
    public function index()
    {
        $tblform = Tblform::all();
		return response()->json($tblform);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newtblform = new Tblform([
            'PropertyID' => $request->get('PropertyID'),
            'formname' => $request->get('formname'),
            'id1' => $request->get('id1'),
            'id2' => $request->get('id2'),
            'domain' => $request->get('domain'),
            'crmurl' => $request->get('crmurl'),
            'status' => $request->get('status'),
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
            'PropertyID' =>'',
            'formname' =>'required',
            'id1' => 'required',
            'id2' => 'required',
            'domain' => 'required',
            'crmurl' => '',
            'status' => '',
            'EnterDate' => '',
            'Msg' => '',
            'updatedby' => '',
            'updationDate' => ''
		]);

		$newtblform = new Tblform([
            'PropertyID' => $request->get('PropertyID'),
            'formname' => $request->get('formname'),
            'id1' => $request->get('id1'),
            'id2' => $request->get('id2'),
            'domain' => $request->get('domain'),
            'crmurl' => $request->get('crmurl'),
            'status' => $request->get('status'),
            'EnterDate' => $request->get('EnterDate'),
            'Msg' => $request->get('Msg'),
            'updatedby' => $request->get('updatedby'),
            'updationDate' => $request->get('updationDate')
		]);

		$newtblform->save();

		return response()->json($newtblform);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID)
    {
        
        $tblform =  DB::table('tblform')->whereIn('PropertyID', [$ID])->get();
		return response()->json($tblform);
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
       
        // $tblform = tblform::where(['PropertyID'=>$ID])->update($request->all());
        // return $tblform;

        $tblform = tblform::findOrFail($ID);
		
		$tblform = tblform::find($ID);
        $tblform->update($request->all());
        return $tblform;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        $tblform = tblform::findOrFail($ID);
		$tblform->delete();

		return response()->json($tblform::all());
    }

    public function DomainActiveCount()
    {
        $tblform = tblform::where('status',1)->get();
		return response()->json($tblform);
    }
    public function DomainDeactiveCount()
    {
        $tblform = tblform::where('status',0)->get();
		return response()->json($tblform);
    }
}
