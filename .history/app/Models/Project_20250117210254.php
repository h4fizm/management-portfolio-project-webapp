<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    // Tetapkan nama tabel ke "project"
    protected $table = 'project';

    // Kolom yang dapat diisi
    protected $fillable = [
        'project_name',
        'project_description',
        'project_photo',
        'project_link',
        'project_service',
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
