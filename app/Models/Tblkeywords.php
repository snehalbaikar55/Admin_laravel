<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblkeywords extends Model
{
    use HasFactory;

    protected $table = 'tblkeywords';

    protected $primaryKey = 'ID';

   protected $fillable = [
       'PropertyID',
       'metadescription',
       'keywords',
       'ListingDate',
       'Msg',
       'updatedby',
       'updationDate'
     ];
}
