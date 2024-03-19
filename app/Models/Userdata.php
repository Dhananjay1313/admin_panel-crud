<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userdata extends Model
{
    use HasFactory;
    protected $table = 'userdata';

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'confirm password',
        'gender',
        'image',
        'role',
        'role_type',
        'admin_type',
        'joining date',
        'status'
    ];
}
