<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insumos extends Model
{
    protected $table = "insumos";

    public $timestamps = false;
    

    protected $fillable= [
        "codIns",
        "concen",
        "fecVen",
        "labora",
        "nomIns",
        "precioU",
        "pres",
        "unid",
        "categoria_id",        
    ];
    
    protected $dates = ['fecVen'];

    public function categoria(){
        return $this->belongsTo(Categorias::class);
    }
}
