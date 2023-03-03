<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblform extends Model
{
    use HasFactory;

    protected $table = 'tblform';

    protected $primaryKey = 'ID';

   protected $fillable = [
       'PropertyID',
       'formname',
       'id1',
       'id2',
       'domain',
       'crmurl',
       'status',
       'EnterDate',
       'Msg',
       'updatedby'
     ];
}
