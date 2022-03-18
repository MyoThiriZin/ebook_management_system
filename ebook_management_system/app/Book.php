<?php

namespace App;

use App\Author;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable =[
        'name',
        'image',
        'file',
        'duration',
        'description',
        'author_id',
        'category_id',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    public function author(){

        return $this->belongsTo('App\Author');
    }

    public function category(){

        return $this->belongsTo('App\Category');
    }
}
