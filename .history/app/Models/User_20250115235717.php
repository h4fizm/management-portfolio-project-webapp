<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;  // Tidak perlu HasApiTokens jika tidak menggunakan API token

    // Tentukan tabel yang digunakan
    protected $table = 'user';

    // Tentukan kolom yang dapat diisi
    protected $fillable = ['name', 'email', 'password', 'upload_resume'];

    // Sembunyikan kolom tertentu saat serialisasi
    protected $hidden = ['password', 'remember_token'];

    // Tambahkan mutator untuk hashing password
    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    // Tambahkan relasi atau fungsi lain jika diperlukan
    // Contoh: public function posts() { return $this->hasMany(Post::class); }
}
