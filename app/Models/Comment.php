<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    use HasFactory;

    protected $fillable = [
        'question_1',
        'question_2',
        'question_3',
        'question_4',
        'question_5',
        'question_6',
        'question_7',
        'rating',
    ];
    
    public function inscription() {
        return $this->belongsTo(Inscription::class);
    }
    
    public function participant() {
        return $this->belongsTo(Participant::class);
    }
}
