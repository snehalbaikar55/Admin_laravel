<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblyoutubeurl extends Model
{
    use HasFactory;

    protected $table = 'tblyoutubeurl';

	protected $primaryKey = 'ID';

    protected $fillable = [
        'PropertyID',
        'youtubeURL', 
        'ListingDate',
        'updatedby',
        'updationDate'
      
     
      ];
}
