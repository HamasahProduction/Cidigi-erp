<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Katalog extends Model
{
    use HasFactory, SoftDeletes;
    protected $table ='katalog';
    protected $fillable = [
        'master_produk_id',
        'is_status'
    ];

    public function masterproduk()
    {
        return $this->hasOne(MasterProduk::class, 'id','master_produk_id');
    }
}
