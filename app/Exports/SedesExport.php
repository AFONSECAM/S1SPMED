<?php

namespace App\Exports;

use App\Models\Sedes;
use Maatwebsite\Excel\Concerns\FromCollection;

class SedesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $sedes;

    public function __construct($sedes)
    {
        $this->sedes = $sedes;
    }

    public function collection()
    {
        return $this->sedes;
    }
}
