<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblreratl extends Model
{
    use HasFactory;

    protected $table = 'tblreratl';

	protected $primaryKey = 'ID';

    protected $fillable = [
        'PropertyID',
        'Rera',
        'updatedby',
        'updationDate',
        'EnterDate'
      ];
}
