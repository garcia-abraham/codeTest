<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name','first_name', 'last_name', 'password', 'dni', 'birthdate', 'role_id', 'file',
    ];

    protected $hidden = [
        'password', 'created_at', 'updated_at'
    ];



}
