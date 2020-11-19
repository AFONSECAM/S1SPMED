<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $table = "categorias_insumos";

    public $timestamps = false;

    protected $fillable = [
        "nomCate",
        "tipoCate"
    ];
}
