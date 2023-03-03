<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tblfavicon;
use DB;

class TblfaviconController extends Controller
{
    public function index()
    {
        $tblfavicon = Tblfavicon::all();
		return response()->json($tblfavicon);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newtblfavicon = new Tblfavicon([
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
//     public function store(Request $request)

//     {  


//         $request->file('FeaturedImage');
//    //   $user_id = $request->get('user_id');
 
//          $file = $request->file('FeaturedImage');
       
        
//        //  $size = $request->file('FeaturedImage')->getSize();
//          $name = $request->file('FeaturedImage')->getClientOriginalName();
     
        
//          //$request->file('FeaturedImage')->put('public/img/', $FeaturedImage);
        
 
//          $picture   = date('His').'-'.$name;
     
 
//          $FileDestinationPath = "public/img/".$name;
        
//          //move image to public/img folder
//          $file->move(public_path('img'), $name);
    
//          //$request->file('FeaturedImage')->storeAs('public/img/',$name);
//          $tblfavicon = new tblfavicon();
 
//        //  $tblfavicon->user_id = $user_id;
//          $tblfavicon->FeaturedImage = $name;
        
         
//         // $image->size = $size;
//          $tblfavicon->save(); 
//          return response()->json($tblfavicon);
    
//     }





//public function store(Request $request){
//dd($request->all());
   
//    $length =  $request->length;
//     for ($i=0; $i < $length; $i++) { 
//         $PropertyID = $request->get('PropertyID');
//         $updatedby = $request->get('updatedby');
//         $img[$i] = $request->file('FeaturedImage'.$i);
//         $name = $request->file('FeaturedImage'.$i)->getClientOriginalName();
//         $destination = 'public/img';
//         //$img[$i]->move($destination, $image);
//         // $img[$i]->move(('../../admin_panel/src/assets/images'), $name);
//         // $img[$i]->move(('../../admin_panel/src/assets/img/icon'), $name);
        
//         $images[] = $name;
//         $image1 =new tblfavicon();
//         $image1->FeaturedImage = $name; 
//         $image1->PropertyID = $PropertyID;
//         $image1->updatedby = $updatedby;
//         $image1->save();
//         }
//     return response()->json($image1);
    
//}

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
    $folder1 = public_path('../../Admin_angular/src/assets/img/favicon_admin/'.$PropertyID.'/');
    $folder2 = public_path('../../Admin_angular/src/assets/img/favicon_portal/'.$PropertyID.'/');
    $fileObject = $img[$i];
    $filenamesWithPath = self::saveFilesMultipleTimes($fileObject, $mainFolderPath, [$folder1, $folder2],$PropertyID);

   // tblfavicon::create($input);  
    $image1 =new tblfavicon();
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


    // {
    //     $request->validate([
    //         'PropertyID' =>'required',
    //         'FeaturedImage' => 'required',
    //         'source' =>'required',
    //         'ListingDate' => 'required',
    //         'updatedby' => 'required',
    //         'updationDate' => 'required'
	// 	]);

	// 	$newtblfavicon = new tblfavicon([
    //         'PropertyID' => $request->get('PropertyID'),
    //         'FeaturedImage' => $request->get('FeaturedImage'),
    //         'source' => $request->get('source'),
    //         'ListingDate' => $request->get('ListingDate'),
    //         'updatedby' => $request->get('updatedby'),
    //         'updationDate' => $request->get('updationDate')
	// 	]);

	// 	$newtblfavicon->save();

	// 	return response()->json($newtblfavicon);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID)
    {
     //   $tblfavicon = tblfavicon::findOrFail($ID)->Where('PropertyID','=',$ID)->get();
       $tblfavicon =  DB::table('tblfavicon')->whereIn('PropertyID', [$ID])->get();
      return response()->json($tblfavicon);
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

        //dd($request->all());
        $tblfavicon = tblfavicon::find($ID);

        if($request->file != ''){        
            $path ='../../Admin_angular/src/assets/img' ;
  
            //code for remove old file
            if($tblfavicon->file != ''  && $tblfavicon->file != null){
                 $file_old = $path.$tblfavicon->file;
                 unlink($file_old);
            }
            $file = $request->file;
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
  
            //for update in table
            $tblfavicon->update(['FeaturedImage' => $filename]);
       }
       return $tblfavicon;
        // $tblfavicon = tblfavicon::findOrFail($ID);
		
		// $tblfavicon = tblfavicon::find($ID);
        // $tblfavicon->update($request->all());
        // return $tblfavicon;
    
        }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        $tblfavicon = tblfavicon::findOrFail($ID);
		$tblfavicon->delete();

		return response()->json($tblfavicon::all());
    }
}
