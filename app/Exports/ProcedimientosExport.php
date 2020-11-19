<?php

namespace App\Exports;

use App\Models\Procedimientos;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProcedimientosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $procedimientos;

    public function __construct($procedimientos)
    {
        $this->procedimientos = $procedimientos;
    }

    public function collection()
    {
        return $this->procedimientos;
    }
}
