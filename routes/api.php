<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CrmController;
use App\Http\Controllers\API\LeadsController;
use App\Http\Controllers\API\VendorleadsController;
use App\Http\Controllers\API\UserlogController;
use App\Http\Controllers\API\TblyoutubeurlController;
use App\Http\Controllers\API\TblurlController;
use App\Http\Controllers\API\TbltelecallersController;
use App\Http\Controllers\API\TblteamleaderController;
use App\Http\Controllers\API\TbldeveloperController;
use App\Http\Controllers\API\TbladminController;
use App\Http\Controllers\API\TblamenitiesController;
use App\Http\Controllers\API\TblextracodeController;
use App\Http\Controllers\API\TblfaviconController;
use App\Http\Controllers\API\TblfeaturedimagesController;
use App\Http\Controllers\API\TblfloorplansController;
use App\Http\Controllers\API\TblreratlController;
use App\Http\Controllers\API\TblreraController;
use App\Http\Controllers\API\TblpropertytypeController;
use App\Http\Controllers\API\TblpropertydetailsController;
use App\Http\Controllers\API\TblpropertyController;
use App\Http\Controllers\API\TblformController;
use App\Http\Controllers\API\TblgalleryimagesController;
use App\Http\Controllers\API\TblkeywordsController;
use App\Http\Controllers\API\TbllinksController;
use App\Http\Controllers\API\TblnearbylocationController;
use App\Http\Controllers\API\TblpricingController;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\TbllogosController;
use App\Http\Controllers\MailController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResources([
    'crm'=> CrmController::class,
    'leads'=> LeadsController::class,
    'vendorleads'=> VendorleadsController::class,
    'tblteamleader'=> TblteamleaderController::class,
    'userslog'=> UserlogController::class,
    'tblyoutubeurl'=> TblyoutubeurlController::class,
    'tblurl'=> TblurlController::class,
    'tbltelecallers'=> TbltelecallersController::class,
    'tbldeveloper'=> TbldeveloperController::class,
    'tbladmin'=> TbladminController::class,
    'tblaminities'=> TblamenitiesController::class,
    'tblextracode'=> TblextracodeController::class,
    'tblfavicon'=> TblfaviconController::class,
    'tblfeaturedimages'=> TblfeaturedimagesController::class,
    'tblfloorplans'=> TblfloorplansController::class,
    'tblreratl'=> TblreratlController::class,
    'tblrera'=> TblreraController::class,
    'tblpropertytype'=> TblpropertytypeController::class,
    'tblpropertydetails'=> TblpropertydetailsController::class,
    'tblproperty'=> TblpropertyController::class,
    'tblform'=> TblformController::class,
    'tblgalleryimages'=> TblgalleryimagesController::class,
    'tbllinks'=> TbllinksController::class,
    'tbllogos'=> TbllogosController::class,
    'tblnearbylocation'=> TblnearbylocationController::class,
    'tblkeywords'=> TblkeywordsController::class,
    'tblpricing'=> TblpricingController::class,
    'users'=> UsersController::class,
    'regions'=> App\Http\Controllers\API\RegionsController::class,
    'getSubRegions' => App\Http\Controllers\API\SubRegionController::class
]);

/* fetch sub regions */
// Route::get('/getSubRegions', [App\Http\Controllers\API\SubRegionController::class])

/*Route::apiResource('crm', CrmController::class);

Route::apiResource('leads', LeadsController::class);

Route::apiResource('vendorleads', VendorleadsController::class);

Route::apiResource('userslog', UserlogController::class);

Route::apiResource('tblyoutubeurl', TblyoutubeurlController::class);

Route::apiResource('tblurl', TblurlController::class);

Route::apiResource('tbltelecallers', TbltelecallersController::class);

Route::apiResource('tblteamleader', TblteamleaderController::class);

Route::apiResource('tbldeveloper', TbldeveloperController::class);

Route::apiResource('tbladmin', TbladminController::class);

Route::apiResource('tblaminities', TblamenitiesController::class);

Route::apiResource('tblextracode', TblextracodeController::class);

Route::apiResource('tblfavicon', TblfaviconController::class);

Route::apiResource('tblfeaturedimages', TblfeaturedimagesController::class);

Route::apiResource('tblfloorplans', TblfloorplansController::class);

Route::apiResource('tblreratl', TblreratlController::class);

Route::apiResource('tblrera', TblreraController::class);

Route::apiResource('tblpropertytype', TblpropertytypeController::class);

Route::apiResource('tblpropertydetails', TblpropertydetailsController::class);

Route::apiResource('tblproperty', TblpropertyController::class);

Route::apiResource('tblform', TblformController::class);

Route::apiResource('tblgalleryimages', TblgalleryimagesController::class);

Route::apiResource('tbllinks', TbllinksController::class);

Route::apiResource('tbllogos', TbllogosController::class);

Route::apiResource('tblnearbylocation', TblnearbylocationController::class);

Route::apiResource('tblkeywords', TblkeywordsController::class);

Route::apiResource('tblpricing', TblpricingController::class);*/

// Route::apiResource('users', UsersController::class);

