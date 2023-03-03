<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbllinks extends Model
{
    use HasFactory;

    protected $table = 'tbllinks';

    protected $primarykey = 'ID';

   protected $fillable = [
       'Description',
       'Teamleader',
       'url',
       'EnterDate',
       'Msg',
       'updatedby',
       'updationDate'
     ];
}
