<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    public function Cate_slide()
    {

        return $this->belongsTo('App\Models\Cate_slide', 'cate_slide_id', 'id');
    }
}
