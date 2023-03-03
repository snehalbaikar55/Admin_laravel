<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leads extends Model
{
    use HasFactory;

      
    protected $table = 'leads';

	protected $primaryKey = 'ID';

    protected $fillable = [
        'PropertyID',
        'PropertyName',
        'Name',
        'Email',
        'Mobile',
        'Time',
      ];
}
