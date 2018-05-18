<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cate_product extends Model
{
    protected $table = 'cate_products';
    protected $fillable = ['name', 'description'];
}
