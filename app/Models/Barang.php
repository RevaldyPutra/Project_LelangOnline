<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lelang;
use App\Models\User;
use App\Models\HistoryLelang;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $fillable = [
        'users_id',
        'nama_barang',
        'tanggal',
        'harga_awal',  
        'image',  
        'deskripsi_barang',
    ];
    public function lelang()
    {
        return $this->belongsTo(Lelang::class);
    }
    public function historyLelang()
    {
        return $this->hasMany(HistoryLelang::class);
    }
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'users_id');
    }
}
