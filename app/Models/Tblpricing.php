<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblpricing extends Model
{
    use HasFactory;
    protected $table = 'tblpricing';

    protected $primaryKey = 'ID';
  
      protected $fillable = [
          'PropertyID',
          'Type',
          'CarpetArea',
          'Price',
          'EnterDate',
          'updatedby',
          'updationDate'
        ];
}
