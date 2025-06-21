<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Inscription extends Model {
    
    use HasFactory;

    protected $fillable = [
        'service_id',
        'user_id',
        'customer_id',
        'start_date',
        'end_date',
        'status',
    ];

    public function service(): BelongsTo {
        return $this->belongsTo(Service::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function participants(){
        return $this->hasMany(Participant::class);
    }

    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }
      
}
