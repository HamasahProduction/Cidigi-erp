<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suplier extends Model
{
    use HasFactory, SoftDeletes;

    protected $table ='suplier';
    protected $fillable = [
        'nama',
        'alamat',
        'kontak',
        'status_barang'
    ];


}
