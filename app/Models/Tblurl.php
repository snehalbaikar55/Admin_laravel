<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblurl extends Model
{
    use HasFactory;

    protected $table = 'tblurl';

	protected $primaryKey = 'ID';

    protected $fillable = [
        'PropertyID',
        'URL', 
        'ListingDate',
        'updatedby',
        'updationDate'
      
      ];
}
