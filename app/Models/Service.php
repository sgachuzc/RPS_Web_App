<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model {
    
    use HasFactory;

    protected $fillable = [
        'name',
        'subtitle',
        'type',
        'version',
        'nomenclature',
        'months_to_expire',
        'description',
        'full_description',
        'available',
        'featured',
        'obsoleted'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function inscriptions(): HasMany {
        return $this->hasMany(Inscription::class);
    }

}
