<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Certificate extends Model {
    protected $fillable = [
        'inscription_id',
        'code',
        'issue_date',
        'expiry_date'
    ];

    public function inscription(): BelongsTo {
        return $this->belongsTo(Inscription::class);
    }
}
