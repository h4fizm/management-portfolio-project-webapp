<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // Tabel yang sesuai dengan nama tabel di database
    protected $table = 'service';  // Pastikan ini sesuai dengan nama tabel di database

    // Kolom-kolom yang dapat diisi
    protected $fillable = [
        'service_name',
    ];

    // Relasi ke model Project
    public function projects()
    {
        return $this->hasMany(Project::class, 'project_service', 'id');  // Hubungkan service dengan banyak proyek
    }
}
