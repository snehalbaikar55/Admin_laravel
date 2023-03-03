<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblgalleryimages extends Model
{
    use HasFactory;

    protected $table = 'tblgalleryimages';

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
