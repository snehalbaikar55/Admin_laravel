<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tblteamleader;

class TblteamleaderController extends Controller
{
    public function index()
    {
        $tblteamleader = Tblteamleader::all();
		return response()->json($tblteamleader);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newTblteamleader = new Tblteamleader([
			//'slug' => $request->get('slug'),
            'PropertyID'=>  $request->get('PropertyID'),
            'MainProjectName'=> $request->get('MainProjectName'),
            'ProjectName'=> $request->get('ProjectName'),
            'AlternateProjectName'=> $request->get('AlternateProjectName'),
            'Location'=> $request->get('Location'),
            'Region'=> $request->get('Region'),
            'SubRegion'=> $request->get('SubRegion'),
            'ProjectStartDate'=> $request->get('slProjectStartDateug'),
            'ProjectEndDate'=> $request->get('ProjectEndDate'),
            'RERA'=> $request->get('RERA'),
            'Brochure'=> $request->get('Brochure'),
            'ImageLink'=> $request->get('ImageLink'),
            'Images'=> $request->get('Images'),
            'Advertise'=> $request->get('Advertise'),
            'ExtTelecaller'=> $request->get('ExtTelecaller'),
            'LaunchType'=> $request->get('LaunchType'),
            'CompetitorProjects'=> $request->get('CompetitorProjects'),
            'InventoryCnt'=> $request->get('InventoryCnt'),
            'Activity'=> $request->get('Activity'),
            'IsLadder'=> $request->get('IsLadder'),
            'LadderTarget'=> $request->get('LadderTarget'),
            'MarketingPlanDev'=> $request->get('MarketingPlanDev'),
            'IsTownship'=> $request->get('IsTownship'),
            'TargetTL'=> $request->get('TargetTL'),
            'UpdatedBy'=> $request->get('UpdatedBy'),
            'Date'=> $request->get('Date')
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
            'PropertyID'=>  'required',
            'MainProjectName'=> 'required',
            'ProjectName'=> 'required',
            'AlternateProjectName'=> 'required',
            'Location'=> 'required',
            'Region'=> 'required',
            'SubRegion'=> 'required',
            'ProjectStartDate'=> 'required',
            'ProjectEndDate'=> 'required',
            'RERA'=> 'required',
            'Brochure'=> 'required',
            'ImageLink'=> 'required',
            'Images'=> 'required',
            'Advertise'=> 'required',
            'ExtTelecaller'=> 'required',
            'LaunchType'=> 'required',
            'CompetitorProjects'=> 'required',
            'InventoryCnt'=> 'required',
            'Activity'=> 'required',
            'IsLadder'=> 'required',
            'LadderTarget'=>'required',
            'MarketingPlanDev'=> 'required',
            'IsTownship'=> 'required',
            'TargetTL'=> 'required',
            'UpdatedBy'=> 'required',
            'Date'=> 'required'
		]);

		$newTblteamleader = new Tblteamleader([
            'PropertyID'=>  $request->get('PropertyID'),
            'MainProjectName'=> $request->get('MainProjectName'),
            'ProjectName'=> $request->get('ProjectName'),
            'AlternateProjectName'=> $request->get('AlternateProjectName'),
            'Location'=> $request->get('Location'),
            'Region'=> $request->get('Region'),
            'SubRegion'=> $request->get('SubRegion'),
            'ProjectStartDate'=> $request->get('slProjectStartDateug'),
            'ProjectEndDate'=> $request->get('ProjectEndDate'),
            'RERA'=> $request->get('RERA'),
            'Brochure'=> $request->get('Brochure'),
            'ImageLink'=> $request->get('ImageLink'),
            'Images'=> $request->get('Images'),
            'Advertise'=> $request->get('Advertise'),
            'ExtTelecaller'=> $request->get('ExtTelecaller'),
            'LaunchType'=> $request->get('LaunchType'),
            'CompetitorProjects'=> $request->get('CompetitorProjects'),
            'InventoryCnt'=> $request->get('InventoryCnt'),
            'Activity'=> $request->get('Activity'),
            'IsLadder'=> $request->get('IsLadder'),
            'LadderTarget'=> $request->get('LadderTarget'),
            'MarketingPlanDev'=> $request->get('MarketingPlanDev'),
            'IsTownship'=> $request->get('IsTownship'),
            'TargetTL'=> $request->get('TargetTL'),
            'UpdatedBy'=> $request->get('UpdatedBy'),
            'Date'=> $request->get('Date')
		]);

		$newTblteamleader->save();

		return response()->json($newTblteamleader);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID)
    {
        $tblteamleader = Tblteamleader::findOrFail($ID);
		return response()->json($tblteamleader);
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

        $tblteamleader = Tblteamleader::findOrFail($ID);
		
		$tblteamleader = Tblteamleader::find($ID);
        $tblteamleader->update($request->all());
        return $tblteamleader;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        $tblteamleader = Tblteamleader::findOrFail($ID);
		$tblteamleader->delete();

		return response()->json($tblteamleader::all());
    }
}
