<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crm extends Model
{
    use HasFactory;

    
    protected $table = 'crm';

	protected $primaryKey = 'ID';

    protected $fillable = [
        'link',
        'pid', 
        'MobileNumber',
        'Email',
        'Password',
        'AdminRegdate',
      ];
}
