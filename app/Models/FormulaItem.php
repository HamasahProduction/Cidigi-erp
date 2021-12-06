<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormulaItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $table ='formula_item';
    protected $fillable = [
        'nama','harga_peritem'
    ];

}
