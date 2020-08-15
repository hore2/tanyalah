<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanya extends Model
{
    //
    protected $table = "pertanyaan";
    protected $guarded = [];

    public function jawaban(){
        return $this->hasMany(Jawab::class);
    }
}
