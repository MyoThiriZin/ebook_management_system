<?php

namespace App\Export;

use App\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategoriesExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return ["ID", "Name"];
    }

    public function collection()
    {
        return Category::select('id', 'name')->get();
    }

}
