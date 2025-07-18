<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;
    public  function candidatos (){
        return $this->hasMany(Candidato::class);
    }
    public function region (){
        return $this->belongsTo(Region::class);
    }
}
