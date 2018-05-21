<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cate_slide extends Model
{
    public function Slide()
    {
        return $this->hasMany(Slide::class, 'cate_slide_id');
    }}
