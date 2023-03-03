<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Tblkeywords;

class TblkeywordsController extends Controller
{
    public function index()
    {
        $tblkeywords = Tblkeywords::all();
        return response()->json($tblkeywords);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newTblkeywords = new Tblkeywords([
			'PropertyID' => $request->get('PropertyID'),
			'metadescription' => $request->get('metadescription'),
            'keywords' => $request->get('keywords'),
            'ListingDate' => $request->get('ListingDate'),
            'Msg' => $request->get('Msg')
            
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
			'metadescription' => 'required',
            'keywords' => 'required',
            'ListingDate' =>'',
            'Msg' => 'required',
            'updatedby'=>''
           
		]);

		$newTblkeywords = new Tblkeywords([
			'PropertyID' => $request->get('PropertyID'),
			'metadescription' => $request->get('metadescription'),
            'keywords' => $request->get('keywords'),
            'ListingDate' => $request->get('ListingDate'),
            'updatedby' => $request->get('updatedby'),
            'Msg' => $request->get('Msg')
		]);

		$newTblkeywords->save();

		return response()->json($newTblkeywords);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID)
    {
        $tblkeywords =  DB::table('tblkeywords')->whereIn('PropertyID', [$ID])->get();
		return response()->json($tblkeywords);

      
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
        /* $roles = Roles::findOrFail($id);

		$request->validate([
			'slug' => 'slug',
			'name' => 'name'
		]);

		$roles->slug = $request->get('slug');
		$roles->name = $request->get('name');

		$roles->save();

		return response()->json($roles); */
		
		$tblkeywords = Tblkeywords::findOrFail($ID);
		
		$tblkeywords = Tblkeywords::find($ID);
        $tblkeywords->update($request->all());
        return $tblkeywords;
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        $tblkeywords = Tblkeywords::findOrFail($ID);
		$tblkeywords->delete();

		return response()->json($tblkeywords::all());
    }
	
}
