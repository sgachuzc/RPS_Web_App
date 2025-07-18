<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model {

    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone'
    ];
    
    public function inscriptions(){
        return $this->belongsToMany(Inscription::class)->withPivot('certificated_sent') ;
    }

    public function certificates(){
        return $this->hasMany(Certificate::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
