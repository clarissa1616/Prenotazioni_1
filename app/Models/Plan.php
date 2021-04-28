<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prenotation;

class Plan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function prenotations() {
        return $this->hasMany(Prenotation::class);
    }

}
