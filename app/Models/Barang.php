<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use HasFactory, SoftDeletes;
    protected $table ='barang';
    protected $fillable = [
        'kode',
        'nama',
        'suplier_id',
        'ukuran',
        'harga_jual',
        'satuan_ukuran_id',
        'jumlah_total',
        'jumlah_min',
        'jenis_barang',
        'is_status'
    ];

    public function suplier()
    {
        return $this->belongsTo(Suplier::class, 'suplier_id','id');
    }
    public function satuanUkuran()
    {
        return $this->belongsTo(Ukuran::class, 'satuan_ukuran_id','id');
    }
}
