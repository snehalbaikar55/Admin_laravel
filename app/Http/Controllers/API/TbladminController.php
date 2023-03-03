<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tbladmin;

class TbladminController extends Controller
{
    public function index()
    {
        $tbladmin = tbladmin::all();
		return response()->json($tbladmin);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newtbladmin = new tbladmin([
			//'slug' => $request->get('slug'),
			'AdminName' => $request->get('AdminName'),
            'UserName' => $request->get('UserName'),
            'MobileNumber' => $request->get('MobileNumber'),
            'Email' => $request->get('Email'),
            'Password' => $request->get('Password'),
            'AdminRegdate' => $request->get('AdminRegdate'),
            'Role' => $request->get('Role')
            
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
			'AdminName' => 'AdminName',
            'UserName'  =>  'UserName',
            'MobileNumber' => 'MobileNumber',
            'Email' => 'Email',
            'Password' => 'Password',
            'AdminRegdate' => 'AdminRegdate',
            'Role' => 'Role'
		]);

		$newtbladmin = new tbladmin([
			//'slug' => $request->get('slug'),
			'AdminName' => $request->get('AdminName'),
            'UserName' => $request->get('UserName'),
            'MobileNumber' => $request->get('MobileNumber'),
            'Email' => $request->get('Email'),
            'Password' => $request->get('Password'),
            'AdminRegdate' => $request->get('AdminRegdate'),
            'Role' => $request->get('Role')
		]);

		$newtbladmin->save();

		return response()->json($newtbladmin);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($team_id)
    {
        $tbladmin = tbladmin::findOrFail($team_id);
		return response()->json($tbladmin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($team_id)
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
    public function update(Request $request, $team_id)
    {
        // $tbladmin = tbladmin::findOrFail($id);

		// $request->validate([
		// 	'slug' => 'slug',
		// 	'teamname' => 'teamname'
		// ]);

		// $tbladmin->slug = $request->get('slug');
		// $tbladmin->teamname = $request->get('teamname');

		// $tbladmin->save();

		// return response()->json($tbladmin);

        $tbladmin = tbladmin::findOrFail($team_id);
		
		$tbladmin = tbladmin::find($team_id);
        $tbladmin->update($request->all());
        return $tbladmin;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($team_id)
    {
        $tbladmin = tbladmin::findOrFail($team_id);
		$tbladmin->delete();

		return response()->json($tbladmin::all());
    }
}
