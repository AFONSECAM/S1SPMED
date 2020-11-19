<?php

namespace App\Exports;

use App\Models\Recaudos;
use Maatwebsite\Excel\Concerns\FromCollection;

class RecaudosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $recaudos;

    public function __construct($recaudos)
    {
        $this->recaudos = $recaudos;
    }

    public function collection()
    {
        return $this->recaudos;
    }
}
