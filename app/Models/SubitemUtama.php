<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubitemUtama extends Model
{
    use HasFactory, SoftDeletes;
    protected $table ='sub_formula_utama';
    protected $fillable = [
        'formula_item_id','formula_utama_id', 'jumlah',
    ];

    public function formulaUtama()
    {
        return $this->belongsTo(FormulaUtama::class, 'formula_utama_id')->withTrashed();
    }

    public function formulaItems()
    {
        return $this->belongsTo(FormulaItem::class, 'formula_item_id','id')->withTrashed();
    }
}
