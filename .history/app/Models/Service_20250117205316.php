<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'service'; // Nama tabel di database
    protected $fillable = ['service_name']; // Kolom yang dapat diisi
}
