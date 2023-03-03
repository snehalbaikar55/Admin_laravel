<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbladmin extends Model
{
    use HasFactory;
    protected $table = 'tbladmin';

    protected $primaryKey = 'ID';
  
      protected $fillable = [
          'AdminName',
          'UserName',
          'MobileNumber',
          'Email',
          'Password',
          'AdminRegdate'
        ];
}
