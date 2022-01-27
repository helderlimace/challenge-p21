<?php

namespace App\Imports;

use App\Models\Torcedor;
use Maatwebsite\Excel\Concerns\ToModel;

class TorcedoresImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Torcedor([
            'nome'      => $row[0],
            'documento'	=> $row[1],
            'cep'	    => $row[2],
            'endereco'	=> $row[3],
            'bairro'    => $row[4],
            'cidade'	=> $row[5],
            'uf'	    => $row[6],
            'telefone'	=> $row[7],
            'email'	    => $row[8],
            'ativo'	    => $row[9],
        ]);
    }
}
