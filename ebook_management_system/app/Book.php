<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable =[
        'name',
        'file',
        'duration',
        'description',
        'author_id',
        'category_id',
        'created_by',
        'updated_by'
    ];
}
