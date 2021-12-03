<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $table ='unit';
    protected $fillable = [
        'nama_unit',
        'harga',
        'stok_unit'
    ];
    public function material()
    {
        return $this->hasMany(Material::class);
    }
}
