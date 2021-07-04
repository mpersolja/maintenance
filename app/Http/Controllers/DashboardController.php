<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
  public function index() {
    $today = Carbon::today();
    $date_from = $today->copy()->startOfWeek();
    $date_to = $date_from->copy()->addDays(12)->subSecond();

    $service_runs = Machine::whereBetween('next_service', [$date_from, $date_to])
      ->orderBy('location_id', 'ASC')
      ->orderBy('next_service', 'ASC')
      ->get();

    return view('dashboard')->with(
      compact('date_from', 'date_to', 'service_runs', 'today')
    );
  }
}
