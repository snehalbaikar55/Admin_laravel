<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tblnearbylocation;
use DB;

class TblnearbylocationController extends Controller
{
    public function index()
    {
        $tblnearbylocation = tblnearbylocation::all();
		return response()->json($tblnearbylocation);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newtblnearbylocation = new tblnearbylocation([
			//'slug' => $request->get('slug'),
			'PropertyID' => $request->get('PropertyID'),
            'l' => $request->get('l'),
            'ListingDate' => $request->get('ListingDate'),
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
            'l' => '',
            'ListingDate' => '',
            'updatedby' => '',
            'updationDate' => '',
		]);

		$newtblnearbylocation = new tblnearbylocation([
			//'slug' => $request->get('slug'),
            'PropertyID' => $request->get('PropertyID'),
            'l' => $request->get('l'),
            'ListingDate' => $request->get('ListingDate'),
            'updatedby' => $request->get('updatedby'),
            'updationDate' => $request->get('updationDate'),
		]);

		$newtblnearbylocation->save();

		return response()->json($newtblnearbylocation);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($ID)
    {
        $tblnearbylocation =  DB::table('tblnearbylocation')->whereIn('PropertyID', [$ID])->get();
		return response()->json($tblnearbylocation);

      
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
		
		$tblnearbylocation = Tblnearbylocation::findOrFail($ID);
		
		$tblnearbylocation = Tblnearbylocation::find($ID);
        $tblnearbylocation->update($request->all());
        return $tblnearbylocation;
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        $tblnearbylocation = tblnearbylocation::findOrFail($ID);
		$tblnearbylocation->delete();

		return response()->json($tblnearbylocation::all());
    }
}
