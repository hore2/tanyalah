<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawab extends Model
{
    protected $table = "jawaban";

    public function pertanyaan(){
        return $this->belongsTo(Tanya::class);
    }
}
