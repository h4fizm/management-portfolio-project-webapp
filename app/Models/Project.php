<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    // Tabel yang sesuai dengan nama tabel di database
    protected $table = 'project';  // Pastikan ini sesuai dengan nama tabel di database

    // Kolom-kolom yang dapat diisi
    protected $fillable = [
        'project_name',
        'project_description',
        'project_photo',
        'project_link',
        'project_service',  // Pastikan kolom ini ada di tabel 'project'
    ];

    /**
     * Relasi ke model Service
     */
    public function service(): BelongsTo
    {
        // Foreign key adalah 'project_service' dan primary key di tabel service adalah 'id'
        return $this->belongsTo(Service::class, 'project_service', 'id');
    }
}
