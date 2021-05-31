<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
      'address', 'zip', 'client_id', 'default'
    ];

    public function client() {
      return $this->belongsTo(Client::class);
    }

    public function scopeIsDefault($query) {
      return $query->where('default', true);
    }

}
