<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Tblproperty;
use App\Models\Tblpropertydetails;

class TblpropertydetailsController extends Controller
{
   
    
    public function index()
    {
        $tblpropertydetails = Tblpropertydetails::all();
		return response()->json($tblpropertydetails);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newTblpropertydetails = new Tblpropertydetails([
			 
        'PropertyID' => $request->get('PropertyID'),
        'PropertyName'  => $request->get('PropertyName'),
        'ProjectName' => $request->get('ProjectName'),
        'SubProject' => $request->get('SubProject'),
        'Location' => $request->get('Location'),
        'Developer' => $request->get('Developer'),
        'Wnumber' => $request->get('Wnumber'),
        'Cnumber' => $request->get('Cnumber'),
        'Region' => $request->get('Region'),
        'SubRegion' => $request->get('SubRegion'),
        'ConStatus' => $request->get('ConStatus'),
        'PropertyType' => $request->get('PropertyType'),
        't1' => $request->get('t1'),
        't2' => $request->get('t2'),
        't3' => $request->get('t3'),
        't4' => $request->get('t4'),
        't5' => $request->get('t5'),
        't6' => $request->get('t6'),
        'te7' => $request->get('te7'),
        'Price' => $request->get('Price'),
        'd1' => $request->get('d1'),
        'd2' => $request->get('d2'),
        'd3' => $request->get('d3'),
        'Colour1' => $request->get('Colour1'),
        'Colour2' => $request->get('Colour2'),
        'ListingDate' => $request->get('ListingDate'),
        'updatedby' => $request->get('updatedby'),
        'updationDate' => $request->get('updationDate'),
        'Msg' => $request->get('Msg'),
        'updated_at' => $request->get('updated_at'),
        'created_at' => $request->get('created_at')
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
            'PropertyName'  => '',
            'ProjectName' => '',
            'SubProject' => '',
            'Location' => '',
            'Developer' => '',
            'Wnumber' => '',
            'Cnumber' => '',
            'Region' => '',
            'SubRegion' => '',
            'ConStatus' => '',
            'PropertyType' => '',
            't1' => '',
            't2' => '',
            't3' =>'',
            't4' => '',
            't5' => '',
            't6' => '',
            'te7' => '',
            'Price' => '',
            'd1' => '',
            'd2' => '',
            'd3' => '',
            'Colour1' => '',
            'Colour2' => '',
            'ListingDate' => '',
            'updatedby' => '',
            'updationDate' => '',
            'Msg' => '',
            'updated_at'=>'',
            'created_at'=>''
		]);

		$newTblpropertydetails = new Tblpropertydetails([
            'PropertyID' => $request->get('PropertyID'),
            'PropertyName'  => $request->get('PropertyName'),
            'ProjectName' => $request->get('ProjectName'),
            'SubProject' => $request->get('SubProject'),
            'Location' => $request->get('Location'),
            'Developer' => $request->get('Developer'),
            'Wnumber' => $request->get('Wnumber'),
            'Cnumber' => $request->get('Cnumber'),
            'Region' => $request->get('Region'),
            'SubRegion' => $request->get('SubRegion'),
            'ConStatus' => $request->get('ConStatus'),
            'PropertyType' => $request->get('PropertyType'),
            't1' => $request->get('t1'),
            't2' => $request->get('t2'),
            't3' => $request->get('t3'),
            't4' => $request->get('t4'),
            't5' => $request->get('t5'),
            't6' => $request->get('t6'),
            'te7' => $request->get('te7'),
            'Price' => $request->get('Price'),
            'd1' => $request->get('d1'),
            'd2' => $request->get('d2'),
            'd3' => $request->get('d3'),
            'Colour1' => $request->get('Colour1'),
            'Colour2' => $request->get('Colour2'),
            'ListingDate' => $request->get('ListingDate'),
            'updatedby' => $request->get('updatedby'),
            'updationDate' => $request->get('updationDate'),
            'Msg' => $request->get('Msg'),
            'updated_at' => $request->get('updated_at'),
            'created_at' => $request->get('created_at')

		]);

		$newTblpropertydetails->save();

		return response()->json($newTblpropertydetails);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID)
    {
        // return response()->json($ID);

        $tblpropertydetails = DB::table('tblpropertydetails')
                                ->join('tblproperty', 'tblproperty.PropertyID', '=', 'tblpropertydetails.PropertyID')
                                ->select('tblproperty.PropertyName', 'tblproperty.active','tblpropertydetails.*')
                                ->whereIn('tblproperty.PropertyID', [$ID])
                                ->where('tblproperty.active', '1')
                                ->orderBy('tblpropertydetails.updated_at', 'DESC')
                                ->get();
        // $tblpropertydetails =  DB::table('tblpropertydetails')->whereIn('PropertyID', [$ID])->get();
		return response()->json($tblpropertydetails);
        // $tblpropertydetails = tblpropertydetails::findOrFail($PropertyID);
		// return response()->json($tblpropertydetails);

    }


