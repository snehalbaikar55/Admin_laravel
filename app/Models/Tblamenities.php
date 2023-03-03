<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblamenities extends Model
{
    use HasFactory;

    protected $table = 'tblamenities';

    protected $primaryKey = 'ID';

    protected $fillable = [
        'PropertyID',
        'source',
        'Title',
        'status',
        'Amenitiesimage',
        'ListingDate',
        'updatedby',
        'updationDate'
      ];
}
