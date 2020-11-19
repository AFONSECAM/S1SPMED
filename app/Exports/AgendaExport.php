<?php

namespace App\Exports;

use App\Models\Agenda;
use Maatwebsite\Excel\Concerns\FromCollection;

class AgendaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $agendas;

    public function __construct($agendas)
    {
        $this->agendas = $agendas;
    }

    public function collection()
    {
        return $this->agendas;
    }
}
