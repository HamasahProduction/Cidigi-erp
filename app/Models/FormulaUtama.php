<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormulaUtama extends Model
{
    use HasFactory, SoftDeletes;
    protected $table ='formula_utama';
    protected $fillable = [
        'nama', 'harga_formula_utama'
    ];
}
