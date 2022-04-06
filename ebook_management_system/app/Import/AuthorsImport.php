<?php

namespace App\Import;

use App\Author;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

/**
 * Authors Import class
 */
class AuthorsImport implements ToModel, WithHeadingRow 
{
    /**
     * To insert author data to storage
     * @param array $row
     * @return array list of authors
     */
    public function model(array $row)
    {
        return new Author([
            'name' => $row['name'],
            'email' => $row['email'],
            'description' => $row['description'],
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);
    }
}
