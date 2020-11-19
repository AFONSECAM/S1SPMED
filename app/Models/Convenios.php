<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Convenios extends Model
{
    protected $table = "convenios";

    public $timestamps = false;

    protected $fillable = [
        "cosConv",
        "durConv",
        "fecAper",
        "nomConv",
        "objConv",
        "resolu",
        "eps_id"        
    ];

    public static $rules = [
        "codConv" => 'required',
        "fecAper" => 'required',
        "nomIPS" => 'required',
        "nomConv"=> 'required',
        "resolu" => 'required',
        "objConv" => 'required',
        "durConv" => 'required',
        "cosConv" => 'required',
        "estado" => 'in:1,0',
    ];

    public function eps(){
        return $this->belongsTo(Eps::class);
    }
}
