<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;
    public function distrito(){
        return $this->belongsTo(Distrito::class);
    }
    public function partido(){
        return $this->belongsTo(Partido::class);
    }
    public function datos(){
        return $this->hasMany(Dato::class);
    }

}
