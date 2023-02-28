<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lelang;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = ['lelang_id','users_id','nama', 'komentar'];

    public function lelang()
    {
        return $this->hasOne('App\Models\Lelang', 'id', 'lelang_id');
    }
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'users_id');
    }
}
