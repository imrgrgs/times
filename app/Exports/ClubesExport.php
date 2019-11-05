<?php

namespace App\Exports;

use App\Models\Clube;
use Maatwebsite\Excel\Concerns\FromCollection;

class ClubesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Clube::all();
    }
}
