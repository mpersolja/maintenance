<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    protected $fillable = [
      'brand', 'model', 'serial_number', 'next_service',
      'active_since', 'location_id', 'client_id', 'service_interval'
    ];

    public function location() {
      return $this->belongsTo(Location::class);
    }

    public function client() {
      return $this->belongsTo(Client::class);
    }

    public function services() {
      return $this->hasMany(ServiceReport::class)
        ->orderBy('created_at', 'DESC');
    }
}
