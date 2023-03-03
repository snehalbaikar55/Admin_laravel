<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendorleads extends Model
{
    use HasFactory;
    protected $table = 'vendorleads';

	protected $primaryKey = 'ID';

    protected $fillable = [
        'ClientName',
        'Mobile', 
        'TeleCaller',
        'Feedback',
        'Project',
        'Region',
        'Subregion',
        'Flattype',
        'Location',
        'Budget',
        'Possession',
        'Time'
      ];
}
