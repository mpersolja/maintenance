<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
      'name',
      'address',
      'zip',
      'phone',
      'email',
    ];

    public function locations() {
      return $this->hasMany(Location::class);
    }

    public function machines() {
      return $this->hasMany(Machine::class);
    }

}
