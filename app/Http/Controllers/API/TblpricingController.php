<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tblpricing;

class TblpricingController extends Controller
{
    public function index()
    {
        $tblpricing = tblpricing::all();
		return response()->json($tblpricing);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newtblpricing = new tblpricing([
			//'slug' => $request->get('slug'),
			'PropertyID' => $request->get('PropertyID'),
            'Type' => $request->get('Type'),
            'CarpetArea' => $request->get('CarpetArea'),
            'Price' => $request->get('Price'),
            'updatedby' => $request->get('updatedby'),
          
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
            'Type' => 'required',
            'CarpetArea' => 'required',
            'Price' => 'required',
            'updatedby' => '',
		]);

		$newtblpricing = new tblpricing([
			//'slug' => $request->get('slug'),
            'PropertyID' => $request->get('PropertyID'),
            'Type' => $request->get('Type'),
            'CarpetArea' => $request->get('CarpetArea'),
            'Price' => $request->get('Price'),
            'updatedby' => $request->get('updatedby'),
		]);

		$newtblpricing->save();

		return response()->json($newtblpricing);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID)
    {
        // $tblpricing = tblpricing::findOrFail($ID)->where('PropertyID','=', $ID)->get();
        $tblpricing = tblpricing::where('PropertyID','=', $ID)->get();
		return response()->json($tblpricing);
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
        // $tblpricing = tblpricing::findOrFail($id);

        // $request->validate([
		// 	//'slug' => 'required',
		// 	'PropertyID' => 'required',
        //     'Type' => 'required',
        //     'CarpetArea' => 'required',
        //     'Price' => 'required',
        //     'updatedby' => '',
		// ]);


		// $tblpricing->slug = $request->get('slug');
		// $tblpricing->teamname = $request->get('teamname');

		// $tblpricing->save();

		// return response()->json($tblpricing);

        $tblpricing = tblpricing::findOrFail($ID);
		
		$tblpricing = tblpricing::find($ID);
        $tblpricing->update($request->all());
        return $tblpricing;

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        $tblpricing = tblpricing::findOrFail($ID);
		$tblpricing->delete();

		return response()->json($tblpricing::all());
    }
}
