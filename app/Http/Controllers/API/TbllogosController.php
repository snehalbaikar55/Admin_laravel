<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tbllogos;
use DB;

class TbllogosController extends Controller
{
    public function index()
    {
        $tbllogos = Tbllogos::all();
		return response()->json($tbllogos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newtbllogos = new Tbllogos([
            'PropertyID' => $request->get('PropertyID'),
            'FeaturedImage' => $request->get('FeaturedImage'),
            'source' => $request->get('source'),
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
    // db_multipleimageEntities wmsEN = new db_multipleimageEntities();
    // [HttpPost()] 


    public function store(Request $request)
    {
        // dd($request->all());
        // $this->validate($request, ['FeaturedImage' => 'required']);
        $length =  $request->length;
            for ($i=0; $i < $length; $i++) {
        $img[$i]= $request->file('FeaturedImage'.$i);
        $updatedby = $request->get('updatedby');
        $PropertyID = $request->get('PropertyID');
        $input = $request->file('FeaturedImage'.$i)->getClientOriginalName();
            // $mainFolderPath = public_path('../../admin_panel/src/assets/img/icon');
            $mainFolderPath = public_path('Folder-a/');
            $folder1 = public_path('../../Admin_angular/src/assets/img/logos_admin/'.$PropertyID.'/');
            $folder2 = public_path('../../Admin_angular/src/assets/img/logos_portal/'.$PropertyID.'/');
            $fileObject = $img[$i];
            $filenamesWithPath = self::saveFilesMultipleTimes($fileObject, $mainFolderPath, [$folder1, $folder2],$PropertyID);

            $image1 =new Tbllogos();
            $image1->FeaturedImage = $input;
            $image1->updatedby = $updatedby;
            $image1->PropertyID = $PropertyID;
            $image1->save();

            return response()->json($image1);
            }
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


    // public function store(Request $request){
    // //dd($request->all());
    //     $length =  $request->length;
    //     for ($i=0; $i < $length; $i++) { 
    //         $PropertyID = $request->get('PropertyID');
    //         $img[$i] = $request->file('FeaturedImage'.$i);
    //         $updatedby = $request->get('updatedby');
    //         $name = $request->file('FeaturedImage'.$i)->getClientOriginalName();
    //         $destination = 'public/img';
    //         //  $img[$i]->move($destination, $image);
    //         $img[$i]->move(('../../admin_panel/src/assets/img/logoimages'), $name);
    //         $images[] = $name;
    //         $image1 =new tbllogos();
    //         $image1->FeaturedImage = $name;
    //         $image1->PropertyID = $PropertyID;
    //         $image1->updatedby = $updatedby;
    //         $image1->save();
    //         }
    //         return response()->json($image1);
        
    // }
    // {
    //     $request->validate([
    //         'PropertyID' =>'required',
    //         'FeaturedImage' => 'required',
    //         'source' =>'required',
    //         'ListingDate' => 'required',
    //         'updatedby' => 'required',
    //         'updationDate' => 'required'
	// 	]);

	// 	$newtbllogos = new tbllogos([
    //         'PropertyID' => $request->get('PropertyID'),
    //         'FeaturedImage' => $request->get('FeaturedImage'),
    //         'source' => $request->get('source'),
    //         'ListingDate' => $request->get('ListingDate'),
    //         'updatedby' => $request->get('updatedby'),
    //         'updationDate' => $request->get('updationDate')
	// 	]);

	// 	$newtbllogos->save();

	// 	return response()->json($newtbllogos);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID)
    {
      $tbllogos =  DB::table('tbllogos')->whereIn('PropertyID', [$ID])->get();
      return response()->json($tbllogos);
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

        dd($request->all());
        $tbllogos = tbllogos::find($ID);

        if($request->file != ''){        
            $path ='../../Admin_angular_Angular/src/assets/img' ;
  
            //code for remove old file
            if($tbllogos->file != ''  && $tbllogos->file != null){
                 $file_old = $path.$tbllogos->file;
                 unlink($file_old);
            }
            $file = $request->file;
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
  
            //for update in table
            $tbllogos->update(['FeaturedImage' => $filename]);
       }
       return $tbllogos;
        // $tbllogos = tbllogos::findOrFail($ID);
		
		// $tbllogos = tbllogos::find($ID);
        // $tbllogos->update($request->all());
        // return $tbllogos;
    
        }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        $tbllogos = tbllogos::findOrFail($ID);
		$tbllogos->delete();

		return response()->json($tbllogos::all());

        // $tbllogos = DB::table('tbllogos')->whereIn('PropertyID', [$ID])->delete();
        // return response()->json($tbllogos);
    //     $tbllogos =  DB::table('tbllogos')->whereIn('PropertyID', [$ID])->get();
    //   return response()->json($tbllogos);
    }
}
