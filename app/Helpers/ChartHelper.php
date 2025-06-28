<?php

namespace App\Helpers;

use App\Models\Comment;
use App\Models\Service;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

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

  public function getInscriptionQuestionsCounts(int $inscriptionId, string $question){
    $results = Comment::where('inscription_id', $inscriptionId)
        ->select($question, DB::raw('count(*) as total'))
        ->groupBy($question)
        ->pluck('total', $question);

    $chartData = [];
    foreach ($results as $answer => $count) {
        $chartData[] = [
            'count' => $count,
            'answer' => $answer
        ];
    }
    return $chartData;
  }

  public function getInscriptionsOpenQuestions(int $inscriptionId, string $question){
    return Comment::where('inscription_id', $inscriptionId)
        ->pluck($question)
        ->toArray();
  }

}