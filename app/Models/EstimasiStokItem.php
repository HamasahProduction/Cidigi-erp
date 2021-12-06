<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimasiStokItem extends Model
{
    use HasFactory;
    protected $table ='estimasi_stock_formula_item';
    protected $fillable = [
        'formula_item_id',
        'barang_id',
        'jumlah_stok',
        'kebutuhan_item',
        'stok_barang_tersedia',
    ];
    public function formulaItem()
    {
        return $this->belongsTo(FormulaItem::class, 'formula_item_id','id')->withTrashed();
    }
     public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id')->withTrashed();
    }
}
