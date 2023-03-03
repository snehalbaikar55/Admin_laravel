<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblpropertydetails extends Model
{
    use HasFactory;
    protected $table = 'tblpropertydetails';
    //public $timestamps = false;

	protected $primaryKey = 'ID';

    protected $fillable = [
       
        'PropertyID',
        'PropertyName' ,
        'ProjectName',
        'SubProject',
        'Location',
        'Developer',
        'Wnumber'=> '9833717888',
        'Cnumber',
        'Region',
        'SubRegion',
        'ConStatus',
        'PropertyType',
        't1',
        't2',
        't3',
        't4',
        't5',
        't6',
        'te7',
        'Price',
        'd1',
        'd2',
        'd3',
        'Colour1'=>'#0e6b0e',
        'Colour2'=>'#2b5329',
        'ListingDate',
        'updatedby',
        'updationDate',
        'Msg',
        'updated_at',
        'created_at'
      ];

      public function tblproperty()
      {
        return $this->belongsTo('App\Models\Tblproperty', 'PropertyID');
      }
}
