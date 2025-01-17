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
        return $this->belongsTo(Service::class, 'service_name');
    }
}
