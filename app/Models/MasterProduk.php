<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterProduk extends Model
{
    use HasFactory, SoftDeletes;
    protected $table ='master_produk';
    protected $fillable = [
        'nama', 'suplier_id'
    ];

    public function suplier()
    {
        return $this->belongsTo(Suplier::class, 'suplier_id','id')->withTrashed();
    }
}
