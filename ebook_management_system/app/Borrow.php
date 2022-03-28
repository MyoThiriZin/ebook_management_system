<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrow extends Model
{
    use SoftDeletes;
    protected $fillable =[
        'user_id',
        'book_id',
        'start_date',
        'end_date',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    public function user(){

        return $this->belongsTo('App\User');
    }

    public function book(){

        return $this->belongsTo('App\Book');
    }
}
