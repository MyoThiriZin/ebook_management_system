<?php

namespace App\Import;

use App\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

/**
 * Categories Import class
 */
class CategoriesImport implements ToModel, WithHeadingRow
{
    /**
     * To insert category data to storage
     * @param array $row
     * @return array list of categories
     */
    public function model(array $row)
    {
        return new Category([
            'name' => $row['name'],
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);
    }
}
