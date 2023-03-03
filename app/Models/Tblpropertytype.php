<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblpropertytype extends Model
{
    use HasFactory;

    protected $table = 'tblpropertytype';

	protected $primaryKey = 'ID';

    protected $fillable = [
        'PropertType',
        'EnterDate'
       
      ];
}
