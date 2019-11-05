<?php

namespace App\Exports;

use App\Models\Jogador;
use Maatwebsite\Excel\Concerns\FromCollection;

class JogadoresExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Jogador::all();
    }
}
