<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialUnit extends Model
{
    use HasFactory;
    protected $table ='material_unit';
    protected $fillable = [
        'material_id',
        'unit_id',
        'biaya',
        'qty',
    ];
    public function material()
    {
    	return $this->belongsTo(Material::class);
    }
    public function unit()
    {
    	return $this->belongsTo(unit::class);
    }
}

