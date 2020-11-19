<?php

namespace App\Imports;

use App\Models\Insumos;
use Maatwebsite\Excel\Concerns\ToModel;

class InsumosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Insumos([
            'codIns'  => $row[0],
            'concen'  => $row[1],
            'fecVen'  => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[2]),
            'labora'  => $row[3],
            'nomIns'  => $row[4],
            'precioU' => $row[5],
            'pres'    => $row[6],
            'unid'    => $row[7],
            'categoria_id' => $row[8]
            
        ]);
    }
}
