<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbltelecallers extends Model
{
    use HasFactory;
    
    protected $table = 'tbltelecallers';

	protected $primaryKey = 'ID';

    protected $fillable = [
        'TelecallerName',
        'UserName', 
        'MobileNumber',
        'Email',
        'Password',
        'Regdate',
        'Role',
        'Region'
      
     
      ];
}
