<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimasiStokUtama extends Model
{
    use HasFactory;
    protected $table ='estimasi_stock_formula_utama';
    protected $fillable = [
        'formula_utama_id',
        'formula_item_id',
        'jumlah_stok',
        'kebutuhan_utama',
        'estimasi_stok_item',
        'estimasi_stok_utama',
    ];
}
