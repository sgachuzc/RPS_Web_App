<?php

namespace App\Helpers;

use App\Models\Inscription;
use Illuminate\Support\Str;

class InscriptionsHelper {

    public function generateToken(int $incriptionId): string {
        $token = $incriptionId.'_'.Str::random(32);
        return $token;
    }

    public function generateRegistrationLink(Inscription $inscription): string {
        $token = $inscription->registration_token ?? $this->generateToken($inscription->id);
        return url('/register/'.$token);
    }
}