<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // Tentukan nama tabel jika tidak sesuai dengan konvensi plural
    protected $table = 'services';  // Pastikan nama tabel sesuai (gunakan plural)

    // Tentukan kolom-kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'service_name',
    ];

    // Tentukan kolom yang tidak dapat diisi (optional)
    // protected $guarded = ['id'];

    // Tentukan kolom waktu yang secara otomatis dikelola oleh Eloquent
    public $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relasi ke model Project
    public function projects()
    {
        // Hubungkan service dengan banyak proyek (hasMany)
        return $this->hasMany(Project::class, 'project_service', 'id');
    }
}
