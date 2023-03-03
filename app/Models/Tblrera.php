<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblrera extends Model
{
    use HasFactory;
    protected $table = 'tblrera';

	protected $primaryKey = 'ID';

    protected $fillable = [
        'PropertyID',
        'Rera',
        'updatedby',
        'updationDate',
        'EnterDate'
      ];
}
