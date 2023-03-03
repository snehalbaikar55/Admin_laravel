<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tblfloorplans;
use DB;

class TblfloorplansController extends Controller
{
    public function index()
    {
        $tblfloorplans = Tblfloorplans::all();
		return response()->json($tblfloorplans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newtblfloorplans = new Tblfloorplans([
            'PropertyID' => $request->get('PropertyID'),
            'Image' => $request->get('Image'),
            'source' => $request->get('source'),
            'Title' => $request->get('Title'),
            'ListingDate' => $request->get('ListingDate'),
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
    // public function store(Request $request)
    // {
    //     //  dd($request->all());
    //     $length =  $request->length;
    //    for ($i=0; $i < $length; $i++) { 
    //        $PropertyID = $request->get('PropertyID');
    //        $titel = $request->get('Title');
    //        $updatedby = $request->get('updatedby');
    //        $img[$i] = $request->file('Image'.$i);
    //        $name = $request->file('Image'.$i)->getClientOriginalName();
    //        $destination = 'public/img';
    //      //  $img[$i]->move($destination, $image);
    //        $img[$i]->move(('../../admin_panel/src/assets/img/floorplans'), $name);
    //        $images[] = $name;
    //        $image1 = new Tblfloorplans();
    //        $image1->Image = $name;
    //        $image1->Title = $titel;
    //        $image1->PropertyID = $PropertyID;
    //        $image1->updatedby = $updatedby;
    //        $image1->save();
    //        }
    //     return response()->json($image1);
        
    // }

    public function store(Request $request)
    {
        // dd($request->all());
        $length =  $request->length;
        for ($i=0; $i < $length; $i++) {
            $img[$i]= $request->file('Image'.$i);
            $updatedby = $request->get('updatedby');
            $PropertyID = $request->get('PropertyID');
            $titel = $request->get('Title');
            $input = $request->file('Image'.$i)->getClientOriginalName();
            // $mainFolderPath = public_path('../../admin_panel/src/assets/img/icon');
            $mainFolderPath = public_path('Folder-a/');
            $folder1 = public_path('../../Admin_angular/src/assets/img/floorplans_admin/'.$PropertyID.'/');
            $folder2 = public_path('../../Admin_angular/src/assets/img/floorplans_portal/'.$PropertyID.'/');
            $fileObject = $img[$i];
            $filenamesWithPath = self::saveFilesMultipleTimes($fileObject, $mainFolderPath, [$folder1, $folder2],$PropertyID);

            $image1 =new Tblfloorplans();
            $image1->Image = $input;
            $image1->Title = $titel;
            $image1->PropertyID = $PropertyID;
            $image1->updatedby = $updatedby;
            $image1->save();

        }
        return response()->json($image1);
    }


public function saveFilesMultipleTimes(\Illuminate\Http\UploadedFile $requestFile, $mainFolderPath, $paths,$PropertyID)
{
    $fileName = $requestFile->getClientOriginalName();
    $movedFile = $requestFile->move($mainFolderPath, $fileName);
    foreach ((array) $paths as $eachPath) {
       // $eachPath1 = $eachPath.'84';
        @mkdir($eachPath);
        @copy($movedFile->getPathName(), $eachPath . $fileName);
      
        $dirctory[] = $eachPath.$fileName;
    }
    return $dirctory;
}

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID)
    {
        $tblfloorplans =  DB::table('tblfloorplans')->whereIn('PropertyID', [$ID])->get();
      return response()->json($tblfloorplans);
        // $tblfloorplans = Tblfloorplans::findOrFail($ID);
		// return response()->json($tblfloorplans);
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

        $tblfloorplans = Tblfloorplans::findOrFail($ID);
		
		$tblfloorplans = Tblfloorplans::find($ID);
        $tblfloorplans->update($request->all());
        return $tblfloorplans;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        $tblfloorplans = Tblfloorplans::findOrFail($ID);
		$tblfloorplans->delete();

		return response()->json($tblfloorplans::all());
    }
}
