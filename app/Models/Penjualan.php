<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penjualan extends Model
{
    use HasFactory, SoftDeletes;
    protected $table ='penjualan';
    protected $fillable = [
        'invoice',
        'nama_pelanggan',
        'id_user',
        'json_detail',
        'total',
        'ppn',
        'bayar',
        'changedue',
        'is_status'
    ];
}
