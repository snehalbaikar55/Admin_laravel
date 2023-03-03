<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Crm;

class CrmController extends Controller
{
    public function index()
    {
        $crm = Crm::all();
		return response()->json($crm);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newCrm = new Crm([
			//'slug' => $request->get('slug'),
			'link' => $request->get('link'),
            'pid' => $request->get('pid'),
            'MobileNumber' => $request->get('MobileNumber'),
            'Email' => $request->get('Email'),
            'Password' => $request->get('Password'),
            'AdminRegdate' => $request->get('AdminRegdate')

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
			'teamname' => 'required',
            'link' => 'required',
            'pid' => 'required',
            'MobileNumber' => 'required',
            'Email' => 'required',
            'Password' => 'required',
            'AdminRegdate' => 'required',
		]);

		$newCrm = new Crm([
			
            'link' => $request->get('link'),
            'pid' => $request->get('pid'),
            'MobileNumber' => $request->get('MobileNumber'),
            'Email' => $request->get('Email'),
            'Password' => $request->get('Password'),
            'AdminRegdate' => $request->get('AdminRegdate')
		]);

		$newcrm->save();

		return response()->json($newCrm);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID)
    {
        $crm = Crm::findOrFail($ID);
		return response()->json($crm);
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

        $crm = Crm::findOrFail($ID);
		
		$crm = Crm::find($ID);
        $crm->update($request->all());
        return $crm;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        $crm = Crm::findOrFail($ID);
		$crm->delete();

		return response()->json($crm::all());
    }
}
