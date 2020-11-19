<?php

namespace App\Exports;

use App\Models\Insumos;
use Maatwebsite\Excel\Concerns\FromCollection;

class InsumosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $insumos;

    public function __construct($insumos)
    {
        $this->insumos = $insumos;
    }

    public function collection()
    {
        return $this->insumos;
    }
}
