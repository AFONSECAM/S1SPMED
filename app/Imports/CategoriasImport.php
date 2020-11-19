<?php

namespace App\Imports;

use App\Models\Categorias;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoriasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Categorias([
            'nomCate' => $row[0],
            'tipoCate' => $row[1],
        ]);
    }
}
