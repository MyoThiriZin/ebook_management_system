<?php

namespace App\Import;

use App\Author;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AuthorsImport implements ToModel,WithHeadingRow
{
    public function model(array $row)
    {
        return new Author([
            'name' => $row['name'],
            'description' => $row['description'],
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);
    }
}