Route::group([

    'middleware' => 'api'

], function ($router) {
    
    Route::post('/login', [App\Http\Controllers\AuthController::class,'login'])->name('login');
    Route::post('/signup', [App\Http\Controllers\AuthController::class,'signup'])->name('signup');
    Route::get('/developerCount', [App\Http\Controllers\API\TbldeveloperController::class,'developerCount'])->name('developerCount');
    
    /* route for matching data for developer name */
    Route::get('/developerMatch/{data}', [App\Http\Controllers\API\TbldeveloperController::class,'developerMatch'])->name('developerMatch');

    /* route for matching data for developer name */
    Route::get('/allDeveloperMatchs/{Developer}', [App\Http\Controllers\API\TblpropertydetailsController::class,'allDeveloperProperties'])->name('allDeveloperProperties');
    
    /* get unique developers name */
    Route::get('/distDeveloper', [App\Http\Controllers\API\TbldeveloperController::class,'getUniqueDevelopers'])->name('getUniquDeveloper');
    
    Route::get('/leadCount', [App\Http\Controllers\API\LeadsController::class,'leadCount'])->name('leadCount');
    Route::get('/getTodayLead', [App\Http\Controllers\API\LeadsController::class,'getTodayLead'])->name('getTodayLead');
    Route::get('/propertyCount', [App\Http\Controllers\API\TblpropertyController::class,'propertyCount'])->name('propertyCount');
    /* change property status activate/Deavtivate */
    Route::post('/tblpropertystatus/{PropertyID}', [App\Http\Controllers\API\TblpropertyController::class,'changePropertyStatus'])->name('activateDeactivateProperty');
    // Route::get('/tblpropertystatus', [App\Http\Controllers\API\TblpropertyController::class,'changePropertyStatus'])->name('activateDeactivateProperty');

    Route::get('/DomainActiveCount', [App\Http\Controllers\API\TblformController::class,'DomainActiveCount'])->name('DomainActiveCount');
    Route::get('/DomainDeactiveCount', [App\Http\Controllers\API\TblformController::class,'DomainDeactiveCount'])->name('DomainDeactiveCount');


    //Route::get('/location_wise', [App\Http\Controllers\API\TblfeaturedimagesController::class,'location_wise'])->name('location_wise');
    Route::post('/searchDataFront', [App\Http\Controllers\API\TblfeaturedimagesController::class,'searchDataFront'])->name('searchDataFront');
    Route::get('/searchProjectByLoc/{data}', [App\Http\Controllers\API\TblfeaturedimagesController::class,'searchProjectByLoc'])->name('searchProjectByLoc');
    Route::get('/getLocation',[App\Http\Controllers\API\TblfeaturedimagesController::class,'getLocation'])->name('getLocation');
    Route::get('/getalldata',[App\Http\Controllers\API\TblfeaturedimagesController::class,'getalldata'])->name('getalldata');
    Route::get('/searchByConstructionStatus/{id}', [App\Http\Controllers\API\TblfeaturedimagesController::class,'searchByConstructionStatus'])->name('searchByConstructionStatus');
    Route::get('/searchByPropType/{id}', [App\Http\Controllers\API\TblfeaturedimagesController::class,'searchByPropType'])->name('searchByPropType');
    Route::get('/loaddatabyid/{id}', [App\Http\Controllers\API\TblfeaturedimagesController::class,'loaddatabyid'])->name('loaddatabyid');
    Route::get('/loadgallaryimg/{id}', [App\Http\Controllers\API\TblfeaturedimagesController::class,'loadgallaryimg'])->name('loadgallaryimg');
    Route::get('/loadfloorplans/{id}', [App\Http\Controllers\API\TblfeaturedimagesController::class,'loadfloorplans'])->name('loadfloorplans');
    Route::get('/constructionStatus/{id}', [App\Http\Controllers\API\TblfeaturedimagesController::class,'constructionStatus'])->name('constructionStatus');
    Route::get('/topProMumbai', [App\Http\Controllers\API\TblfeaturedimagesController::class,'topProMumbai'])->name('topProMumbai');
    Route::get('/horizonknwndbase', [App\Http\Controllers\API\TblfeaturedimagesController::class,'horizonknwndbase'])->name('horizonknwndbase');
    Route::get('/topNewProMumbai', [App\Http\Controllers\API\TblfeaturedimagesController::class,'topNewProMumbai'])->name('topNewProMumbai');
    Route::get('/topdeveloper', [App\Http\Controllers\API\TblfeaturedimagesController::class,'topdeveloper'])->name('topdeveloper');
    Route::get('/listpropbydev/{id}', [App\Http\Controllers\API\TblfeaturedimagesController::class,'listpropbydev'])->name('listpropbydev');
    Route::get('/getprice', [App\Http\Controllers\API\TblfeaturedimagesController::class,'getprice'])->name('getprice');

    Route::post('/basic_email', [App\Http\Controllers\MailController::class,'basic_email'])->name('basic_email');
    
    Route::post('/filterDataByPriceRange', [App\Http\Controllers\API\TblfeaturedimagesController::class,'filterDataByPriceRange'])->name('filterDataByPriceRange');
    Route::get('/show_property_by_city/{cityname}', [App\Http\Controllers\API\TblfeaturedimagesController::class,'show_property_by_city'])->name('show_property_by_city');
    Route::get('/show_property_by_bhk/{bhk}', [App\Http\Controllers\API\TblfeaturedimagesController::class,'show_property_by_bhk'])->name('show_property_by_bhk');
    Route::get('/show_property_by_location_or_builder/{data}', [App\Http\Controllers\API\TblfeaturedimagesController::class,'show_property_by_location_or_builder'])->name('show_property_by_location_or_builder');
    /* get sub regions based on region */
    Route::get('/getRegionsOfSubregion/{region_id}' , [App\Http\Controllers\API\SubRegionController::class, 'getSubregionOfRegion'])->name('getSubregion');

});