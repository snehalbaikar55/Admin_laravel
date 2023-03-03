<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblextracode extends Model
{
    use HasFactory;

    protected $table = 'tblextracode';

    protected $primaryKey = 'ID';

   protected $fillable = [
       'PropertyID',
       'code1',
       'code2',
       'code3',
       'code4',
       'ListingDate',
       'Msg',
       'updatedby',
       'updationDate'
     ];
}
