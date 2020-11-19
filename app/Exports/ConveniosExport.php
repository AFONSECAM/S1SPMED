<?php

namespace App\Exports;

use App\Models\Convenios;
use Maatwebsite\Excel\Concerns\FromCollection;

class ConveniosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $convenios;

    public function __construct($convenios)
    {
        $this->convenios = $convenios;
    }

    public function collection()
    {
        return $this->convenios;
    }
}
