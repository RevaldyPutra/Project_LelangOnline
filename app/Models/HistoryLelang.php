<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Lelang;
use App\Models\Barang;

class HistoryLelang extends Model
{
    use HasFactory;
    protected $table = 'history_lelangs';
    protected $fillable = [
        'lelang_id',
        'users_id',
        'nama_barang',
        'harga',
        'tanggal',
        'status'
    ];
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'users_id');
    }
    public function lelang()
    {
        return $this->hasOne('App\Models\Lelang', 'id', 'lelang_id');
    }
    public function lelangs()
    {
        return $this->belongsTo(Lelang::class);
    }
}
