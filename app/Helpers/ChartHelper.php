<?php

namespace App\Helpers;

use App\Models\Service;
use Illuminate\Support\Collection;

class ChartHelper {

  public function getTopServices(string $type): Collection {
    $topServices = Service::withCount('inscriptions')
      ->where('type', $type)
      ->orderByDesc('inscriptions_count')
      ->take(5)
      ->get();
    
    $chartData = $topServices->map(function($service) {
        return [
          'name' => $service->name,
          'count' => $service->inscriptions_count
        ];
    });

    return $chartData;
  }

  public function getBetterRatedServices(){
    
  }

}