<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendorleads;


class VendorleadsController extends Controller
{
    public function index()
    {
        $vendorleads = Vendorleads::all();
		return response()->json($vendorleads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newVendorleads = new Vendorleads([
			//'slug' => $request->get('slug'),
			'ClientName' => $request->get('ClientName'),
            'Mobile' => $request->get('Mobile'),
            'TeleCaller' => $request->get('TeleCaller'),
            'Feedback' => $request->get('Feedback'),
            'Project' => $request->get('Project'),
            'Region' => $request->get('Region'),
            'Subregion' => $request->get('Subregion'),
            'Flattype' => $request->get('Flattype'),
            'Location' => $request->get('Location'),
            'Budget' => $request->get('Budget'),
            'Possession' => $request->get('Possession'),
            'Time' => $request->get('Time'),
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
            'ClientName' => 'required',
            'Mobile' => 'required',
            'TeleCaller' => 'required',
            'Feedback' => 'required',
            'Project' =>'required',
            'Region' => 'required',
            'Subregion' => 'required',
            'Flattype' => 'required',
            'Location' => 'required',
            'Budget' => 'required',
            'Possession' => 'required',
            'Time' => 'required' 
		]);

		$newVendorleads = new Vendorleads([
			'ClientName' => $request->get('ClientName'),
            'Mobile' => $request->get('Mobile'),
            'TeleCaller' => $request->get('TeleCaller'),
            'Feedback' => $request->get('Feedback'),
            'Project' => $request->get('Project'),
            'Region' => $request->get('Region'),
            'Subregion' => $request->get('Subregion'),
            'Flattype' => $request->get('Flattype'),
            'Location' => $request->get('Location'),
            'Budget' => $request->get('Budget'),
            'Possession' => $request->get('Possession'),
            'Time' => $request->get('Time'),
		]);

		$newVendorleads->save();

		return response()->json($newVendorleads);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID)
    {
        $vendorleads = Vendorleads::findOrFail($ID);
		return response()->json($vendorleads);
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

        $vendorleads = Vendorleads::findOrFail($ID);
		
		$vendorleads = Vendorleads::find($ID);
        $vendorleads->update($request->all());
        return $vendorleads;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        $vendorleads = Vendorleads::findOrFail($ID);
		$vendorleads->delete();

		return response()->json($vendorleads::all());
    }
}
