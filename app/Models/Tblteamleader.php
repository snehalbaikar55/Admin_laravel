<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblteamleader extends Model
{
    use HasFactory;

    protected $table = 'tblteamleader';

	protected $primaryKey = 'ID';

    protected $fillable = [
        'PropertyID',
        'MainProjectName',
        'ProjectName',
        'AlternateProjectName',
        'Location',
        'Region',
        'SubRegion',
        'ProjectStartDate',
        'ProjectEndDate',
        'RERA',
        'Brochure',
        'ImageLink',
        'Images',
        'Advertise',
        'ExtTelecaller',
        'LaunchType',
        'CompetitorProjects',
        'InventoryCnt',
        'Activity',
        'IsLadder',
        'LadderTarget',
        'MarketingPlanDev',
        'IsTownship',
        'TargetTL',
        'UpdatedBy',
        'Date'
      
     
      ];
      
     
 
}
