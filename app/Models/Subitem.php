<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subitem extends Model
{
    use HasFactory, SoftDeletes;
    protected $table ='subitem';
    protected $fillable = [
        'formula_item_id',
        'barang_id',
        'jumlah',
    ];

    public function formulaItems()
    {
        return $this->belongsTo(FormulaItem::class, 'formula_item_id','id')->withTrashed();
    }
     public function barangGolonganFormula()
    {
        return $this->belongsTo(Barang::class, 'barang_id')->withTrashed();
    }
}
