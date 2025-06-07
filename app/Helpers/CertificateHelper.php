<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CertificateHelper {

  const duration = 12; // Duration in months
  const codeLength = 25; // Length of the generated code

  public function generateCode(int $certificateId): string {
    return '';
  }

  public function generateExpirationDate(): string {
    return '';
  }

}