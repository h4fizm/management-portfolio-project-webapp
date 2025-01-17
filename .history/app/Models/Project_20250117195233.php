<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    // Tentukan nama tabel
    protected $table = 'project';

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'project_name',
        'project_description',
        'project_photo',
        'project_link',
        'project_service',
    ];

    /**
     * Relasi ke model Service.
     *
     * @return BelongsTo
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'project_service');
    }
}
