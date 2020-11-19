<?php

namespace App\Exports;

use App\Models\Gastos;
use Maatwebsite\Excel\Concerns\FromCollection;

class GastosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $gastos;

    public function __construct($gastos)
    {
        $this->gastos = $gastos;
    }

    public function collection()
    {
        return $this->gastos;
    }
}
