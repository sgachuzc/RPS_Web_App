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
        'description',
        'available'
    ];

    public function serviceType(): BelongsTo {
        return $this->belongsTo(ServiceType::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function inscriptions(): HasMany {
        return $this->hasMany(Inscription::class);
    }
}
