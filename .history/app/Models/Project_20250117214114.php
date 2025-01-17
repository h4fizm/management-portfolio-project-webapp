<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    // Tetapkan nama tabel ke "projects"
    protected $table = 'projects';  // Pastikan nama tabel sesuai (gunakan plural)

    // Kolom yang dapat diisi
    protected $fillable = [
        'project_name',
        'project_description',
        'project_photo',
        'project_link',
        'project_service', // Kolom yang menghubungkan ke tabel service
    ];

    /**
     * Relasi ke model Service
     */
    public function service(): BelongsTo
    {
        // Foreign key adalah 'project_service' yang merujuk ke 'id' di tabel service
        return $this->belongsTo(Service::class, 'project_service', 'id');
    }
}
