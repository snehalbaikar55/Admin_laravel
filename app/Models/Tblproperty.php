<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblproperty extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tblproperty';

    protected $primaryKey = 'PropertyID';

   protected $fillable = [
       'PropertyName',
       'Theme',
       'PostingDate',
       'Aboutme',
       'updatedby',
       'active',
       'updated_at',
       'created_at'
       
     ];

     public function Tblpropertydetails()
     {
       return $this->hasOne('App\Models\Tblpropertydetails', 'PropertyID');
     }
}
