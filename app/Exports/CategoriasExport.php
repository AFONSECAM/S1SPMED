<?php

namespace App\Exports;

use App\Models\Categorias;
use Maatwebsite\Excel\Concerns\FromCollection;

class CategoriasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $categorias;

    public function __construct($categorias)
    {
        $this->categorias = $categorias;
    }

    public function collection()
    {
        return $this->categorias;
    }
}
