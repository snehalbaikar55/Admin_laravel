<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tbldeveloper;
use DB;

class TbldeveloperController extends Controller
{
    public function index()
    {
        // $tbldeveloper = tbldeveloper::all();
        $tbldeveloper = DB::table('tbldeveloper')
        ->where('active', '1') 
        ->orderBy('id','DESC')
        ->get();
		return response()->json($tbldeveloper);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newtbldeveloper = new tbldeveloper([
			//'slug' => $request->get('slug'),
			'Developer' => $request->get('Developer'),
            'PostingDate' => $request->get('PostingDate'),
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
			//'slug' => 'required',
			'Developer' => 'required',
            'PostingDate'  =>  '',
            'active' => '',
            'updatedby' => '',
            'updationDate' => ''
		]);

		$newtbldeveloper = new tbldeveloper([
			//'slug' => $request->get('slug'),

			'Developer' => $request->get('Developer'),
            'PostingDate' => $request->get('PostingDate'),
            'active' => 1,
            'MobileNumber' => $request->get('MobileNumber'),
            'updatedby' => $request->get('updatedby')
        ]);


		$newtbldeveloper->save();

		return response()->json($newtbldeveloper);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($team_id)
    {
        $tbldeveloper = tbldeveloper::findOrFail($team_id);
		return response()->json($tbldeveloper);
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
        // $tbldeveloper = tbldeveloper::findOrFail($id);

		// $request->validate([
		// 	'slug' => 'slug',
		// 	'teamname' => 'teamname'
		// ]);

		// $tbldeveloper->slug = $request->get('slug');
		// $tbldeveloper->teamname = $request->get('teamname');

		// $tbldeveloper->save();

		// return response()->json($tbldeveloper);

        $tbldeveloper = tbldeveloper::findOrFail($team_id);
		
		$tbldeveloper = tbldeveloper::find($team_id);
        $tbldeveloper->update($request->all());
        return $tbldeveloper;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($team_id)
    {
        $tbldeveloper = tbldeveloper::findOrFail($team_id);
		// $tbldeveloper->delete();

        if ($tbldeveloper) {
            $tbldeveloper->active = 0;
            $tbldeveloper->save();
        }

		return response()->json($tbldeveloper::all());
    }

    public function developerCount()
    {
        $tbldeveloper = tbldeveloper::count();
		return response()->json($tbldeveloper);
    }

    public function developerMatch($data)
    {
        $getDeveloper = tbldeveloper::select(['id','Developer'])->where('Developer' , $data)->first();
        return isset($getDeveloper->Developer) ? true : false;
    }

    public function getUniqueDevelopers()
    {
        // $developerName = DB::table('tbldeveloper')->select('Developer')->distinct()->orderBy('updated_at','DESC')->get();
        $developerName = DB::table('tbldeveloper')->select('Developer')->distinct()->where('active', '1')->orderBy('updated_at','DESC')->get();
		return response()->json($developerName);
    }

}
