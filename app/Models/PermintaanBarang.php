<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermintaanBarang extends Model
{
    use HasFactory, SoftDeletes;
    protected $table ='permintaan_barang';
    protected $fillable = [
        'no_permintaan',
        'barang_id',
        'ukuran',
        'satuan_ukuran_id',
        'jumlah_permintaan',
        'tgl_permintaan',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id','id');
    }
    public function satuanUkuran()
    {
        return $this->belongsTo(Ukuran::class, 'satuan_ukuran_id','id');
    }

}
