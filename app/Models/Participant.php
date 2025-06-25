<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model {

    use HasFactory;

    protected $fillable = [
        'inscription_id',
        'name',
        'email',
        'phone',
        'certificated_sent'
    ];
    
    public function inscription(){
        return $this->belongsTo(Inscription::class);
    }

    public function certificate(){
        return $this->hasOne(Certificate::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
