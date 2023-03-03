<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblfloorplans extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'tblfloorplans';

    protected $primaryKey = 'ID';

   protected $fillable = [
       'PropertyID',
       'Image',
       'source',
       'Title',
       'ListingDate',
       'updatedby',
       'updationDate',
     ];
}
