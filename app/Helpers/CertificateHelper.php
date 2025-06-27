<?php

namespace App\Helpers;

use App\Models\Certificate;
use Illuminate\Support\Str;

class CertificateHelper {

  const duration = 12; // Duration in months
  const codeLength = 25; // Length of the generated code

  public function generateCode(int $certificateId): string {
    return $certificateId.''.Str::random(self::codeLength);
  }

  public function generateExpirationDate(): string {
    return now()->addMonths(self::duration)->toDateString();
  }

  public function validateCertificate(string $code){
    $certificate = Certificate::where('code', $code)->first();

    if (!$certificate) {
      return false;
    }

    $now = now();
    return ($now->lessThanOrEqualTo($certificate->expiry_date)) ? true : false;
  }

}