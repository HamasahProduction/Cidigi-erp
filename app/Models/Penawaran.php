<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penawaran extends Model
{
    use HasFactory, SoftDeletes;
    protected $table ='penawaran';
    protected $fillable = [
        'kode',
        'nama',
        'keterangan',
        'publish_at',
        'end_at'
    ];

    public function pivotpenawaran()
    {
        return $this->hasMany(Pivot_Penawaran::class, 'penawaran_id','id');
    }
}
