<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubRegion extends Model
{
    use HasFactory;
    protected $table = "subregions";
    protected $primaryKey = 'subregion_id';

    protected $fillable = [
        'region_id',
        'subregion_name'
      ];
}
