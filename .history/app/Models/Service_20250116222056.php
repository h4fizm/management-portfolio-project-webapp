<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // Tentukan nama tabel jika tidak sesuai dengan konvensi plural
    protected $table = 'service';

    // Tentukan kolom-kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'service_name',
    ];

    // Tentukan kolom yang tidak dapat diisi (optional)
    // protected $guarded = ['id'];

    // Tentukan kolom waktu yang secara otomatis dikelola oleh Eloquent
    public $timestamps = true;
}
