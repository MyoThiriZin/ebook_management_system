<?php

namespace App\Import;

use App\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoriesImport implements ToModel,WithHeadingRow
{
    public function model(array $row)
    {
        return new Category([
            'name' => $row['name'],
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);
    }
}
