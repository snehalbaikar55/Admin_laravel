<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tblpropertytype;


class TblpropertytypeController extends Controller
{
   
    
    public function index()
    {
        $tblpropertytype = Tblpropertytype::all();
		return response()->json($tblpropertytype);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newTblpropertytype = new Tblpropertytype([
			//'slug' => $request->get('slug'),
			'PropertType' => $request->get('PropertType'),
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
			'PropertType' => 'required',
            'EnterDate' => 'required'
		]);

		$newTblpropertytype = new Tblpropertytype([
			//'slug' => $request->get('slug'),
			'PropertType' => $request->get('PropertType'),
            'EnterDate' => $request->get('EnterDate')
		]);

		$newTblpropertytype->save();

		return response()->json($newTblpropertytype);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID)
    {
        $tblpropertytype = Tblpropertytype::findOrFail($ID);
		return response()->json($tblpropertytype);
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

        $tblpropertytype = Tblpropertytype::findOrFail($ID);
		
		$tblpropertytype = Tblpropertytype::find($ID);
        $tblpropertytype->update($request->all());
        return $tblpropertytype;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        $tblpropertytype = Tblpropertytype::findOrFail($ID);
		$tblpropertytype->delete();

		return response()->json($tblpropertytype::all());
    }
  
}
