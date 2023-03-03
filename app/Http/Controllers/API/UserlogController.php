<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Userslog;
use DB;

class UserlogController extends Controller
{
    
    public function index()
    {
        $userslog = userslog::orderBy('updationDate', 'DESC')->get();
		return response()->json($userslog);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newuserslog = new userslog([
			//'slug' => $request->get('slug'),
			'PropertyID' => $request->get('PropertyID'),
            'PropertyName' => $request->get('PropertyName'),
            'Msg' => $request->get('Msg'),
            'Attribute' => $request->get('Attribute'),
            'ListingDate' => $request->get('ListingDate'),
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
            'PropertyName' => '',
            'Msg' => '',
            'Attribute' => '',
            'ListingDate' => '',
            'updationDate' => ''
		]);

		$newuserslog = new userslog([
			//'slug' => $request->get('slug'),
			'PropertyID' => $request->get('PropertyID'),
            'PropertyName' => $request->get('PropertyName'),
            'Msg' => $request->get('Msg'),
            'Attribute' => $request->get('Attribute'),
            'ListingDate' => $request->get('ListingDate'),
            'updationDate' => $request->get('updationDate'),
		]);

		$newuserslog->save();

		return response()->json($newuserslog);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID)
    {
        $userslog =  DB::table('userslog')->whereIn('PropertyID', [$ID])->orderBy('updationDate', 'DESC')->get();
		return response()->json($userslog);
        //orderBy('id', 'DESC')
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

        $userslog = userslog::findOrFail($ID);
		
		$userslog = userslog::find($ID);
        $userslog->update($request->all());
        return $userslog;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        $userslog = userslog::findOrFail($ID);
		$userslog->delete();

		return response()->json($userslog::all());
    }
}
