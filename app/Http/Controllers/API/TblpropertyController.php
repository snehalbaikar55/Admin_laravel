<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tblproperty;
use App\Models\Tblpropertydetails;
use DB;

class TblpropertyController extends Controller
{
    
    
    public function index()
    {
        // $tblproperty = Tblproperty::all();
        $tblproperty = DB::table('tblproperty')
        ->where('active', '1') 
        ->orderBy('updated_at','DESC')
        ->get();
		
		return response()->json($tblproperty);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newTblproperty = new Tblproperty([
			//'slug' => $request->get('slug'),
			'PropertyName' => $request->get('PropertyName'),
            'Theme' => $request->get('Theme'),
            'PostingDate' => $request->get('PostingDate'),
            'Aboutme' => $request->get('Aboutme'),
            'updationDate' => $request->get('updationDate'),
            'updatedby' => $request->get('updatedby'),
            'updated_at'=> $request->get('updated_at'),
            'created_at'=> $request->get('created_at')
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
            'PropertyName' => 'required',
            'Theme' => 'required',
            'PostingDate' => '',
            'Aboutme' => '',
            'updationDate' => '',
            'updatedby' => '',
            'active' => '',
            'updated_at' => '',
            'created_at' => ''
		]);

		$newTblproperty = new Tblproperty([
			//'slug' => $request->get('slug'),
			'PropertyName' => $request->get('PropertyName'),
            'Theme' => $request->get('Theme'),
            'PostingDate' => $request->get('PostingDate'),
            'Aboutme' => $request->get('Aboutme'),
            'updationDate' => $request->get('updationDate'),
            'updatedby' => $request->get('updatedby'),
            'active' => 1,
            'updated_at'=> $request->get('updated_at'),
            'created_at'=> $request->get('created_at')
		]);

		$newTblproperty->save();
        
        $Tblpropertydetails = new Tblpropertydetails();
        // $newpropertydetails->ConStatus = $request->get('shortName');
        $Tblpropertydetails->PropertyName = $request->get('PropertyName');
        $Tblpropertydetails->ConStatus = json_encode($request->get('shortName'));//"ALL NEW1";
        $Tblpropertydetails->PropertyType = $request->get('PropertyType');
        
        $newTblproperty->Tblpropertydetails()->save($Tblpropertydetails);
		return response()->json($Tblpropertydetails);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID)
    {
        $tblproperty = Tblproperty::findOrFail($ID);
		return response()->json($tblproperty);
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

        $tblproperty = Tblproperty::findOrFail($ID);
		
		$tblproperty = Tblproperty::find($ID);
        $tblproperty->update($request->all());
        return $tblproperty;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $ID)
    {
        
        $tblproperty = Tblproperty::findOrFail($ID);	
		// $tblproperty->delete();
        if ($tblproperty) {
            $tblproperty->active = 0;
            $tblproperty->save();
        }

		return response()->json($tblproperty::all());
    }
    public function propertyCount()
    {
        $tblproperty = tblproperty::count();
		return response()->json($tblproperty);
    }

    public function changePropertyStatus(Request $request, $PropertyID)
    {
        $tblproperty = Tblproperty::find($PropertyID);
        if ($tblproperty) {
            $tblproperty->active = $request->status;
            $tblproperty->updatedby = $request->updatedby;
            $tblproperty->save();
        }

        return response()->json($tblproperty);
    }
}