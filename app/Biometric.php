<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biometric extends Model
{
    protected $fillable = [
        'user_id','left_thumb','left_index','left_middle','left_ring','left_pinky',
        'right_thumb','right_index','right_middle','right_ring','right_pinky',
    ];
}
