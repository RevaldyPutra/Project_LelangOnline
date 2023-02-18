<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lelang;
use App\Models\HistoryLelang;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $fillable = [
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
    public function historylelang()
    {
        return $this->belongsTo(HistoryLelang::class);
    }
}
