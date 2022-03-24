<?php

namespace App\Export;

use App\Author;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AuthorsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return ["ID", "Name", "Description"];
    }

    public function collection()
    {
        return Author::select('id', 'name', 'description')->get();
    }

}
