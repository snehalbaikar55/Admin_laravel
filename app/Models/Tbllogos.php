<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbllogos extends Model
{
    use HasFactory;

    protected $table = 'tbllogos';

    protected $primaryKey = 'ID';

   protected $fillable = [
       'PropertyID',
       'FeaturedImage',
       'source',
       'ListingDate',
       'updatedby',
       'updationDate'
     ];
}
