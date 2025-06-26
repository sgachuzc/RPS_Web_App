<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Certificate extends Model {
    
    protected $fillable = [
        'participant_id',
        'service_id',
        'code',
        'issue_date',
        'expiry_date'
    ];

    public function participant(): BelongsTo {
        return $this->belongsTo(Participant::class);
    }

    public function service(): BelongsTo {
        return $this->belongsTo(Service::class);
    }
}
