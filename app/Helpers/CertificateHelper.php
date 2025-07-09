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

  public function generateCode(string $nomenclature, int $participantId): string {
    return $nomenclature.'-'.now()->format('Y').'-'.$participantId.''.Str::random(5);
  }

  public function validateCertificate(string $code){
    $certificate = Certificate::with('service')->where('code', $code)->first();
    if (!$certificate) return 'notExist';

    $service = $certificate->service;

    if ($service->obsoleted === true || $service->version !== $certificate->version) {
      $status = 'obsoleted';
    }
    
    if($certificate->expiry_date){
      $status = ( now()->lessThanOrEqualTo($certificate->expiry_date) ) ? 'onTime' : 'expired';
    }else{
      $status = 'withoutExpiration';
    }

    return $status;
  }

}