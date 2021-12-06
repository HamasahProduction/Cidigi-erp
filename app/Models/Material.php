<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $table ='material';
    protected $fillable = [
        'nama',
        // 'biaya', 
        // 'unit_id',
        // 'qty',
    ];


    public function unit()
    {
    	return $this->belongsToMany(Unit::class);
    }
}
