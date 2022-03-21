<?php

namespace App\Import;

use App\Book;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BookImport implements ToModel,WithHeadingRow
{
    public function model(array $row)
    {
        return new Book([
            'name' => $row['name'],
            'image' => $row['image'],
            'file' => $row['file'],
            'author_id' => $row['author_id'],
            'category_id' => $row['category_id'],
            'duration' => $row['duration'],
            'description' => $row['description'],
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
