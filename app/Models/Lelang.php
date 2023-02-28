<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;
use App\Models\User;
use App\Models\HistoryLelang;
use App\Models\Comment;

class Lelang extends Model
{
    use HasFactory;
    protected $table = 'lelangs';
    protected $fillable = [
        'barangs_id',
        'users_id',
        'harga_akhir',
        'tanggal_lelang',
        'status'
    ];
    public function barang()
    {
        return $this->hasOne('App\Models\Barang', 'id', 'barangs_id');
    }
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'users_id');
    }
    public function historylelang()
    {
        return $this->belongsTo(historylelang::class);
    }
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
