<?php

namespace App\Exports;

use App\Models\Cargos;
use Maatwebsite\Excel\Concerns\FromCollection;

class CargosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $cargos;

    public function __construct($cargos)
    {
        $this->cargos = $cargos;
    }

    public function collection()
    {
        return $this->cargos;
    }
}
