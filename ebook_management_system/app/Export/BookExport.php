<?php

namespace App\Export;

use App\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return ["Name", "Image", "File", "Author_id", "Category_id", "Duration", "Description"];
    }

    public function collection()
    {
        return Book::select('name', 'image', 'file', 'author_id', 'category_id', 'duration', 'description')->get();

    }

}
