<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceReport extends Model
{
    use HasFactory;

    protected $fillable = [
      'machine_id', 'description',
      'duration', 'employee'
    ];

    public function getDurationAttribute($value) {
      $m = $value % 60;
      $h = (int)($value / 60);

      return sprintf("%02d:%02d", $h, $m);
    }
}
