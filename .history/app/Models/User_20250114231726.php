<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    // Tentukan tabel yang digunakan
    protected $table = 'user';

    // Tentukan kolom yang dapat diisi
    protected $fillable = ['name', 'email', 'password', 'upload_resume'];

    // Sembunyikan kolom tertentu saat serialisasi
    protected $hidden = ['password', 'remember_token'];
}
