<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class Favorites_Media extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function favorite_media(){
        return $this->belongsTo(MyUser::class);
    }
}

