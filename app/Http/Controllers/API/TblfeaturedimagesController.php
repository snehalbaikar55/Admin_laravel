<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tblfeaturedimages;
use DB;

class TblfeaturedimagesController extends Controller
{
    public function index()
    {
        $tblfeaturedimages = Tblfeaturedimages::all();
		return response()->json($tblfeaturedimages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newtblfeaturedimages = new Tblfeaturedimages([
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
//          $tblfeaturedimages = new tblfeaturedimages();
 
//        //  $tblfeaturedimages->user_id = $user_id;
//          $tblfeaturedimages->FeaturedImage = $name;
        
         
//         // $image->size = $size;
//          $tblfeaturedimages->save(); 
//          return response()->json($tblfeaturedimages);
    
//     }


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
    $folder1 = public_path('../../Admin_angular/src/assets/img/featuredimg_admin/'.$PropertyID.'/');
    $folder2 = public_path('../../Admin_angular/src/assets/img/featuredimg_portal/'.$PropertyID.'/');
    $fileObject = $img[$i];
    $filenamesWithPath = self::saveFilesMultipleTimes($fileObject, $mainFolderPath, [$folder1, $folder2],$PropertyID);

    $image1 =new tblfeaturedimages();
    $image1->FeaturedImage = $input;
    $image1->updatedby = $updatedby;
    $image1->PropertyID = $PropertyID;
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


// public function store(Request $request){
// //dd($request->all());
   
//    $length =  $request->length;
//    for ($i=0; $i < $length; $i++) { 
//            $PropertyID = $request->get('PropertyID');
//            $updatedby = $request->get('updatedby');
//            $img[$i] = $request->file('FeaturedImage'.$i);
//            $name = $request->file('FeaturedImage'.$i)->getClientOriginalName();
//            $destination = 'public/img';
//          //  $img[$i]->move($destination, $image);
//            $img[$i]->move(('../../admin_panel/src/assets/img/featuredimages'), $name);
//            $images[] = $name;
//            $image1 =new Tblfeaturedimages();
//            $image1->FeaturedImage = $name;
//            $image1->PropertyID = $PropertyID;
//            $image1->updatedby = $updatedby;
//            $image1->save();
//            }
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

	// 	$newtblfeaturedimages = new tblfeaturedimages([
    //         'PropertyID' => $request->get('PropertyID'),
    //         'FeaturedImage' => $request->get('FeaturedImage'),
    //         'source' => $request->get('source'),
    //         'ListingDate' => $request->get('ListingDate'),
    //         'updatedby' => $request->get('updatedby'),
    //         'updationDate' => $request->get('updationDate')
	// 	]);

	// 	$newtblfeaturedimages->save();

	// 	return response()->json($newtblfeaturedimages);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID)
    {
     //   $tblfeaturedimages = tblfeaturedimages::findOrFail($ID)->Where('PropertyID','=',$ID)->get();
       $tblfeaturedimages =  DB::table('tblfeaturedimages')->whereIn('PropertyID', [$ID])->get();
      return response()->json($tblfeaturedimages);
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
        $tblfeaturedimages = tblfeaturedimages::find($ID);

        if($request->file != ''){        
            $path ='../../Admin_angular/src/assets/img' ;
            //code for remove old file
            if($tblfeaturedimages->file != ''  && $tblfeaturedimages->file != null){
                $file_old = $path.$tblfeaturedimages->file;
                unlink($file_old);
            }
            $file = $request->file;
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
  
            //for update in table
            $tblfeaturedimages->update(['FeaturedImage' => $filename]);
       }
       return $tblfeaturedimages;
        // $tblfeaturedimages = tblfeaturedimages::findOrFail($ID);
		
		// $tblfeaturedimages = tblfeaturedimages::find($ID);
        // $tblfeaturedimages->update($request->all());
        // return $tblfeaturedimages;
    
        }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        $tblfeaturedimages = Tblfeaturedimages::findOrFail($ID);
		$tblfeaturedimages->delete();

		return response()->json($tblfeaturedimages::all());
    }

    public function getalldata(){
        $tblfeaturedimages =  DB::table('tblfeaturedimages')
        ->join('tblpropertydetails', 'tblpropertydetails.PropertyID', '=', 'tblfeaturedimages.PropertyID')
        ->join('tblrera', 'tblrera.PropertyID', '=', 'tblpropertydetails.PropertyID')
        ->get();
        return response()->json($tblfeaturedimages);
    }
    public function getLocation(){
        $tblfeaturedimages =  DB::table('tblpropertydetails')
        ->select('SubRegion','Location')
        ->distinct('Location')    
        ->get();
        return response()->json($tblfeaturedimages);
    }
    public function searchProjectByLoc($data){
        $tblfeaturedimages =  DB::table('tblpropertydetails')
        ->where('Location', 'like', '%'.$data.'%')
        ->get();
        return response()->json($tblfeaturedimages);

    }
    public function searchDataFront(Request $request){
        
        $data = $request->all();
       //return($data);
        $tblfeaturedimages =  DB::table('tblfeaturedimages')
        ->join('tblpropertydetails', 'tblpropertydetails.PropertyID', '=', 'tblfeaturedimages.PropertyID')
        ->where('tblpropertydetails.Location', $data[0])
        ->where('tblpropertydetails.PropertyName', 'like', '%'.$data[1].'%')
        ->get();
        return response()->json($tblfeaturedimages);
    }
    public function searchByConstructionStatus($data){
        //$data = $request->all();
        //dd($data);
        //return $data;
        if($data=="Under Construction"){
        $tblfeaturedimages=DB::select( DB::raw("SELECT  p.*,r.Rera,f.FeaturedImage,  JSON_EXTRACT(ConStatus, '$[4].name') as `name` ,JSON_EXTRACT(ConStatus, '$[4].checked') as `checked` FROM tblpropertydetails p INNER JOIN tblfeaturedimages f ON f.PropertyID=p.PropertyID INNER JOIN tblrera r ON p.PropertyID=r.PropertyID  WHERE JSON_EXTRACT(ConStatus, '$[4].name')='$data' AND JSON_EXTRACT(ConStatus, '$[4].checked')='true';") );
        }
        else if($data=="Ready To Move"){
            $tblfeaturedimages=DB::select( DB::raw("SELECT  p.*,r.Rera,f.FeaturedImage,  JSON_EXTRACT(ConStatus, '$[5].name') as `name` ,JSON_EXTRACT(ConStatus, '$[5].checked') as `checked` FROM tblpropertydetails p INNER JOIN tblfeaturedimages f ON f.PropertyID=p.PropertyID INNER JOIN tblrera r ON p.PropertyID=r.PropertyID  WHERE JSON_EXTRACT(ConStatus, '$[5].name')='$data' AND JSON_EXTRACT(ConStatus, '$[5].checked')='true';") );
        }
        else if($data=="New Project"){
            $tblfeaturedimages=DB::select( DB::raw("SELECT  p.*,r.Rera,f.FeaturedImage,  JSON_EXTRACT(ConStatus, '$[2].name') as `name` ,JSON_EXTRACT(ConStatus, '$[2].checked') as `checked` FROM tblpropertydetails p INNER JOIN tblfeaturedimages f ON f.PropertyID=p.PropertyID INNER JOIN tblrera r ON p.PropertyID=r.PropertyID  WHERE JSON_EXTRACT(ConStatus, '$[2].name')='$data' AND JSON_EXTRACT(ConStatus, '$[2].checked')='true';") );
       }
        $tblfeaturedimages1 =  DB::table('tblpropertydetails')
    //    ->join ('tblfeaturedimages', 'tblpropertydetails.PropertyID', '=', 'tblfeaturedimages.PropertyID')
    //    ->where('tblpropertydetails.ConStatus', $data)
    //    ->orWhere('tblpropertydetails.ConStatus', 'like', '%' . $data . '%')
       ->get();
       $newarray=[];
       $newConstatus=[];
       $newarr[]=[];
        for($i=0;$i<count($tblfeaturedimages1);$i++){
            
            for($j=0;$j<count($newarray);$j++)
            {
                $newarray[$i]=$tblfeaturedimages1[$i]->ConStatus;
                //$newConstatus[$j]=json_decode($newarray[$j]);
                // for($k=0;$k<count($newConstatus);$k++){
                //     $newname[$k]=$newConstatus[$k];

                    // if($newConstatus[$i][$j]->checked === "true")
                    // {
                    //     $newarr[$i]=$newConstatus[$i][$j];
                    // }
                // }
            }
        }
   
       return response()->json($tblfeaturedimages);
    }

    public function searchByPropType($data){
        //return $data;
        
        //$data = $request->all();
        //dd($data);
        $tblfeaturedimages =  DB::table('tblfeaturedimages')
       ->join('tblpropertydetails', 'tblpropertydetails.PropertyID', '=', 'tblfeaturedimages.PropertyID')
       ->join('tblrera', 'tblrera.PropertyID', '=', 'tblpropertydetails.PropertyID')
       ->where('tblpropertydetails.PropertyType', $data)
       ->orWhere('tblpropertydetails.PropertyType', 'like', '%' . $data .'%' )->get();
        //dd(response()->json($tblfeaturedimages));
        return response()->json($tblfeaturedimages);
    }
    public function loaddatabyid($data){
        
        $tblfeaturedimages =  DB::table('tblurl')
        ->join('tblpropertydetails', 'tblurl.PropertyID', '=', 'tblpropertydetails.PropertyID')
        ->select('*')
        ->where('tblpropertydetails.PropertyID',$data)->get();
        //return($tblfeaturedimages);
        return response()->json($tblfeaturedimages);
    }
    public function loadgallaryimg($data){
        $tblfeaturedimages =  DB::table('tblgalleryimages') 
        ->where('PropertyID',$data)->get();
        //return($tblfeaturedimages);
        return response()->json($tblfeaturedimages);
    }
    public function loadfloorplans($data){
        $tblfeaturedimages =  DB::table('tblfloorplans') 
        ->where('PropertyID',$data)->get();
        //return($tblfeaturedimages);
        return response()->json($tblfeaturedimages);
    }
    public function constructionStatus($data){
        $tblfeaturedimages =  DB::table('tblpropertydetails') 
        ->select('ConStatus')
        ->where('PropertyID',$data)->get();
        //return($tblfeaturedimages);
        return response()->json($tblfeaturedimages);
    }
    public function topProMumbai(){
        
        $tblfeaturedimages =  DB::table('tblpropertydetails') 
        ->join('tblfeaturedimages', 'tblpropertydetails.PropertyID', '=', 'tblfeaturedimages.PropertyID')
        ->select('*')
        ->whereIn('tblpropertydetails.PropertyID',[9,2,7,8])->get();
        //return($tblfeaturedimages);
        return response()->json($tblfeaturedimages);
    }

    public function horizonknwndbase(){
        $tblfeaturedimages =  DB::table('tblpropertydetails') 
        ->join('tblfeaturedimages', 'tblpropertydetails.PropertyID', '=', 'tblfeaturedimages.PropertyID')
        ->select('*')
        ->whereIn('tblpropertydetails.PropertyID',[1,185,194,92,184])->get();
        //return($tblfeaturedimages);
        return response()->json($tblfeaturedimages);
    }
    public function topNewProMumbai(){
        $tblfeaturedimages =  DB::table('tblpropertydetails') 
        ->join('tblfeaturedimages', 'tblpropertydetails.PropertyID', '=', 'tblfeaturedimages.PropertyID')
        ->select('*')
        ->Where('tblpropertydetails.ConStatus',"=","New Launch" ,"and", "Price",">",'10Cr')
        ->Limit(3)
        ->get();
        //return($tblfeaturedimages);
        return response()->json($tblfeaturedimages);
    }
    public function topdeveloper(){
        $tblfeaturedimages =  DB::table('tbldeveloper') 
        ->select('ID','Developer')
        ->WhereIn('ID',[2,18,12])
        ->get();
        return response()->json($tblfeaturedimages);
    }
    public function listpropbydev($developernm){
        $tblfeaturedimages =  DB::table('tblpropertydetails') 
        ->join('tblfeaturedimages', 'tblpropertydetails.PropertyID', '=', 'tblfeaturedimages.PropertyID')
        ->join('tblrera', 'tblpropertydetails.PropertyID', '=', 'tblrera.PropertyID')
        ->select('*')
        ->Where('tblpropertydetails.Developer',"=",$developernm)
        ->distinct()
        ->get();
        return response()->json($tblfeaturedimages);
    }
    public function getprice(){
            $tblfeaturedimages =  DB::table('tblprice') 
            ->select('*')
            ->get();
        return response()->json($tblfeaturedimages);
    }
    public function filterDataByPriceRange(Request $request ){
        $data = $request->all();
        $minval=($data[0])*100000;
        $maxval=($data[1])*100000;
        $tblfeaturedimages =  DB::table('tblfeaturedimages')
        ->join('tblpropertydetails', 'tblpropertydetails.PropertyID', '=', 'tblfeaturedimages.PropertyID')
        ->whereBetween('tblpropertydetails.Price_value',[$minval,$maxval])
        ->orderBy('tblpropertydetails.Price_value','ASC')
        ->get();
        return response()->json($tblfeaturedimages);
    }
    public function show_property_by_city($cityname){
        $tblfeaturedimages =  DB::table('tblfeaturedimages')
        ->join('tblpropertydetails', 'tblpropertydetails.PropertyID', '=', 'tblfeaturedimages.PropertyID')
        ->where('tblpropertydetails.Location',$cityname)
        ->orWhere('tblpropertydetails.te7',$cityname)
        ->get();
        return response()->json($tblfeaturedimages);
    }
    public function show_property_by_bhk($bhk){
        //return $bhk;
        $tblfeaturedimages =  DB::table('tblfeaturedimages')
        ->join('tblpropertydetails', 'tblpropertydetails.PropertyID', '=', 'tblfeaturedimages.PropertyID')
        ->where('tblpropertydetails.te7','LIKE', '%'.$bhk.'%')
        ->get();
        return response()->json($tblfeaturedimages);
    }
}
