<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pivot_Penawaran extends Model
{
    use HasFactory, SoftDeletes;
    protected $table ='pivot_penawaran';
    protected $fillable = [
        'penawaran_id',
        'master_produk_id',
        'harga_penawaran',
        'spesifikasi',
        'is_status'
    ];

    public function penawaran()
    {
        return $this->hasOne(Penawaran::class, 'id','penawaran_id');
    }

    public function masterproduk()
    {
        return $this->hasOne(MasterProduk::class, 'id','master_produk_id');
    }
}