    // public function getbyid($ID){
    //     $tblpropertydetails = DB::table('Tblpropertydetails')->where('PropertyID','=', $ID)->get();
    //     return response()->json($tblpropertydetails);
    // }
    // public function showbyid($ID){

    // $tblpropertydetails = DB::table('Tblpropertydetails')->where('PropertryID','=', $ID)->get();
    // }

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
        // return response()->json($request->all());
        // $Leads = Leads::findOrFail($id);
		// $request->validate([
		// 	'slug' => 'slug',
		// 	'teamname' => 'teamname'
		// ]);
		// $Leads->slug = $request->get('slug');
		// $Leads->teamname = $request->get('teamname');
		// $Leads->save();
		// return response()->json($Leads);

        // $tblpropertydetails = tblpropertydetails::findOrFail($ID);
		// $tblpropertydetails = tblpropertydetails::find($ID);
        // $tblpropertydetails->update($request->all());
        // return $tblpropertydetails;

        // $tblpropertydetails = Tblpropertydetails::findOrFail($ID);
		
		// $tblpropertydetails = Tblpropertydetails::find($ID);
        // $tblpropertydetails->update($request->all());
        // return $tblpropertydetails;

        $newTblpropertydetails = array();
        $newTblpropertydetails['Cnumber'] = $request->get('Cnumber');
        $newTblpropertydetails['Colour1'] = $request->get('Colour1');
        $newTblpropertydetails['Colour2'] = $request->get('Colour2');
        $newTblpropertydetails['ConStatus'] = $request->get('ConStatus');
        $newTblpropertydetails['Developer'] = $request->get('Developer');
        $newTblpropertydetails['ID'] = $request->get('ID');
        $newTblpropertydetails['ListingDate'] = $request->get('ListingDate');
        $newTblpropertydetails['Location'] = $request->get('Location');
        $newTblpropertydetails['Msg'] = $request->get('Msg');
        $newTblpropertydetails['Price'] = $request->get('Price');
        $newTblpropertydetails['ProjectName'] = $request->get('ProjectName');
        $newTblpropertydetails['PropertyID'] = $request->get('PropertyID');
        $newTblpropertydetails['PropertyName'] = $request->get('PropertyName');
        $newTblpropertydetails['PropertyType'] = $request->get('PropertyType');
        $newTblpropertydetails['Region'] = $request->get('Region');
        $newTblpropertydetails['SubProject'] = $request->get('SubProject');
        $newTblpropertydetails['SubRegion'] = $request->get('SubRegion');
        $newTblpropertydetails['Wnumber'] = $request->get('Wnumber');
        // $newTblpropertydetails['active'] = $request->get('active');
        $newTblpropertydetails['d1'] = $request->get('d1');
        $newTblpropertydetails['d2'] = $request->get('d2');
        $newTblpropertydetails['d3'] = $request->get('d3');
        $newTblpropertydetails['t1'] = $request->get('t1');
        $newTblpropertydetails['t2'] = $request->get('t2');
        $newTblpropertydetails['t3'] = $request->get('t3');
        $newTblpropertydetails['t4'] = $request->get('t4');
        $newTblpropertydetails['t5'] = $request->get('t5');
        $newTblpropertydetails['t6'] = $request->get('t6');
        $newTblpropertydetails['te7'] = $request->get('te7');
        $newTblpropertydetails['updationDate'] = $request->get('updationDate');

        // $tblpropertydetails = Tblpropertydetails::where(['PropertyID'=>$ID])->update($request->all());
        $tblpropertydetails = Tblpropertydetails::where(['PropertyID'=>$ID])->update($newTblpropertydetails);
        
        $newTblpropertydetails = Tblpropertydetails::find($newTblpropertydetails['ID']);
        $Tblproperty = Tblproperty::find($newTblpropertydetails['ID']);
        if($newTblpropertydetails !== null)
        {
            $newTblpropertydetails->Tblproperty()->update(['PropertyName' => $newTblpropertydetails['PropertyName']]);
        }

        return response()->json($Tblproperty);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        $tblpropertydetails = Tblpropertydetails::findOrFail($ID);
		$tblpropertydetails->delete();

		return response()->json($tblpropertydetails::all());
    }

    public function allDeveloperProperties($Developer)
    {
        $getDeveloper = DB::table('tblpropertydetails')
                                ->join('tblproperty', 'tblproperty.PropertyID', '=', 'tblpropertydetails.PropertyID')
                                ->select('tblproperty.active','tblpropertydetails.*')
                                ->where('tblpropertydetails.Developer' , $Developer)
                                // ->where('tblproperty.active', '1')
                                ->orderBy('tblpropertydetails.id', 'DESC')
                                ->get();

        // $getDeveloper = Tblpropertydetails::where('Developer' , $Developer)->get();
        return response()->json($getDeveloper);
    }
}
