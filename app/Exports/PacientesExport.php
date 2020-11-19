<?php

namespace App\Exports;

use App\Models\Pacientes;
use Maatwebsite\Excel\Concerns\FromCollection;

class PacientesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $pacientes;

    public function __construct($pacientes)
    {
        $this->pacientes = $pacientes;
    }

    public function collection()
    {
        return $this->pacientes;
    }
}
