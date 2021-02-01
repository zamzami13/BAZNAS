<?php

namespace App\Exports;

use App\Daftbank;
use Maatwebsite\Excel\Concerns\FromCollection;

class DaftbankExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Daftbank::all();
    }
}
