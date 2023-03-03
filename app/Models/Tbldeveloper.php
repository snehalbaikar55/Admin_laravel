<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbldeveloper extends Model
{
    use HasFactory;

    protected $table = 'tbldeveloper';

    protected $primaryKey = 'ID';

    protected $fillable = [
        'Developer',
        'PostingDate',
        'active',
        'updatedby',
        'updationDate'
      ];
}


