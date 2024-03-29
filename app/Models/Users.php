<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = "users";

     protected $primaryKey = "user_id";
     
    protected $fillable = [
        'Name',
        'email',
        'password',
        'password_confirmation',
        'mobile_no',
        'role',
        'active'
    ];
}
