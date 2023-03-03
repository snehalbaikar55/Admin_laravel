<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\leads;
use DB;
use Carbon\Carbon;


class LeadsController extends Controller
{
    public function index()
    {
        $leads = Leads::all();
		return response()->json($leads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newLeads = new Leads([
			//'slug' => $request->get('slug'),
			'PropertyID' => $request->get('PropertyID'),
            'PropertyName' => $request->get('PropertyName'),
            'Name' => $request->get('Name'),
            'Email' => $request->get('Email'),
            'Mobile' => $request->get('Mobile')
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
            'PropertyName' => 'required',
            'Name' => 'required',
            'Email' => 'required',
            'Mobile' => 'required'
		]);

		$newLeads = new Leads([
			//'slug' => $request->get('slug'),
			'PropertyID' => $request->get('PropertyID'),
            'PropertyName' => $request->get('PropertyName'),
            'Name' => $request->get('Name'),
            'Email' => $request->get('Email'),
            'Mobile' => $request->get('Mobile')
		]);

		$newLeads->save();

		return response()->json($newLeads);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID)
    {
        $leads =  DB::table('leads')->whereIn('PropertyID', [$ID])->get();
		return response()->json($leads);

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

        $leads = Leads::findOrFail($ID);
		
		$leads = Leads::find($ID);
        $leads->update($request->all());
        return $leads;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        $leads = Leads::findOrFail($ID);
		$leads->delete();

		return response()->json($leads::all());
    }
    public function leadCount()
    {
        $leads = leads::count();
		return response()->json($leads);
        //$post = Entry::where("created_at","2015-03-15")->get()->toJSON();
    }
    public function getTodayLead()
    {
        $leads = leads::whereDate('Time',Carbon::today())->get();
		return response()->json($leads);
    }

}
