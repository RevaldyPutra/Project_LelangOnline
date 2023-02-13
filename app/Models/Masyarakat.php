<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Masyarakat extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'name',
        'username',
        'level',
        'password',
        'passwordshow',
        'telepon',
    ];
    
}
