<?php

namespace App\Helpers;

use App\Http\Controllers\Admin\ConfigurationsController;
use App\Models\Certificate;
use Illuminate\Support\Str;

class CertificateHelper {

  protected ConfigurationsController $configController;

  public function __construct(
    ConfigurationsController $configController
  ){
    $this->configController = $configController;
  }

  const duration = 12; // Duration in months
  const codeLength = 25; // Length of the generated code

  public function generateCode(int $certificateId): string {
    return $certificateId.''.Str::random(self::codeLength);
  }

  public function generateExpirationDate(): string {
    $configTime = $this->configController->getConfiguration('certificate_validity_time');
    $months = ($configTime) ? $configTime : self::duration;
    $months = (int) $months;
    return now()->addMonths($months)->toDateString();
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