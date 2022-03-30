<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $fillable = [
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
        'updated_at',
    ];

    protected $dates = ['deleted_at'];

    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function borrow()
    {
        return $this->hasMany('App\Borrow');
    }
}
