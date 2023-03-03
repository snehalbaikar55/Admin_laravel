<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblnearbylocation extends Model
{
    use HasFactory;

    protected $table = 'tblnearbylocation';

    protected $primaryKey = 'ID';

   protected $fillable = [
       'PropertyID',
       'l',
       'ListingDate',
       'updatedby',
       'updationDate'
     ];
}
