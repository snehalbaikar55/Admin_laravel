<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tbltelecallers;

class TbltelecallersController extends Controller
{
    public function index()
    {
        $tbltelecallers = Tbltelecallers::all();
		return response()->json($tbltelecallers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newTbltelecallers = new Tbltelecallers([
			//'slug' => $request->get('slug'),

            'TelecallerName'=> $request->get('TelecallerName'),
            'UserName'=> $request->get('UserName'), 
            'MobileNumber'=> $request->get('MobileNumber'),
            'Email'=> $request->get('Email'),
            'Password'=> $request->get('Password'),
            'Regdate'=> $request->get('Regdate'),
            'Role'=> $request->get('Role'),
            'Region'=> $request->get('Region')
			
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
            'TelecallerName'=> 'required',
            'UserName'=> 'required',
            'MobileNumber'=> 'required',
            'Email'=> 'required',
            'Password'=> 'required',
            'Regdate'=> 'required',
            'Role'=>'required',
            'Region'=> 'required',
		]);

		$newTbltelecallers = new Tbltelecallers([
			//'slug' => $request->get('slug'),
            'TelecallerName'=> $request->get('TelecallerName'),
            'UserName'=> $request->get('UserName'), 
            'MobileNumber'=> $request->get('MobileNumber'),
            'Email'=> $request->get('Email'),
            'Password'=> $request->get('Password'),
            'Regdate'=> $request->get('Regdate'),
            'Role'=> $request->get('Role'),
            'Region'=> $request->get('Region')
		]);

		$newTbltelecallers->save();

		return response()->json($newTbltelecallers);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID)
    {
        $tbltelecallers = Tbltelecallers::findOrFail($ID);
		return response()->json($tbltelecallers);
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

        $tbltelecallers = Tbltelecallers::findOrFail($ID);
		
		$tbltelecallers = Tbltelecallers::find($ID);
        $tbltelecallers->update($request->all());
        return $tbltelecallers;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        $tbltelecallers = Tbltelecallers::findOrFail($ID);
		$tbltelecallers->delete();

		return response()->json($tbltelecallers::all());
    }
}
